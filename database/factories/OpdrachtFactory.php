<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OpdrachtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'created_at' => now(),
            'updated_at' => now(),
            'start_datum' => fake()->dateTimeThisMonth(),
            'eind_datum' => fake()->dateTimeThisMonth(),
            'start_tijd' => '12:00',
            'eind_tijd' => '16:00',
            'titel' => 'Opdracht!!',
            'omschrijving' => fake()->text(),
        ];
    }
}
