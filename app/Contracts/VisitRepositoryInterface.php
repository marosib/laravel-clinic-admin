<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface VisitRepositoryInterface
{
    public function forPatient(int $patient_id): Collection;
    public function countThisWeekForDoctor(int $doctor_id): int;
    public function latestForDoctor(int $doctor_id, int $limit = 5): Collection;
    public function topReasonsForDoctor(int $doctor_id, int $limit = 3): array;
}
