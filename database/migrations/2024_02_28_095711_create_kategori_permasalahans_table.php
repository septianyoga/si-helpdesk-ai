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
        Schema::create('kategori_permasalahans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_topik');
            $table->unsignedBigInteger('tim_id')->nullable()->references('id')->on('tims')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_permasalahans');
    }
};
