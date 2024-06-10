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
        Schema::create('informasi_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bank');
            $table->string('nama_akun');
            $table->string('no_rek');
            $table->string('file_bukti');
            $table->enum('status', [
                'pending',
                'completed',
                'failed',
                'canceled'
            ])->default('pending');
            $table->foreignId('transaksi_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_pembayarans');
    }
};
