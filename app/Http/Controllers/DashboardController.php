<?php

namespace App\Http\Controllers;

use ZipArchive;
use Carbon\Carbon;
use App\Models\User;
use App\Mail\ApprovedPOA;
use App\Models\BlockList;
use App\Models\Sponsorship;
use App\Mail\AppointedEvent;
use Illuminate\Http\Request;
use App\Mail\SubmitNotification;
use App\Mail\ApprovedNotification;
use App\Models\ongoingEventReport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\SponsorshipNotification;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function dashboard() {
        $sponsor = Sponsorship::orderBy('created_at', 'desc')->get();
        $months = Sponsorship::selectRaw('MONTH(from_date) as month')
                 ->distinct()
                 ->orderBy('month', 'asc')
                 ->pluck('month')
                 ->map(function ($monthNumber) {
                     return Carbon::create()->month($monthNumber)->format('F');
                 });
        $booth = Sponsorship::where("booth_space", "Booth")
                 ->where("states", "!=", "Completed")
                 ->orderBy('created_at', 'desc')
                 ->get();
             
        $space = Sponsorship::where("booth_space", "Space")
                 ->where("states", "!=", "Completed")
                 ->orderBy('created_at', 'desc')
                 ->get();
             
        $none = Sponsorship::where("booth_space", "None")
                 ->where("states", "!=", "Completed")
                 ->orderBy('created_at', 'desc')
                 ->get();
             
        $statusCounts = $sponsor->groupBy('states')->map->count();
        return view('dashboard.dashboard', ['sponsor' => $sponsor, 
                                            'month' => $months,
                                            'booth' => $booth,
                                            'space' => $space,
                                            'none' => $none,
                                            'statusCounts' => $statusCounts
                                        ]);
    }

    public function getAvailableTemplates()
    {
        $templatePath = resource_path('views/emails/template');
        $templates = File::files($templatePath);
        return $templates;
    }

    public function viewRequest($id) {
        $sponsor = Sponsorship::findOrFail($id);
        $user = User::where('role_id', 2)->get();
        $alluser = User::whereIn('role_id', [1, 2])->get();
        $templates = $this->getAvailableTemplates();
        return view('dashboard.dashboard-sponsorship-requests', ['sponsor' => $sponsor, 'user' => $user, 'alluser' => $alluser, 'templates' => $templates]);
    }

    public function sendMail(Request $request, $email, $id) {
        $sponsor = Sponsorship::findOrFail($id);
        $sponsor->pickup_location = $request->pickup_location;
        $sponsor->pickup_address = $request->pickup_address;
        $sponsor->contact_person = $request->contact_person;
        $sponsor->pickup_phone_number = $request->pickup_phone_number;
        $sponsor->save();
        $confirmro_200ml = $sponsor->confirmro_200ml;
        $confirmro_500ml = $sponsor->confirmro_500ml;
        $confirmro_11L = $sponsor->confirmro_11L;
        $confirmro_350ml = $sponsor->confirmro_350ml;
        $pickup_location = $request->pickup_location;
        $template = $request->input('template');
        Mail::to($email)->send(new SponsorshipNotification($template, $confirmro_200ml, $confirmro_500ml, $confirmro_350ml, $confirmro_11L, $pickup_location));
        return redirect("/view-request/" . $id);
    }

    public function saveTemplate(Request $request, $templatename, $id) {
        $content = $request->input('content');
        $templatePath = resource_path('views/emails/template/' . $templatename . '.blade.php');
        
        try {
            File::put($templatePath, $content);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
        
    }


    public function requestSubmit(Request $request, $id) {
        $tags = explode(",", $request->tags);
        $sponsor = Sponsorship::findOrFail($id);
        $sponsor->tags = json_encode($tags);
        $sponsor->handle_by = $request->handle_by;
        $sponsor->remarks = $request->remarks;
        $sponsor->states = "Approved";
        $sponsor->status = "NotFilled";
        $sponsor->save();
        $user = User::where('name', $sponsor->handle_by)->first();
        Mail::to($user->email)->send(new AppointedEvent($sponsor->handle_by, 
                                                        $sponsor->event_name,
                                                        $sponsor->fullname,
                                                        $sponsor->contact,
                                                        $sponsor->email,
                                                        $sponsor->organization,
                                                        $sponsor->nature_event,
                                                        $sponsor->from_date,
                                                        $sponsor->to_date,
                                                        $sponsor->eventAddress,
                                                        $sponsor->attendees,
                                                        $sponsor->explaination_product,
                                                        $sponsor->booth,
                                                        $sponsor->ro_200ml,
                                                        $sponsor->ro_500ml,
                                                        $sponsor->ro_350ml,
                                                        $sponsor->ro_11L));
        return redirect("/view-request/" . $id);
    }

    public function requestSubmitConfirm(Request $request, $id) {
        $attending = explode(",", $request->attending);
        $sponsor = Sponsorship::findOrFail($id);
        $sponsor->attending = json_encode($attending);
        $sponsor->booth_space = $request->booth_space;
        $sponsor->confirmro_200ml = $request->confirmro_200ml;
        $sponsor->confirmro_500ml = $request->confirmro_500ml;
        $sponsor->confirmro_11L = $request->confirmro_11L;
        $sponsor->confirmro_350ml = $request->confirmro_350ml;
        $sponsor->paper_cup = $request->paper_cup;
        $sponsor->goodies_bag = $request->goodies_bag;
        $sponsor->others = $request->others;
        $sponsor->remarks = $request->remarks;
        $sponsor->status = " ";
        $sponsor->save();
        Mail::to($sponsor->email)->send(new ApprovedNotification($sponsor->event_name,
                                                                 $sponsor->fullname,
                                                                 $sponsor->contact,
                                                                 $sponsor->email,
                                                                 $sponsor->organization,
                                                                 $sponsor->nature_event,
                                                                 $sponsor->from_date,
                                                                 $sponsor->to_date,
                                                                 $sponsor->eventAddress,
                                                                 $sponsor->attendees,
                                                                 $sponsor->explaination_product,
                                                                 $sponsor->booth,
                                                                 $sponsor->confirmro_200ml,
                                                                 $sponsor->confirmro_500ml,
                                                                 $sponsor->confirmro_350ml,
                                                                 $sponsor->confirmro_11L));
        return redirect("/view-request/" . $id);
    }

    public function calendar() {
        $sponsor = Sponsorship::all();
        return view('dashboard.dashboard-calendar', ['sponsor' => $sponsor]);
    }

    public function requestUpdate(Request $request, $id) {
        $attending = explode(",", $request->attending);
        $tags = explode(",", $request->tags);
        $sponsor = Sponsorship::findOrFail($id);
        $sponsor->attending = json_encode($attending);
        $sponsor->tags = json_encode($tags);
        $sponsor->handle_by = $request->handle_by;
        $sponsor->booth_space = $request->booth_space;
        $sponsor->confirmro_200ml = $request->confirmro_200ml;
        $sponsor->confirmro_500ml = $request->confirmro_500ml;
        $sponsor->confirmro_11L = $request->confirmro_11L;
        $sponsor->confirmro_350ml = $request->confirmro_350ml;
        $sponsor->paper_cup = $request->paper_cup;
        $sponsor->goodies_bag = $request->goodies_bag;
        $sponsor->others = $request->others;
        $sponsor->remarks = $request->remarks;
        // $sponsor->pickup_location = $request->pickup_location;
        // $sponsor->pickup_address = $request->pickup_address;
        // $sponsor->contact_person = $request->contact_person;
        // $sponsor->pickup_phone_number = $request->pickup_phone_number;
        $sponsor->states = $request->states;
        $sponsor->save();
        return redirect("/view-request/" . $id);
    }

    public function collected($id) {
        $sponsor = Sponsorship::findOrFail($id);
        $sponsor->states = "Collected";
        $sponsor->save();
        return redirect("/view-request/" . $id);
    }

    public function statusUpdate(Request $request, $id) {
        $sponsor = Sponsorship::findOrFail($id);
        $sponsor->states = $request->states;
        $sponsor->save();
        return redirect("/dashboard/view-request/" . $id);
    }

    public function delete($id) {
        $sponsor = Sponsorship::findOrFail($id);
        $sponsor->delete();
        if($sponsor) {
            Session::flash('status', 'success');
            Session::flash('message', 'Item moved to trash');
        }
        return redirect("/");
    }

    public function trash() {
        $sponsor = Sponsorship::onlyTrashed()->get();
        return view('dashboard.dashboard-sponsorship-archive', ['sponsor' => $sponsor]);
    }

    public function block($id) {
        $sponsor = Sponsorship::findOrFail($id);
        $sponsor->states = "Blacklist";
        $sponsor->save();

        $blacklist = new BlockList;
        $blacklist->email = $sponsor->email;
        $blacklist->company_name = $sponsor->organization;
        $blacklist->contact_number = $sponsor->contact;
        $blacklist->save();
        return redirect("/view-request/" . $id);
    }

    public function blocklists() {
        $sponsor = BlockList::all();
        return view("dashboard.dashboard-blocklists", ['sponsor' => $sponsor]);
    }

    public function removeBlacklist($id, $email) {
        $blacklist = BlockList::findOrFail($id);
        $blacklist->delete();

        $sponsor = Sponsorship::where('email', $email)->first();
        $sponsor->states = "Processing";
        $sponsor->save();
        return redirect('/blacklists');
    }

    public function reject($id) {
        $sponsor = Sponsorship::findOrFail($id);
        $sponsor->states = 'Rejected';
        $sponsor->save();
        return redirect('/view-request/' . $id);
    }

    //---TRASH--------------------------------------------------------------------------------------------------------------

    public function restore($id) {
        $sponsor = Sponsorship::withTrashed()->where('id', $id)->restore();

        if ($sponsor) {
            Session::flash('status', 'success');
            Session::flash('message', 'Item restored !');
        }

        return redirect("/trash");
    }

    public function permanentDelete($id) {
        
    }

    //-----AFTER EVENT RERPORT-------------------------------------------------------------------------------------------------

    public function ongoingEventReport() {
        $sponsor = Sponsorship::whereIn('states', ['Approved', 'Pending', 'Completed', 'Collected'])->orderBy('created_at', 'desc')->get();
        $months = Sponsorship::selectRaw('MONTH(from_date) as month')
                 ->distinct()
                 ->orderBy('month', 'asc')
                 ->pluck('month')
                 ->map(function ($monthNumber) {
                     return Carbon::create()->month($monthNumber)->format('F');
                 });
        $booth = Sponsorship::where("booth_space", "Booth")->orderBy('created_at', 'desc')->get();
        $space = Sponsorship::where("booth_space", "Space")->orderBy('created_at', 'desc')->get();
        $none = Sponsorship::where("booth_space", "None")->orderBy('created_at', 'desc')->get();
        $statusCounts = $sponsor->groupBy('states')->map->count();
        return view('dashboard.dashboard-ongoing-event-report', ['sponsor' => $sponsor, 
                                            'month' => $months,
                                            'booth' => $booth,
                                            'space' => $space,
                                            'none' => $none,
                                            'statusCounts' => $statusCounts
                                        ]);
    }

    public function eventReport($id) {
        $sponsor = Sponsorship::findOrFail($id);
        $ongoing = ongoingEventReport::where('sponsorship_id', $id)->get();
        return view('dashboard.dashboard-event-report', ['sponsor' => $sponsor, 'ongoing' => $ongoing]);
    }

    public function submitReport(Request $request, $id) {
        $cashOutReport = json_decode($request->input('cashOutTableData'));
        $stockInHand = json_decode($request->input('salesTableData'));

        $cashOutReport = json_encode($cashOutReport);
        $stockInHand = json_encode($stockInHand);

        $report = new ongoingEventReport();
        $report->day = $request->input('date');
        $report->cash_in_report = $request->input('cash_in_report');
        $report->total_cash_out = $request->input('total_cash_out');
        $report->total_cash_out_num = $request->input('total_cash_out_num');
        $report->total_sale = $request->input('total_sale');
        $report->total_sale_num = $request->input('total_sale_num');
        $report->cash_on_hand = $request->input('cash_on_hand');
        $report->tng = $request->input('tng');
        $report->others = $request->input('others');
        $report->cash_out_report = $cashOutReport;
        $report->stock_on_hand = $stockInHand;
        $report->sponsorship_id = $id;
        $report->save();
        return redirect('/event-report/' . $id);
        
    }

    public function submitEditReport(Request $request, $id, $repID) {
        //dd($request->all());
        $cashOutReport = json_decode($request->input('cashOutTableData'));
        $stockInHand = json_decode($request->input('salesTableData'));

        $cashOutReport = json_encode($cashOutReport);
        $stockInHand = json_encode($stockInHand);

        $report = ongoingEventReport::findOrFail($id);
        $report->day = $request->input('date');
        $report->cash_in_report = $request->input('cash_in_report');
        $report->total_cash_out = $request->input('total_cash_out');
        $report->total_cash_out_num = $request->input('total_cash_out_num');
        $report->total_sale = $request->input('total_sale');
        $report->total_sale_num = $request->input('total_sale_num');
        $report->cash_on_hand = $request->input('cash_on_hand');
        $report->tng = $request->input('tng');
        $report->others = $request->input('others');
        $report->cash_out_report = $cashOutReport;
        $report->stock_on_hand = $stockInHand;
        $report->sponsorship_id = $repID;
        $report->save();
        
    }

    public function downloadAll($type, $id)
    {
        $items = "";
        $filename = "";
        $sponsorship = Sponsorship::findOrFail($id);
        $sponsorshipDate = date("mdy", strtotime($sponsorship->from_date));
    
        if ($type == "proof") {
            $items1 = Sponsorship::findOrFail($id)->attachements_agreement_proof_review;
            $items2 = Sponsorship::findOrFail($id)->attachements_agreement_proof_photo;
            $items3 = Sponsorship::findOrFail($id)->attachements_agreement_proof_video;
            $items4 = Sponsorship::findOrFail($id)->resubmissions;
            $filename = $sponsorshipDate . "-" . $sponsorship->event_name . "-proofOfAggreement";
        } elseif ($type == "after") {           
            $items1 = Sponsorship::findOrFail($id)->after_events_attachments_review;
            $items2 = Sponsorship::findOrFail($id)->after_events_attachments_photo;
            $items3 = Sponsorship::findOrFail($id)->after_events_attachments_video;
            $items4 = "[]";
            $filename = $sponsorshipDate . "-" . $sponsorship->event_name . "-afterEvents";
        } elseif ($type == "events") {
            $items1 = Sponsorship::findOrFail($id)->sponsorship_attachments;
            $items2 = "[]";
            $items3 = "[]";
            $items4 = "[]";
            $filename = $sponsorshipDate . "-" . $sponsorship->event_name . "-sponsorshipAttachments";
        }
    
        // Create a unique temporary directory for the zip file
        $tempDirectory = storage_path('temp_download');
        if (!is_dir($tempDirectory)) {
            mkdir($tempDirectory);
        }
    
        $data1 = json_decode($items1, true);
        $data2 = json_decode($items2, true);
        $data3 = json_decode($items3, true);
        $data4 = json_decode($items4, true);
        // Extract and copy paths for both images and files for items1
        if (is_array($data1)) {
            $subfolderPath = $tempDirectory . '/Review';
            mkdir($subfolderPath);
    
            foreach ($data1 as $path) {
                $filePath = public_path($path);
                copy($filePath, $subfolderPath . '/' . basename($filePath));
            }
        }
    
        // Extract and copy paths for both images and files for items2
        if (is_array($data2)) {
            $subfolderPath = $tempDirectory . '/Photos';
            mkdir($subfolderPath);
    
            foreach ($data2 as $path) {
                $filePath = public_path($path);
                copy($filePath, $subfolderPath . '/' . basename($filePath));
            }
        }
    
        // Extract and copy paths for both images and files for items3
        if (is_array($data3)) {
            $subfolderPath = $tempDirectory . '/Videos';
            mkdir($subfolderPath);
    
            foreach ($data3 as $path) {
                $filePath = public_path($path);
                copy($filePath, $subfolderPath . '/' . basename($filePath));
            }
        }

        // Initialize a counter variable
        $resubmissionCounter = 1;

        if ($data4 !== null) {
            // Loop through each resubmission count
            foreach ($data4 as $resubmissionCount => $resubmissionPaths) {
                // Increment the counter for the next iteration
                $resubmissionCounter++;
        
                // Create a folder for each resubmission count
                $resubmitFolder = "resubmit" . ($resubmissionCount > 0 ? $resubmissionCount : '');
                $subfolderPath = $tempDirectory . '/' . $resubmitFolder;
                if (!is_dir($subfolderPath)) {
                    mkdir($subfolderPath);
                }
        
                // Loop through each type (photo, video, review)
                foreach ($resubmissionPaths['allpaths'] as $type => $paths) {
                    // Create a subfolder for each type inside the resubmit folder
                    $typeFolder = $subfolderPath . '/' . $type;
                    if (!is_dir($typeFolder)) {
                        mkdir($typeFolder);
                    }
        
                    // Loop through each path in the current type
                    foreach ($paths as $path) {
                        // Ensure $path is a string before using it in public_path
                        if (is_string($path)) {
                            $filePath = public_path($path);
                            copy($filePath, $typeFolder . '/' . basename($filePath));
                        }
                    }
                }
            }
        }
        
        
    
        // Create a zip file
        $zipFileName = $filename . ".zip";
        $zip = new ZipArchive;
        $zip->open(storage_path($zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE);
    
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($tempDirectory),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );
    
        foreach ($files as $name => $file) {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($tempDirectory) + 1);
    
                $zip->addFile($filePath, $relativePath);
            }
        }
    
        $zip->close();
    
        // Cleanup: Delete the temporary directory
        $this->rrmdir($tempDirectory);
    
        // Download the zip file
        return response()->download(storage_path($zipFileName))->deleteFileAfterSend(true);
    }


    // Recursive function to remove a directory and its contents
    private function rrmdir($dir)
    {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir . "/" . $object)) {
                        $this->rrmdir($dir . "/" . $object);
                    } else {
                        unlink($dir . "/" . $object);
                    }
                }
            }
            rmdir($dir);
        }
    }

    //--APROVE AGREEMENT CONTROLLER------------------------------------------------------------------
    public function approvePOA($id) {
        $sponsor = Sponsorship::findOrFail($id);
        $sponsor->stat = "proofApproved";
        $sponsor->save();
        Mail::to($sponsor->email)->send(new ApprovedPOA());
        return redirect('/view-request/' . $id);
    }

    public function rejectPOA($id) {
        $sponsor = Sponsorship::findOrFail($id);
        $sponsor->stat = "proofRejected";
        $sponsor->save();
        return redirect('/view-request/' . $id);
    }
}
