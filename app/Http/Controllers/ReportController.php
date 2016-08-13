<?php

namespace App\Http\Controllers;

use App\Report;
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
}
