<?php

namespace App\Http\Controllers\Export;

use App\Exports\StatisticsExport;
use App\Http\Controllers\Controller;
use App\Services\StatisticService;
use Maatwebsite\Excel\Facades\Excel;

class Statistics extends Controller
{
    public function __invoke(StatisticService $service)
    {
        $doctor_id = auth()->id();

        $data = [
            'weekly_visits_count'    => $service->weeklyVisitsCount($doctor_id),
            'weekly_visits'   => $service->weeklyVisits($doctor_id),
            'weekly_top_reasons'     => $service->weeklyTopReasons($doctor_id),
            'weekly_daily_breakdown' => $service->weeklyDailyBreakdown($doctor_id),
        ];

        $file_name = "heti_statisztika_{$doctor_id}_".now()->format('Ymd_His').".xlsx";

        return Excel::download(new StatisticsExport($data), $file_name);
    }
}
