<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi')->unique();
            $table->string('alamat');
            $table->string('resi')->nullable();
            $table->string('bukti_kirim')->nullable();
            $table->string('total');
            $table->enum('status', ['sukses', 'menunggu konfirmasi', 'menunggu pembayaran', 'dibatalkan', 'pengiriman', 'pembuatan'])->default('menunggu konfirmasi');
            $table->foreignId('ongkir_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
