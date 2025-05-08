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
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->string('Nama');
            $table->foreignId('angkatan_id')->constrained(
                table: 'angkatans',
                indexName: 'angkatans_id'
            );
            $table->foreignId('jurusan_id')->constrained(
                table: 'jurusans',
                indexName: 'Jurusans_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnis');
    }
};
