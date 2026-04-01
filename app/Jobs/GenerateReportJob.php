<?php

namespace App\Jobs;

use App\Enums\ReportStatus;
use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateReportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public Report $report) {}

    public function handle(): void
    {
        //report busniness logiv

        $this->report->update(['status' => ReportStatus::Completed]);
    }
}
