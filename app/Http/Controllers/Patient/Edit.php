<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Services\PatientService;

class Edit extends Controller
{
    public function __invoke(int $patient, PatientService $service)
    {
        $patient = $service->show($patient);
        abort_if(!$patient, 404);

        return view('patients.edit', compact('patient'));
    }
}
