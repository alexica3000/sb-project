<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Http\Services\ReportService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index() : View
    {
        return view('admin.reports.create');
    }

    public function generate(ReportRequest $request, ReportService $service) : RedirectResponse
    {
        $service->generate($request->validated());

        return redirect()->route('reports.create')->with(['status' => 'Report has been added to queue.']);
    }
}
