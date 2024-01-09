<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\BlockList;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use App\Mail\AgreeNotification;
use App\Mail\SubmitNotification;
use App\Mail\NotagreeNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use App\Mail\SubmitNotificationClient;
use App\Notifications\RequestNotification;
use Illuminate\Support\Facades\Notification;

class SponsorshipController extends Controller
{
    public function submitted() {
        return view("thankyou");
    }

    public function sponsorshipFillRequest(Request $request) {
        // Retrieve the file names from the hidden input field
        if (BlockList::where('email', $request->email)->orWhere('company_name', $request->organization)->orWhere('contact_number', $request->contact)->orWhere('name', $request->name)->exists()) {
            return redirect("/Blacklisted");
        } else {
            $fileDataJson = $request->input('file_names');
            $fileData = json_decode($fileDataJson);
            $files = [];
            if ($fileData !== null) {
                foreach ($fileData as $fileInfo) {
                    // Extract information from the file data
                    $name = $fileInfo->name;
                    $base64Data = $fileInfo->data;
                    $extension = $fileInfo->extension;
            
                    // Generate a unique filename based on the current date and time
                    $currentDate = now(); // Use Laravel's now() helper function
                    $timestamp = $currentDate->timestamp; // Unique timestamp
                    $fileName = $name . $timestamp . '.' . $extension;
            
                    // Decode the base64 data and save it with the unique filename
                    // $decodedData = base64_decode($base64Data);
                    // $destinationPath = public_path('uploads');
                    // $path = $destinationPath . '/' . $fileName;
                    if ($extension == "jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif") {
                        $image = Image::make($base64Data);
                        $image->encode($extension, 10);
                        $destinationPath = public_path('uploads');
                        $path = $destinationPath . '/' . $fileName;
                        $image->save($path);
                    }
                    else {
                        $decodedData = base64_decode($base64Data);
                        $destinationPath = public_path('uploads');
                        $path = $destinationPath . '/' . $fileName;
                        file_put_contents($path, $decodedData);
                    }
                    $files[] = "uploads/" . $fileName;
            
                    // Optionally, you can save the $uniqueFileName to your database for future reference
                }
            }
        
            Mail::to('thezhencreative@gmail.com')->send(new SubmitNotification());
            Mail::to($request->email)->send(new SubmitNotificationClient());
              
            $sponsor = new Sponsorship;
            $sponsor->fullname = $request->name;
            $sponsor->contact = $request->contact;
            $sponsor->email = $request->email;
            $sponsor->organization = $request->organization;
            $sponsor->about_jantzen = $request->about_jantzen;
            $sponsor->event_name = $request->event_name;
            $sponsor->nature_event = $request->nature_event;
            $sponsor->from_date = $request->from_date;
            $sponsor->to_date = $request->to_date;
            $sponsor->summary = $request->summary;
            $sponsor->eventAddress = $request->eventAddress;
            $sponsor->attendees = $request->attendees;
            $sponsor->explaination_product = $request->explaination_product;
            $sponsor->booth = $request->booth;
            $sponsor->sponsorship_attachments = json_encode($files);
            $sponsor->ro_200ml = $request->ro_200ml;
            $sponsor->ro_500ml = $request->ro_500ml;
            $sponsor->ro_11L = $request->ro_11L;
            $sponsor->ro_350ml = $request->ro_350ml;
            $sponsor->save();
        
            $existingUser = User::where('email', $request->email)->first();
        
            if (!$existingUser) {
                $user = new User;
                $user->name = "public user";
                $user->email = $request->email;
                $user->role_id = 4;
                $user->save();
            }
        
            return redirect("/submitted");

        }
       
    }

    public function blacklisted() {
        return view("blacklistNotice");
    }

    public function sponsorshipTrack() {
        $sponsor = Sponsorship::where('email', Auth::user()->email)->latest('created_at')->first();
        $sponsors = Sponsorship::where('email', Auth::user()->email)->orderBy('created_at', 'desc')->get();
        $months = Sponsorship::selectRaw('MONTH(from_date) as month')
                 ->distinct()
                 ->orderBy('month', 'asc')
                 ->pluck('month')
                 ->map(function ($monthNumber) {
                     return Carbon::create()->month($monthNumber)->format('F');
                 });
        return view('track', ['spon' => $sponsor, 'sponsor' => $sponsors, 'month' => $months]);
    }

