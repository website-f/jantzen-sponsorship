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
        return view('dashboard.dashboard', ['sponsor' => $sponsor, 'month' => $months]);
    }

    public function viewRequest($id) {
        $sponsor = Sponsorship::findOrFail($id);
        return view('dashboard.dashboard-sponsorship-requests', ['sponsor' => $sponsor]);
    }
}
