<?php

namespace App\Http\Controllers;

use App\Services\StatisticService;

class Dashboard extends Controller
{
    public function __invoke(StatisticService $service)
    {
        $doctor = auth()->user();

        $total_patients = $service->totalPatients();
        $weekly_visits_count = $service->weeklyVisitsCount($doctor->id);
        $latest_visits = $service->latestVisits($doctor->id, 5);
        $top_reasons = $service->topReasons($doctor->id, 3);

        return view('dashboard', compact(
            'total_patients',
            'weekly_visits_count',
            'latest_visits',
            'top_reasons'
        ));
    }
}
