<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand' => $this->faker->name(),
            'plates' => $this->faker->company(),
            'color' => $this->faker->colorName(),
            'carClass' => $this->faker->numberBetween(1,3),


        ];
    }
}
