<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jet>
 */
class JetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'model' => $this->faker->word,
            'capacity' => $this->faker->numberBetween(1, 20),
            'hourly_rate' => $this->faker->randomFloat(2, 100, 1000),
        ];
    }
}
