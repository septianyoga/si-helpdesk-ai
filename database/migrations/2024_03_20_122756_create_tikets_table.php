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
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->string('ringkasan_masalah');
            $table->enum('status', ['Open', 'Resolved', 'Closed']);
            $table->enum('tipe', ['Insiden', 'Permintaan Layanan']);
            $table->enum('penyebab', ['Human Error', 'Application Error', 'Others', 'Undefined'])->nullable();
            $table->unsignedBigInteger('akun_id')->nullable()->references('id')->on('akuns')->onDelete('set null');
            $table->foreign('akun_id')->references('id')->on('akuns')->onDelete('set null');
            $table->unsignedBigInteger('kategori_permasalahan_id')->nullable()->references('id')->on('kategori_permasalahans')->onDelete('set null');
            $table->foreign('kategori_permasalahan_id')->references('id')->on('kategori_permasalahans')->onDelete('set null');
            $table->unsignedBigInteger('dampak_permasalahan_id')->nullable()->references('id')->on('dampak_permasalahans')->onDelete('set null');
            $table->foreign('dampak_permasalahan_id')->references('id')->on('dampak_permasalahans')->onDelete('set null');
            $table->unsignedBigInteger('penjawab_id')->nullable()->references('id')->on('akuns')->onDelete('set null');
            $table->foreign('penjawab_id')->references('id')->on('akuns')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
