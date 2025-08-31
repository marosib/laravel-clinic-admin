<?php

namespace App\Http\Controllers\Visit;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVisitRequest;
use App\Models\Patient;
use App\Services\VisitService;

class Store extends Controller
{
    public function __invoke(Patient $patient, StoreVisitRequest $request, VisitService $service)
    {
        $doctor_id = auth()->id();

        $service->store($patient, $doctor_id, $request->validated());

        return redirect()->route('admin.patients.show', $patient)->with('success', 'Vizit sikeresen rögzítve.');
    }
}
