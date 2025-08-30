<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visit>
 */
class VisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reason' => collect(['Megfázás','Fejfájás','Allergia','Kontroll','Vérnyomás'])->random(),
            'visited_at' => now()->subDays(rand(0,30))->setTime(rand(8,16), [0,15,30,45][rand(0,3)]),
        ];
    }
}
