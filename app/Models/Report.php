<?php

namespace App\Models;

use App\Enums\ReportStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['type', 'from_date', 'to_date', 'status'])]
class Report extends Model
{
    protected function casts(): array
    {
        return [
            'from_date' => 'date',
            'to_date' => 'date',
            'status' => ReportStatus::class,
        ];
    }
}
