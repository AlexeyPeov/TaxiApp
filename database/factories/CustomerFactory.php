<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
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
            'personalDiscount' => $this->faker->numberBetween(0,25),
            'phoneNumber' => $this->faker->phoneNumber(),
            'orderCount' => $this->faker->numberBetween(1,100),
            'orderDeclinedCount' => $this->faker->numberBetween(0,3),



        ];
    }
}
