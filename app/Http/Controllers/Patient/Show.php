<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Services\PatientService;

class Show extends Controller
{
    public function __invoke(int $id, PatientService $service)
    {
        $patient = $service->show($id);
        abort_if(!$patient, 404);

        return view('patients.show', compact('patient'));
    }
}
