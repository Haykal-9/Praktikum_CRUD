<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('NIM', 15)->primary(); // Primary key
            $table->string('nama', 100);
            $table->string('email')->unique();
            $table->unsignedBigInteger('id_prodi'); // Kolom untuk foreign key
            $table->string('foto')->nullable();
            $table->timestamps();

            // Mendefinisikan Foreign Key
            $table->foreign('id_prodi')->references('id_prodi')->on('prodi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
