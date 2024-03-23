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
        Schema::create('respons', function (Blueprint $table) {
            $table->id();
            $table->longText('pesan');
            $table->enum('tipe', ['Chat', 'Overdue', 'Assigned', 'Updated', 'Closed', 'Reopened']);
            $table->unsignedBigInteger('action_by')->nullable()->references('id')->on('akuns')->onDelete('set null');
            $table->foreign('action_by')->references('id')->on('akuns')->onDelete('set null');
            $table->unsignedBigInteger('tiket_id')->nullable()->references('id')->on('tikets')->onDelete('set null');
            $table->foreign('tiket_id')->references('id')->on('tikets')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respons');
    }
};
