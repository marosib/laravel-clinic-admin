<?php

namespace App\Services;

use App\Contracts\VisitRepositoryInterface;
use App\Models\Patient;
use App\Models\Visit;

class VisitService
{
    public function __construct(private VisitRepositoryInterface $visits)
    {}

    public function listForPatient(int $patient_id, int $per_page = 10)
    {
        return $this->visits->forPatientPaginate($patient_id ,$per_page);
    }

    public function store(Patient $patient, int $doctor_id, array $data): Visit
    {
        if (empty($data['visited_at'])) {
            $data['visited_at'] = now();
        }

        $data['patient_id'] = $patient->id;
        $data['doctor_id'] = $doctor_id;

        return $this->visits->create($data);
    }

    public function destroy(Visit $visit): bool
    {
        return $this->visits->delete($visit);
    }
}
