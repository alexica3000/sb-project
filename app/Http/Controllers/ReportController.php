<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.reports.create');
    }

    public function generate()
    {
        dd('test');
    }
}
