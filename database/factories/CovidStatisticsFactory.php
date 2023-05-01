<?php

namespace Database\Factories;

use App\Models\CovidStatistics;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CovidStatistics>
 */
class CovidStatisticsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = CovidStatistics::class;

    public function definition(): array
    {
        return [
            'code' => fake()->countryCode(),
            'country' => json_encode([
                'en' => fake()->country,
                'ka' => fake()->country,
            ]),
            'confirmed' => fake()->numberBetween(1, 8000),
            'recovered' => fake()->numberBetween(1, 8000),
            'critical' => fake()->numberBetween(1, 3000),
            'deaths' => fake()->numberBetween(1, 5000)
        ];
    }
}
