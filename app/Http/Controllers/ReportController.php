<?php

namespace App\Http\Controllers;

use App\Money;
use App\Report;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function get(Request $request)
    {
        $reports = Report::ofType($request->get('type'))
            ->ofDate($request->get('created_at'))
            ->where('box_id', Auth::user()->box_id)
            ->paginate(10);

        return view('reports.reports', compact('reports'));
    }

    public function view($id)
    {
        $monedas = Money::lists('name', 'id');
        $report = Report::find($id);
        $detail = json_decode($report->detail, true);

        return view('reports.view', compact('monedas','report','detail'));
    }
}
