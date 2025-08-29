<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use App\Services\PatientService;

class Update extends Controller
{
    public function __invoke(Patient $id, UpdatePatientRequest $request, PatientService $service)
    {
        $service->update($id, $request->validated());

        return redirect()->route('admin.patients.index')->with('success','Beteg adatai sikeresen módosítva.');
    }
}
