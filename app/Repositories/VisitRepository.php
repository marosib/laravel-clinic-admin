<?php

namespace App\Repositories;

use App\Contracts\VisitRepositoryInterface;
use App\Models\Visit;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class VisitRepository implements VisitRepositoryInterface
{
    public function forPatientPaginate(int $patient_id, int $per_page = 10): LengthAwarePaginator
    {
        return Visit::query()
            ->select(['id', 'reason', 'visited_at'])
            ->where('patient_id', $patient_id)
            ->orderByDesc('visited_at')
            ->latest('id')
            ->paginate($per_page)
            ->withQueryString()
        ;
    }

    public function create(array $data): Visit
    {
        return Visit::create($data);
    }

    public function delete(Visit $visit): bool
    {
        return (bool) $visit->delete();
    }

}
