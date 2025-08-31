<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Services\PatientService;
use App\Services\VisitService;

class Show extends Controller
{
    public function __invoke(int $patient, PatientService $service, VisitService $visitService)
    {
        $patient = $service->show($patient);
        abort_if(!$patient, 404);

        $visits = $visitService->listForPatient($patient->id);

        return view('patients.show', compact(
            'patient',
            'visits'
        ));
    }
}
