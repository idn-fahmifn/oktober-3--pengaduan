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
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('judul_laporan');
            $table->string('kategori');
            $table->enum('status',['pending','diproses','selesai','ditolak'])->default('pending');
            $table->text('deskripsi');
            $table->string('dokumentasi');
            $table->date('tanggal_laporan');
            $table->time('jam_laporan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
