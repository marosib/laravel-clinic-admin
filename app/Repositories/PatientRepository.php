<?php

namespace App\Repositories;

use App\Contracts\PatientRepositoryInterface;
use App\Models\Patient;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PatientRepository implements PatientRepositoryInterface
{
    public function countAll(): int
    {
        return Patient::count();
    }

    public function paginate(?string $search = null, int $per_page = 10): LengthAwarePaginator
    {
        return Patient::query()
            ->select(['id', 'name', 'email', 'birth_date'])
            ->when($search, fn($q) => $q
                ->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%"))
            ->latest('id')
            ->paginate($per_page)
            ->withQueryString()
        ;
    }

    public function find(int $id): ?Patient
    {
        return Patient::query()
            ->where('id', $id)
            ->select(['id', 'name', 'email', 'birth_date', 'created_at', 'updated_at'])
            ->first()
        ;
    }

    public function create(array $data): Patient
    {
        return Patient::create($data);
    }

    public function update(Patient $patient, array $data): bool
    {
        return $patient->update($data);
    }

    public function delete(Patient $patient): bool
    {
        return (bool)$patient->delete();
    }

}
