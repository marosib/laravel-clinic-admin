<?php

namespace App\Http\Controllers\Visit;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use App\Services\VisitService;

class Delete extends Controller
{

    public function __invoke(Visit $visit, VisitService $service)
    {
        $service->destroy($visit);

        return redirect()->back()->with('success', 'Vizit sikeresen törölve.');
    }
}
