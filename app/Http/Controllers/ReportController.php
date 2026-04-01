<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use App\Http\Resources\ReportResource;
use App\Enums\ReportStatus;
use App\Jobs\GenerateReportJob;
use App\Models\Report;

class ReportController extends Controller
{
    public function store(StoreReportRequest $request)
    {
        $report = Report::create([
            ...$request->validated(),
            'status' => ReportStatus::Pending,
        ]);

        GenerateReportJob::dispatch($report);

        return (new ReportResource($report))
            ->additional(['message' => 'Report generation started.'])
            ->response()
            ->setStatusCode(202);
    }
}
