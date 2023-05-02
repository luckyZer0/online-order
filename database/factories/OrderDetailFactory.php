<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 5),
            'rec_no' => 'RH' . str_pad(rand(1, 999), 3, 0, STR_PAD_LEFT),
            'address' => $this->faker->sentence(),
            'tel_no' => '012345678',
            'date' => date('Y-m-d'),
        ];
    }
}
