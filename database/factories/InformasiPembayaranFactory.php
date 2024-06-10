<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InformasiPembayaran>
 */
class InformasiPembayaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_bank' => $this->faker->company,
            'nama_akun' => $this->faker->name,
            'no_rek' => $this->faker->bankAccountNumber,
            'file_bukti' => $this->faker->imageUrl(),
            'status' => $this->faker->randomElement(['pending', 'completed', 'failed', 'canceled']),
            'transaksi_id' => \App\Models\Transaksi::inRandomOrder()->first()->id,
        ];
    }
}
