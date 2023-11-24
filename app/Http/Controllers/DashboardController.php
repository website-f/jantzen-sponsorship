<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use App\Models\ongoingEventReport;
use App\Http\Controllers\Controller;
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
        $booth = Sponsorship::where("booth_space", "Booth")->orderBy('created_at', 'desc')->get();
        $space = Sponsorship::where("booth_space", "Space")->orderBy('created_at', 'desc')->get();
        $none = Sponsorship::where("booth_space", "None")->orderBy('created_at', 'desc')->get();
        $statusCounts = $sponsor->groupBy('states')->map->count();
        return view('dashboard.dashboard', ['sponsor' => $sponsor, 
                                            'month' => $months,
                                            'booth' => $booth,
                                            'space' => $space,
                                            'none' => $none,
                                            'statusCounts' => $statusCounts
                                        ]);
    }

    public function viewRequest($id) {
        $sponsor = Sponsorship::findOrFail($id);
        $user = User::where('role_id', 2)->get();
        return view('dashboard.dashboard-sponsorship-requests', ['sponsor' => $sponsor, 'user' => $user]);
    }

    public function requestSubmit(Request $request, $id) {
        $attending = explode(",", $request->attending);
        $sponsor = Sponsorship::findOrFail($id);
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
        $sponsor->states = "Pending";
        $sponsor->status = "approval";
        $sponsor->save();
        return redirect("/dashboard");
    }

    public function calendar() {
        $sponsor = Sponsorship::all();
        return view('dashboard.dashboard-calendar', ['sponsor' => $sponsor]);
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
        return redirect("/dashboard");
    }

    public function trash() {
        $sponsor = Sponsorship::onlyTrashed()->get();
        return view('dashboard.dashboard-sponsorship-archive', ['sponsor' => $sponsor]);
    }

    public function restore($id) {
        $sponsor = Sponsorship::withTrashed()->where('id', $id)->restore();

        if ($sponsor) {
            Session::flash('status', 'success');
            Session::flash('message', 'Item restored !');
        }

        return redirect("/dashboard/trash");
    }

    public function permanentDelete($id) {
        
    }

    public function ongoingEventReport() {
        $sponsor = Sponsorship::whereIn('states', ['Pending', 'Completed', 'Collected'])->orderBy('created_at', 'desc')->get();
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
        return redirect('/dashboard/event-report/' . $id);
        
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
}
