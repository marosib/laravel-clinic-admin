<?php

namespace App\Http\Controllers\Statistic;

use App\Http\Controllers\Controller;
use App\Services\StatisticService;

class Index extends Controller
{
    public function __invoke(StatisticService $service)
    {
        $doctor = auth()->user();

        $weeklyVisitCount = $service->weeklyVisitCount($doctor->id);
        $latestVisits = $service->latestVisits($doctor->id, 5);
        $topReasons = $service->topReasons($doctor->id, 3);

        return view('statistics.index', compact(
            'weeklyVisitCount',
            'latestVisits',
            'topReasons'
        ));
    }
}
