<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Services\PatientService;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function __invoke(Request $request, PatientService $service)
    {
        $patients = $service->list($request->string('search'), $request->input('per_page', 10));

        return view('patients.index', compact('patients'));
    }
}
