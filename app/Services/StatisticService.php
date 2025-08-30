<?php

namespace App\Services;

use App\Contracts\StatisticRepositoryInterface;
use App\Contracts\PatientRepositoryInterface;
use Illuminate\Support\Collection;

class StatisticService
{
    public function __construct(
        private StatisticRepositoryInterface $statistics,
        private PatientRepositoryInterface $patients
    ) {}

    public function latestVisits(int $doctor_id, int $limit = 5)
    {
        return $this->statistics->latestForDoctor($doctor_id, $limit);
    }

    public function topReasons(int $doctor_id, int $limit = 3): array
    {
        return $this->statistics->topReasonsForDoctor($doctor_id, $limit);
    }

    public function totalPatients(): int
    {
        return $this->patients->countAll();
    }

    public function weeklyVisitsCount(int $doctor_id): int
    {
        return $this->statistics->weeklyVisitsCount($doctor_id);
    }

    public function weeklyVisits(int $doctor_id): Collection
    {
        return $this->statistics->weeklyVisits($doctor_id);
    }

    public function weeklyTopReasons(int $doctor_id): array
    {
        return $this->statistics->weeklyTopReasons($doctor_id);
    }

    public function weeklyDailyBreakdown(int $doctor_id): array
    {
        return $this->statistics->weeklyDailyBreakdown($doctor_id);
    }
}
