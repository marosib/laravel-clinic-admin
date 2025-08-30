<?php

namespace App\Http\Controllers;

use App\Services\StatisticService;

class Dashboard extends Controller
{
    public function __invoke(StatisticService $service)
    {
        $doctor = auth()->user();

        $totalPatients = $service->totalPatients();
        $weeklyVisitCount = $service->weeklyVisitCount($doctor->id);
        $latestVisits = $service->latestVisits($doctor->id, 5);
        $topReasons = $service->topReasons($doctor->id, 3);

        return view('dashboard', compact(
            'totalPatients',
            'weeklyVisitCount',
            'latestVisits',
            'topReasons'
        ));
    }
}
