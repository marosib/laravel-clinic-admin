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
                'doctor_id'  => $doctor->id,
                'reason'     => collect(['Megfázás','Fejfájás','Allergia','Kontroll','Vérnyomás'])->random(),
                'visited_at' => now()->subDays(rand(0,30))->setTime(rand(8,16), [0,15,30,45][rand(0,3)]),
            ]);
        });
    }
}
