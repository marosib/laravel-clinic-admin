<?php

namespace App\Repositories;

use App\Contracts\VisitRepositoryInterface;
use App\Models\Visit;
use Illuminate\Support\Collection;

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
}
