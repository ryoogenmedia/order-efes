<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Keranjang>
 */
class KeranjangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jml_pesan' => $this->faker->numberBetween(1, 10),
            'desain' => $this->faker->word,
            'catatan' => $this->faker->paragraph,
            'produk_id' => Produk::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
