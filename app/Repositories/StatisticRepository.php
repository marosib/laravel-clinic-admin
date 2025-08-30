<?php

namespace App\Repositories;

use App\Contracts\StatisticRepositoryInterface;
use App\Models\Visit;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class StatisticRepository implements StatisticRepositoryInterface
{
    public function latestForDoctor(int $doctor_id, int $limit = 5): Collection
    {
        return Visit::query()
            ->select(['id', 'reason', 'visited_at', 'patient_id'])
            ->with('patient:id,name,email,birth_date')
            ->where('doctor_id', $doctor_id)
            ->orderByDesc('visited_at')
            ->limit($limit)
            ->get()
        ;
    }

    public function topReasonsForDoctor(int $doctor_id, int $limit = 3): array
    {
        return Visit::query()
            ->select(['reason', DB::raw('COUNT(*) as total')])
            ->where('doctor_id', $doctor_id)
            ->groupBy('reason')
            ->orderByDesc('total')
            ->limit($limit)
            ->pluck('total','reason')
            ->toArray()
        ;
    }

    public function weeklyVisitsCount(int $doctor_id): int
    {
        return Visit::query()
            ->where('doctor_id', $doctor_id)
            ->whereBetween('visited_at',[now()->startOfWeek(), now()->endOfWeek()])
            ->count();
    }

    public function weeklyVisits(int $doctor_id): Collection
    {
        return Visit::query()
            ->with('patient:id,name,email,birth_date')
            ->where('doctor_id', $doctor_id)
            ->whereBetween('visited_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->orderByDesc('visited_at')
            ->get();
    }

    public function weeklyTopReasons(int $doctor_id): array
    {
        return Visit::query()
            ->select(['reason', DB::raw('COUNT(*) as total')])
            ->where('doctor_id', $doctor_id)
            ->whereBetween('visited_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->groupBy('reason')
            ->orderByDesc('total')
            ->pluck('total','reason')
            ->toArray();
    }

    public function weeklyDailyBreakdown(int $doctor_id): array
    {
        $daily = Visit::query()
            ->select([
                DB::raw('DATE(visited_at) as day'),
                DB::raw('COUNT(*) as total')
            ])
            ->where('doctor_id', $doctor_id)
            ->whereBetween('visited_at',[now()->startOfWeek(), now()->endOfWeek()])
            ->groupBy('day')
            ->orderBy('day')
            ->get()
            ->pluck('total','day')
            ->toArray();

        $weekDays = [];
        for($date = now()->startOfWeek(); $date->lte(now()->endOfWeek()); $date->addDay()) {
            $day = $date->format('Y-m-d');
            $weekDays[$day] = $daily[$day] ?? 0;
        }

        return $weekDays;
    }
}
