<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_produk' => fake()->name,
            'gambar' => 'img-1.png',
            'harga' => fake()->numberBetween(10000, 100000),
            'keterangan' => fake()->sentence(),
            'kategori_id' => Kategori::inRandomOrder()->first()->id,
        ];
    }
}
