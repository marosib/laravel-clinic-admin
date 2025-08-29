<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;
use App\Services\PatientService;

class Store extends Controller
{
    public function __invoke(StorePatientRequest $request, PatientService $service)
    {
        $service->store($request->validated());

        return redirect()->route('admin.patients.index')->with('success','Beteg létrehozva.');
    }
}
