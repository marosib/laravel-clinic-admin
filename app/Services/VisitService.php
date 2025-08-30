<?php

namespace App\Services;

use App\Contracts\VisitRepositoryInterface;

class VisitService
{
    public function __construct(private VisitRepositoryInterface $visits)
    {}

    public function listForPattient(int $patient_id, int $per_page = 10)
    {
        return $this->visits->forPatientPaginate($patient_id ,$per_page);
    }
}
