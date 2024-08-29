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
        Schema::create('perawatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perawatan');
            $table->decimal('harga');
            $table->text('deskripsi');
            $table->string('gambar')->nullable();
            $table->string('durasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perawatan');
    }
};
