<?php

namespace App\Contracts;

use App\Models\Visit;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface VisitRepositoryInterface
{
    public function forPatientPaginate(int $patient_id): LengthAwarePaginator;
    public function create(array $data): Visit;
    public function delete(Visit $visit): bool;
}
