<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;

class Create extends Controller
{
    public function __invoke()
    {
        return view('patients.create');
    }
}
