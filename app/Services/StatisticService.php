<?php

namespace App\Services;

use App\Contracts\PatientRepositoryInterface;
use App\Contracts\VisitRepositoryInterface;

class StatisticService
{
    public function __construct(
        private VisitRepositoryInterface $visits,
        private PatientRepositoryInterface $patients
    ) {}

    public function weeklyVisitCount(int $doctor_id): int
    {
        return $this->visits->countThisWeekForDoctor($doctor_id);
    }

    public function latestVisits(int $doctor_id, int $limit = 5)
    {
        return $this->visits->latestForDoctor($doctor_id, $limit);
    }

    public function topReasons(int $doctor_id, int $limit = 3): array
    {
        return $this->visits->topReasonsForDoctor($doctor_id, $limit);
    }

    public function totalPatients(): int
    {
        return $this->patients->countAll();
    }
}
