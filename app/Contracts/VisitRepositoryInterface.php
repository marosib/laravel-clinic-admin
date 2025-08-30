<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface VisitRepositoryInterface
{
    public function forPatient(int $patient_id): Collection;
}
