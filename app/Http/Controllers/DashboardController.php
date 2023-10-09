<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard() {
        $sponsor = Sponsorship::orderBy('created_at', 'desc')->get();
        $months = Sponsorship::selectRaw('MONTH(created_at) as month')
                 ->distinct()
                 ->orderBy('month', 'asc')
                 ->pluck('month')
                 ->map(function ($monthNumber) {
                     return Carbon::create()->month($monthNumber)->format('F');
                 });
        $booth = Sponsorship::where("booth_space", "Booth")->orderBy('created_at', 'desc')->get();
        $space = Sponsorship::where("booth_space", "Space")->orderBy('created_at', 'desc')->get();
        return view('dashboard.dashboard', ['sponsor' => $sponsor, 
                                            'month' => $months,
                                            'booth' => $booth,
                                            'space' => $space]);
    }

    public function viewRequest($id) {
        $sponsor = Sponsorship::findOrFail($id);
        return view('dashboard.dashboard-sponsorship-requests', ['sponsor' => $sponsor]);
    }

    public function requestSubmit(Request $request, $id) {
        $attending = explode(",", $request->attending);
        $sponsor = Sponsorship::findOrFail($id);
        $sponsor->states = $request->states;
        $sponsor->attending = json_encode($attending);
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
        $sponsor->pickup_location = $request->pickup_location;
        $sponsor->pickup_address = $request->pickup_address;
        $sponsor->contact_person = $request->contact_person;
        $sponsor->pickup_phone_number = $request->pickup_phone_number;
        $sponsor->status = "approval";
        $sponsor->save();
        return redirect("/dashboard");
    }
}
