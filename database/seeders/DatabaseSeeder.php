<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Kontak;
use App\Models\Ongkir;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Database\Seeder;
use App\Models\InformasiPembayaran;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(4)->create();
        Admin::factory(1)->create();
        Kategori::factory(5)->create();
        Produk::factory()->count(10)->create();
        Kontak::factory()->count(1)->create();
        Ongkir::factory(10)->create();
        Transaksi::factory(10)->create();
        DetailTransaksi::factory()->count(3)->create();
        // InformasiPembayaran::factory()->count(5)->create();
    }
}
