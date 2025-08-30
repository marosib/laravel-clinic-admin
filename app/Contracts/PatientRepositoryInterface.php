<?php

namespace App\Contracts;

use App\Models\Patient;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PatientRepositoryInterface
{
    public function countAll(): int;
    public function paginate(?string $search = null, int $per_page = 10): LengthAwarePaginator;
    public function find(int $id): ?Patient;
    public function create(array $data): Patient;
    public function update(Patient $patient, array $data): bool;
    public function delete(Patient $patient): bool;
}
