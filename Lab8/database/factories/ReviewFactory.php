<?php

namespace Database\Factories;

use App\Models\Jet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'jet_id' => Jet::factory(),
            'reviewer_name' => $this->faker->name,
            'text' => $this->faker->sentence,
            'rating' => $this->faker->numberBetween(1, 5),
            'status' => 'pending',
        ];
    }

}
