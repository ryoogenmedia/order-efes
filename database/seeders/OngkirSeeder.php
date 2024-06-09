<?php

namespace Database\Seeders;

use App\Models\Ongkir;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OngkirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ongkir::factory(10)->create();
    }
}
