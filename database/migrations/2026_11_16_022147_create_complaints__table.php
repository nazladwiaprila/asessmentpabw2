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
        Schema::create('complaints_', function (Blueprint $table) {
            $table->id();
            $table->string('nama_titik')->constrained()->cascadeOnDelete();
            $table->string('kacamatan')->nullable()->constrained()->nullOnDelete();
            $table->text('description');
            $table->integer('kedalaman_cm');
            $table->string('photo_path')->nullable();
            $table->string('status')->default('baru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints_');
    }
};
