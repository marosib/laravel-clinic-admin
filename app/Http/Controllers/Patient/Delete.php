<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Services\PatientService;

class Delete extends Controller
{
    public function __invoke(Patient $id, PatientService $service)
    {
        $service->destroy($id);

        return redirect()->route('admin.patients.index')->with('success','Beteg sikeresen törölve.');
    }
}
