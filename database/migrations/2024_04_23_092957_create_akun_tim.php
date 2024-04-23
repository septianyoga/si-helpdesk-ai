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
        Schema::create('akun_tim', function (Blueprint $table) {
            $table->id();
            $table->foreignId('akun_id')->nullable()->references('id')->on('akuns')->onDelete('set null');
            $table->foreignId('tim_id')->nullable()->references('id')->on('tims')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun_tim');
    }
};
