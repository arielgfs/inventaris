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
        Schema::create('aplikasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255);
            $table->string('gambar', 255)->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('type', 100);
            $table->foreignId('klien_id')->constrained('klien')->onDelete('cascade');
            $table->string('link', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aplikasis');
    }
};
