<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ['CREATED','CONFIRMED'];

        return [
            'user_id'  =>  User::all()->random()->id,
            'total' => rand(1,3),
            'status'  => Arr::random($statuses),
            'name' => fake()->name(),
            'surname' => fake()->name(),
            'email'  => fake()->email(),
            'phone'  => fake()->phoneNumber(),
            'city'  => fake()->city(),
            'desc'  => fake()->paragraph(1),
        ];
    }
}
