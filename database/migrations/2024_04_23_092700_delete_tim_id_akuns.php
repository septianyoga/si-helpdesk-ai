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
        Schema::table('akuns', function (Blueprint $table) {
            //
            $table->dropForeign(['tim_id']);
            $table->dropColumn('tim_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('akuns', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('tim_id')->nullable()->after('is_active');
            $table->foreign('tim_id')->references('id')->on('tims')->onDelete('set null');
        });
    }
};
