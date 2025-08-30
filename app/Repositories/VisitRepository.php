<?php

namespace App\Repositories;

use App\Contracts\VisitRepositoryInterface;
use App\Models\Visit;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class VisitRepository implements VisitRepositoryInterface
{
    public function forPatient(int $patient_id): Collection
    {
        return Visit::query()
            ->select(['id', 'reason', 'visited_at'])
            ->with('doctor:id,name,patient_id')
            ->where('patient_id', $patient_id)
            ->orderByDesc('visited_at')
            ->get()
        ;
    }

    public function countThisWeekForDoctor(int $doctor_id): int
    {
        return Visit::query()
            ->select(['id', 'reason', 'visited_at'])
            ->where('doctor_id', $doctor_id)
            ->whereBetween('visited_at',[now()->startOfWeek(), now()->endOfWeek()])
            ->count()
        ;
    }

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
}
