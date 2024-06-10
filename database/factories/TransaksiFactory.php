<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_transaksi' => $this->faker->unique()->numerify('TRX-#####'),
            'alamat' => $this->faker->address,
            'resi' => $this->faker->regexify('[A-Z]{2}[0-9]{9}[A-Z]{2}'),
            'bukti_kirim' => $this->faker->imageUrl(),
            'total' => $this->faker->randomFloat(2, 10, 1000),
            'status' => $this->faker->randomElement(['sukses', 'menunggu konfirmasi', 'menunggu pembayaran', 'dibatalkan', 'pengiriman']),
            'ongkir_id' => \App\Models\Ongkir::inRandomOrder()->first()->id,
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
        ];
    }
}
