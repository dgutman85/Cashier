<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;

use App\Http\Requests;

class ReportController extends Controller
{
    public function get()
    {
        $reports = Report::all();
        return view('reports.reports', compact('reports'));
    }
}
