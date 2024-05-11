<?php

namespace Database\Factories;

use App\Models\Discount;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'desc' => fake()->unique()->realText(),
            'SKU'  => random_int(1000, 9999),
            'category'  => fake()->word(),
            'price'  => rand(2,50) + rand(2,50)/10,
            "image" => $this->faker->image(storage_path('app/public'),
                    640, 520, null, false),
            'discount_id'  =>  Discount::all()->random()->id,
        ];
    }
}
