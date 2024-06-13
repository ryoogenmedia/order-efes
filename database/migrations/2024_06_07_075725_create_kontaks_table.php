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
        Schema::create('kontaks', function (Blueprint $table) {
            $table->id();
            $table->string('alamat');
            $table->string('email');
            $table->string('tlp');
            $table->string('fax');
            $table->string('bank');
            $table->string('atas_nama');
            $table->string('rek');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('tentang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontaks');
    }
};
