<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ReportExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Http\Services\ReportService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index() : View
    {
        return view('admin.reports.create');
    }

    public function generate(ReportRequest $request, ReportService $service)
    {
        $data = $service->generate($request->input('type_data'));
        return Excel::download(new ReportExport($data), 'report.xlsx');

//        return redirect()->route('reports.create')->with(['status' => 'Report has been added to queue.']);
    }
}