    public function proofAgreement(Request $request, $id) {
        $sponsor = Sponsorship::findOrFail($id);
        //Review
        $fileDataJsonReview = $request->input('file_names');
        $fileDataReview = json_decode($fileDataJsonReview);
        $filesReview = [];
        //Photo
        $fileDataJsonPhoto = $request->input('file_names_photos');
        $fileDataPhoto = json_decode($fileDataJsonPhoto);
        $filesPhoto = [];
        //Video
        $fileDataJsonVideo = $request->input('file_names_videos');
        $fileDataVideo = json_decode($fileDataJsonVideo);
        $filesVideo = [];

        if ($fileDataReview != null) {
            foreach ($fileDataReview as $fileInfo) {
                // Extract information from the file data
                $name = $fileInfo->name;
                $base64Data = $fileInfo->data;
                $extension = $fileInfo->extension;
        
                $currentDate = now(); // Use Laravel's now() helper function
                $timestamp = $currentDate->timestamp; // Unique timestamp
                $fileName = $name . $timestamp . '.' . $extension;
        
                if ($extension == "jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif") {
                    $image = Image::make($base64Data);
                    $image->encode($extension, 10);
                    $destinationPath = public_path('agreement');
                    $path = $destinationPath . '/' . $fileName;
                    $image->save($path);
                }
                else {
                    $decodedData = base64_decode($base64Data);
                    $destinationPath = public_path('agreement');
                    $path = $destinationPath . '/' . $fileName;
                    file_put_contents($path, $decodedData);
                }
                $filesReview[] = "agreement/" . $fileName;
            }
        }

        if ($fileDataPhoto != null) {
            foreach ($fileDataPhoto as $fileInfo) {
                // Extract information from the file data
                $name = $fileInfo->name;
                $base64Data = $fileInfo->data;
                $extension = $fileInfo->extension;
        
                $currentDate = now(); // Use Laravel's now() helper function
                $timestamp = $currentDate->timestamp; // Unique timestamp
                $fileName = $name . $timestamp . '.' . $extension;
        
                if ($extension == "jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif") {
                    $image = Image::make($base64Data);
                    $image->encode($extension, 10);
                    $destinationPath = public_path('agreement');
                    $path = $destinationPath . '/' . $fileName;
                    $image->save($path);
                }
                else {
                    $decodedData = base64_decode($base64Data);
                    $destinationPath = public_path('agreement');
                    $path = $destinationPath . '/' . $fileName;
                    file_put_contents($path, $decodedData);
                }
                $filesPhoto[] = "agreement/" . $fileName;
            }
        }

        if ($fileDataVideo != null) {
            foreach ($fileDataVideo as $fileInfo) {
                // Extract information from the file data
                $name = $fileInfo->name;
                $base64Data = $fileInfo->data;
                $extension = $fileInfo->extension;
        
                $currentDate = now(); // Use Laravel's now() helper function
                $timestamp = $currentDate->timestamp; // Unique timestamp
                $fileName = $name . $timestamp . '.' . $extension;
        
                if ($extension == "jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif") {
                    $image = Image::make($base64Data);
                    $image->encode($extension, 10);
                    $destinationPath = public_path('agreement');
                    $path = $destinationPath . '/' . $fileName;
                    $image->save($path);
                }
                else {
                    $decodedData = base64_decode($base64Data);
                    $destinationPath = public_path('agreement');
                    $path = $destinationPath . '/' . $fileName;
                    file_put_contents($path, $decodedData);
                }
                $filesVideo[] = "agreement/" . $fileName;
            }
        }

    
        $sponsor->attachements_agreement_proof_review = json_encode($filesReview);
        $sponsor->attachements_agreement_proof_photo = json_encode($filesPhoto);
        $sponsor->attachements_agreement_proof_video = json_encode($filesVideo);
        $sponsor->states = "Pending";
        $sponsor->save();
        return redirect("/sponsorship-tracking");

    }

    public function collectorDetails(Request $request, $id) {
        $sponsor = Sponsorship::findOrFail($id);
        $sponsor->collection_date = $request->collection_date;
        $sponsor->collection_time_slot = $request->collection_time_slot;
        $sponsor->collector_name = $request->collector_name;
        $sponsor->collector_IC = $request->collector_IC;
        $sponsor->collector_contact = $request->collector_contact;
        $sponsor->collector_plate_number = $request->collector_plate_number;
        $sponsor->states = "Pending Collection";
        $sponsor->save();
        return redirect("/sponsorship-tracking");
    }

