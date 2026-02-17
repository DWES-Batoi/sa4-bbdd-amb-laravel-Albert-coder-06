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
        Schema::table('partits', function (Blueprint $table) {
            $table->foreignId('local_id')->nullable()->constrained('equips')->onDelete('cascade');
            $table->foreignId('visitant_id')->nullable()->constrained('equips')->onDelete('cascade');
            $table->foreignId('estadi_id')->nullable()->constrained('estadis')->onDelete('cascade');
            $table->integer('jornada')->nullable();
            $table->integer('gols_local')->default(0);
            $table->integer('gols_visitant')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partits', function (Blueprint $table) {
            $table->dropForeign(['local_id']);
            $table->dropForeign(['visitant_id']);
            $table->dropForeign(['estadi_id']);
            $table->dropColumn(['local_id', 'visitant_id', 'estadi_id', 'jornada', 'gols_local', 'gols_visitant']);
        });
    }
};
