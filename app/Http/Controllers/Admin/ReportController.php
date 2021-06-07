<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Jobs\CreateReportJob;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index() : View
    {
        return view('admin.reports.create');
    }

    public function generate(ReportRequest $request) : RedirectResponse
    {
        CreateReportJob::dispatch(auth()->user(), $request->input('type_data'));

        return redirect()->route('reports.create')->with(['status' => 'Report has been added to queue.']);
    }
}
