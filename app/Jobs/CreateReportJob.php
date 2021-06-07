<?php

namespace App\Jobs;

use App\Exports\ReportExport;
use App\Http\Services\ReportService;
use App\Models\User;
use App\Notifications\ReportNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class CreateReportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $data;
    private User $user;

    public function __construct(User $user, array $data)
    {
        $this->user = $user;
        $this->data = $data;
    }

    public function handle(ReportService $service)
    {
        $data = $service->generate($this->data);
        $fileName = 'report_' . now() . '.xlsx';

        Excel::store(new ReportExport($data), $fileName);
        $this->user->notify(new ReportNotification($fileName));
    }
}
