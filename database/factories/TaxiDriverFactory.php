<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaxiDriver>
 */
class TaxiDriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstName' => $this->faker->name(),
            'secondName' => $this->faker->lastName(),
            'birthday' => $this->faker->dateTimeThisCentury(),
            'experience' => $this->faker->numberBetween(0,15),
            'phoneNumber' => $this->faker->phoneNumber(),
            'rating' => $this->faker->randomFloat(1,1,5),
            'qualification' => 'has one',
            'reviewHeap' => 0,
            'reviewsGiver' => $this->faker->numberBetween(0,123),
        ];
    }
}
