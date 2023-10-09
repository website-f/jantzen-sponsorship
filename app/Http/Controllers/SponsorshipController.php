<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SponsorshipController extends Controller
{
    public function sponsorshipFillRequest(Request $request) {
        // Retrieve the file names from the hidden input field
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
        $decodedData = base64_decode($base64Data);
        $destinationPath = public_path('uploads');
        $path = $destinationPath . '/' . $fileName;
        $files[] = "uploads/" . $fileName;

        file_put_contents($path, $decodedData);

        // Optionally, you can save the $uniqueFileName to your database for future reference
    }
      
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

    $user = new User;
    $user->name = "public user";
    $user->email = $request->email;
    $user->role_id = 3;
    $user->save();
    return redirect("/");
    }

    public function sponsorshipTrack() {
        $sponsor = Sponsorship::where('email', Auth::user()->email)->first();
        return view('track', ['spon' => $sponsor]);
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

        // Generate a unique filename based on the current date and time
        $currentDate = now(); // Use Laravel's now() helper function
        $timestamp = $currentDate->timestamp; // Unique timestamp
        $fileName = $name . $timestamp . '.' . $extension;

        // Decode the base64 data and save it with the unique filename
        $decodedData = base64_decode($base64Data);
        $destinationPath = public_path('agreement');
        $path = $destinationPath . '/' . $fileName;
        $files[] = "agreement/" . $fileName;

        file_put_contents($path, $decodedData);

        // Optionally, you can save the $uniqueFileName to your database for future reference
    }
        $sponsor->attachements_agreement_proof = json_encode($files);
        $sponsor->status = "proof";
        $sponsor->save();
        return redirect("/sponsorship-tracking");

    }
}
