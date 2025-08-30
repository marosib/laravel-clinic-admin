<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface StatisticRepositoryInterface
{
    public function latestForDoctor(int $doctor_id, int $limit = 5): Collection;
    public function topReasonsForDoctor(int $doctor_id, int $limit = 3): array;
    public function weeklyVisitsCount(int $doctor_id): int;
    public function weeklyVisits(int $doctor_id): Collection;
    public function weeklyTopReasons(int $doctor_id): array;
    public function weeklyDailyBreakdown(int $doctor_id): array;
}
