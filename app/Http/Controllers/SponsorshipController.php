<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\BlockList;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use App\Mail\SubmitNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use App\Notifications\RequestNotification;
use Illuminate\Support\Facades\Notification;

class SponsorshipController extends Controller
{
    public function sponsorshipFillRequest(Request $request) {
        // Retrieve the file names from the hidden input field
        if (BlockList::where('email', $request->email)->orWhere('company_name', $request->organization)->orWhere('contact_number', $request->contact)->orWhere('name', $request->name)->exists()) {
            return redirect("/Blacklisted");
        } else {
            $fileDataJson = $request->input('file_names');
            $fileData = json_decode($fileDataJson);
            $files = [];
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
        
            Mail::to('gitdev1234@gmail.com')->send(new SubmitNotification());
              
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
            $sponsor->eventAddress = $request->eventAddress;
            $sponsor->attendees = $request->attendees;
            $sponsor->explaination_product = $request->explaination_product;
            $sponsor->booth = $request->booth;
            $sponsor->sposorship_attachments = json_encode($files);
            $sponsor->ro_200ml = $request->ro_200ml;
            $sponsor->ro_500ml = $request->ro_500ml;
            $sponsor->ro_11L = $request->ro_11L;
            $sponsor->ro_350ml = $request->ro_350ml;
            $sponsor->status = "submit";
            $sponsor->save();
        
            $existingUser = User::where('email', $request->email)->first();
        
            if (!$existingUser) {
                $user = new User;
                $user->name = "public user";
                $user->email = $request->email;
                $user->role_id = 4;
                $user->save();
            }
        
            return redirect("/login");

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
        $fileDataJson = $request->input('file_names');
        $fileData = json_decode($fileDataJson);
        $files = [];

        foreach ($fileData as $fileInfo) {
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
            $files[] = "agreement/" . $fileName;
        }
    
        $sponsor->attachements_agreement_proof = json_encode($files);
        $sponsor->status = "proof";
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
        $sponsor->status = "collect";
        $sponsor->save();
        return redirect("/sponsorship-tracking");
    }

    public function afterEvent(Request $request, $id) {
        $sponsor = Sponsorship::findOrFail($id);
        $fileDataJson = $request->input('file_names');
        $fileData = json_decode($fileDataJson);
        $files = [];
        foreach ($fileData as $fileInfo) {
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
            $files[] = "agreement/" . $fileName;
        }
        $sponsor->after_events_attachments = json_encode($files);
        $sponsor->states = "Completed";
        $sponsor->status = "complete";
        $sponsor->save();
        return redirect("/sponsorship-tracking");
    }
}
