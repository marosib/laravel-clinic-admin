<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Database\Seeder;

class PatientVisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctor = User::where('email','dr_teszt@example.com')->first();

        Patient::factory()->count(10)->create()->each(function($p) use ($doctor) {
            Visit::factory()->count(rand(3,7))->create([
                'patient_id' => $p->id,
                'doctor_id' => $doctor->id,
            ]);
        });
    }
}
