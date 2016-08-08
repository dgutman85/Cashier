<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;

use App\Http\Requests;

class ReportController extends Controller
{
    public function get(Request $request)
    {
        $reports = Report::ofType($request->get('type'))->ofDate($request->get('created_at'))->paginate(10);
        return view('reports.reports', compact('reports'));
    }
}
