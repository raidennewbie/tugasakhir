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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('mapel_id');
            $table->foreignId('kelas_id');
            $table->foreignId('semester_id');
            $table->foreignId('tahunajar_id');
            $table->foreignId('siswa_id');
            $table->enum('status', ["H","I","A"]);
            $table->foreignId('jadwal_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