    public function afterEvent(Request $request, $id) {
        $sponsor = Sponsorship::findOrFail($id);
        //Review
        $fileDataJsonReview = $request->input('file_names');
        $fileDataReview = json_decode($fileDataJsonReview);
        $filesReview = [];
        //Photo
        $fileDataJsonPhoto = $request->input('file_names_photos');
        $fileDataPhoto = json_decode($fileDataJsonPhoto);
        $filesPhoto = [];
        //Video
        $fileDataJsonVideo = $request->input('file_names_videos');
        $fileDataVideo = json_decode($fileDataJsonVideo);
        $filesVideo = [];

        if ($fileDataReview != null) {
            foreach ($fileDataReview as $fileInfo) {
                // Extract information from the file data
                $name = $fileInfo->name;
                $base64Data = $fileInfo->data;
                $extension = $fileInfo->extension;
        
                $currentDate = now(); // Use Laravel's now() helper function
                $timestamp = $currentDate->timestamp; // Unique timestamp
                $fileName = $name . $timestamp . '.' . $extension;
        
                if ($extension == "jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif") {
                    $image = Image::make($base64Data);
                    $image->encode($extension, 10);
                    $destinationPath = public_path('agreement');
                    $path = $destinationPath . '/' . $fileName;
                    $image->save($path);
                }
                else {
                    $decodedData = base64_decode($base64Data);
                    $destinationPath = public_path('agreement');
                    $path = $destinationPath . '/' . $fileName;
                    file_put_contents($path, $decodedData);
                }
                $filesReview[] = "agreement/" . $fileName;
            }
        }

        if ($fileDataPhoto != null) {
            foreach ($fileDataPhoto as $fileInfo) {
                // Extract information from the file data
                $name = $fileInfo->name;
                $base64Data = $fileInfo->data;
                $extension = $fileInfo->extension;
        
                $currentDate = now(); // Use Laravel's now() helper function
                $timestamp = $currentDate->timestamp; // Unique timestamp
                $fileName = $name . $timestamp . '.' . $extension;
        
                if ($extension == "jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif") {
                    $image = Image::make($base64Data);
                    $image->encode($extension, 10);
                    $destinationPath = public_path('agreement');
                    $path = $destinationPath . '/' . $fileName;
                    $image->save($path);
                }
                else {
                    $decodedData = base64_decode($base64Data);
                    $destinationPath = public_path('agreement');
                    $path = $destinationPath . '/' . $fileName;
                    file_put_contents($path, $decodedData);
                }
                $filesPhoto[] = "agreement/" . $fileName;
            }
        }

        if ($fileDataVideo != null) {
            foreach ($fileDataVideo as $fileInfo) {
                // Extract information from the file data
                $name = $fileInfo->name;
                $base64Data = $fileInfo->data;
                $extension = $fileInfo->extension;
        
                $currentDate = now(); // Use Laravel's now() helper function
                $timestamp = $currentDate->timestamp; // Unique timestamp
                $fileName = $name . $timestamp . '.' . $extension;
        
                if ($extension == "jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif") {
                    $image = Image::make($base64Data);
                    $image->encode($extension, 10);
                    $destinationPath = public_path('agreement');
                    $path = $destinationPath . '/' . $fileName;
                    $image->save($path);
                }
                else {
                    $decodedData = base64_decode($base64Data);
                    $destinationPath = public_path('agreement');
                    $path = $destinationPath . '/' . $fileName;
                    file_put_contents($path, $decodedData);
                }
                $filesVideo[] = "agreement/" . $fileName;
            }
        }
       
        $sponsor->after_events_attachments_review = json_encode($filesReview);
        $sponsor->after_events_attachments_photo = json_encode($filesPhoto);
        $sponsor->after_events_attachments_video = json_encode($filesVideo);
        $sponsor->states = "Completed";
        $sponsor->save();
        return redirect("/sponsorship-tracking");
    }

    public function agreeProof($id) {
        $sponsor = Sponsorship::findOrFail($id);
        $sponsor->status = "agree";
        $sponsor->stat = "proofApproved";
        $sponsor->save();
        $user = User::where('name', $sponsor->handle_by)->first();
        Mail::to($user->email)->send(new AgreeNotification($sponsor->email, $sponsor->contact, $sponsor->fullname));
        return redirect("/sponsorship-tracking");
    }

    public function notagreeProof($id) {
        $sponsor = Sponsorship::findOrFail($id);
        $sponsor->status = "notAgree";
        $sponsor->stat = "proofRejected";
        $sponsor->save();
        $user = User::where('name', $sponsor->handle_by)->first();
        Mail::to($user->email)->send(new NotagreeNotification($sponsor->email, $sponsor->contact, $sponsor->fullname));
        return redirect("/sponsorship-tracking");
    }

    public function undo($id) {
        $sponsor = Sponsorship::findOrFail($id);
        $sponsor->status = " ";
        $sponsor->stat = "none";
        $sponsor->save();
        return redirect("/sponsorship-tracking");
    }
}
