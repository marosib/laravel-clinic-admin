<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Services\PatientService;

class Delete extends Controller
{
    public function __invoke(Patient $patient, PatientService $service)
    {
        $service->destroy($patient);

        return redirect()->route('admin.patients.index')->with('success','Beteg sikeresen törölve.');
    }
}
