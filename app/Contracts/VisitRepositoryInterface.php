<?php

namespace App\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface VisitRepositoryInterface
{
    public function forPatientPaginate(int $patient_id): LengthAwarePaginator;
}
