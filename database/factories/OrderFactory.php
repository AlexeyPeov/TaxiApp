<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'orderStatus' => $this->faker->numberBetween(0,4),
            'class' => $this->faker->numberBetween(1,3),
            'price' => $this->faker->randomNumber(3),
            'pointA' => $this->faker->address(),
            'pointB' => $this->faker->address(),
            'reviewGiven' => 0,

        ];
    }
}
