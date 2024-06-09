<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ongkir>
 */
class OngkirFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'provinsi' => fake()->city(),
            'kota' => fake()->city(),
            'kecamatan' => fake()->city(),
            'metode' => 'JNE',
            'harga' => fake()->randomNumber(),
        ];
    }
}
