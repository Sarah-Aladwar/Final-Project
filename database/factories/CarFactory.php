<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'title' => fake()->company(),
            'date_posted' => fake()->dateTimeBetween($startDate = '-1 year', $endDate = 'now'),
            'content' => fake()->text($maxNbChars = 200),
            'luggage' => fake()->randomElement([2, 3, 4, 5, 6]),
            'doors' => fake()->randomElement([2, 4, 6]),
            'passengers' => fake()->randomElement([2, 4, 6, 8]),
            'price' => fake()->numberBetween($min = 6000, $max = 12000),
            'image' => fake()->randomElement(['car_1.jpg', 'car_2.jpg', 'car_3.jpg', 'car_4.jpg', 'car_5.jpg', 'car_6.jpg', 'car_7.jpg']),
            'published' => fake()->boolean(),
            'category_id' => fake()->numberBetween($min = 1, $max = 5)
        ];
    }
}
