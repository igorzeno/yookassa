<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = [
            'Накопительная',
            'Персональная',
            'Клубная',
        ];
        return [
            'name' => Arr::random($names),
            'desc' => fake()->unique()->realText(),
            'discount_percent' => rand(1,20),
        ];
    }
}
