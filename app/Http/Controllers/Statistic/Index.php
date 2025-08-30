<?php

namespace App\Http\Controllers\Statistic;

use App\Http\Controllers\Controller;
use App\Services\StatisticService;

class Index extends Controller
{
    public function __invoke(StatisticService $service)
    {
        $doctor = auth()->user();

        $weekly_visits_count = $service->weeklyVisitsCount($doctor->id);
        $latest_visits = $service->latestVisits($doctor->id, 5);
        $top_reasons = $service->topReasons($doctor->id, 3);

        return view('statistics.index', compact(
            'weekly_visits_count',
            'latest_visits',
            'top_reasons'
        ));
    }
}
