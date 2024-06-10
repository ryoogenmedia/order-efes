<?php

namespace Database\Factories;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailTransaksi>
 */
class DetailTransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jml_pesanan' => $this->faker->numberBetween(1, 100),
            'desain' => $this->faker->word,
            'file' => $this->faker->imageUrl,
            'catatan' => $this->faker->sentence,
            'produk_id' => Produk::inRandomOrder()->first()->id,
            'transaksi_id' => Transaksi::inRandomOrder()->first()->id,
        ];
    }
}
