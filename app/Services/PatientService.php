<?php

namespace App\Services;

use App\Contracts\PatientRepositoryInterface;
use App\Models\Patient;

class PatientService
{
    public function __construct(private PatientRepositoryInterface $patients)
    {}

    public function list(?string $search = null, int $per_page = 10)
    {
        return $this->patients->paginate($search, $per_page);
    }

    public function show(int $id): ?Patient
    {
        return $this->patients->find($id);
    }

    public function store(array $data): Patient
    {
        return $this->patients->create($data);
    }

    public function update(Patient $patient, array $data): bool
    {
        return $this->patients->update($patient, $data);
    }

    public function destroy(Patient $patient): bool
    {
        return $this->patients->delete($patient);
    }
}
