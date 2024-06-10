<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InformasiPembayaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InformasiPembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InformasiPembayaran::factory()->count(5)->create();
    }
}
