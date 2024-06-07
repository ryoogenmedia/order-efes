<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kontak>
 */
class KontakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'alamat' => fake()->address(),
            'email' => fake()->email(),
            'tlp' => fake()->phoneNumber(),
            'fax' => fake()->phoneNumber(),
            'bank' => 'bri',
            'atas_nama' => 'wawan julianto',
            'rek' => fake()->randomNumber(),
            'facebook' => 'https://id-id.facebook.com/',
            'twitter' => 'https://id-id.facebook.com/',
            'instagram' => 'https://id-id.facebook.com/'
        ];
    }
}
