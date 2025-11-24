<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id('id_nilai'); // Primary key auto-increment
            $table->string('NIM', 15);
            // id_mk is string primary key in matakuliah
            $table->string('id_mk', 15);
            $table->decimal('nilai', 5, 2); // Contoh: 95.50 atau 3.75
            $table->string('berkas')->nullable();
            $table->timestamps();

            // Mendefinisikan Foreign Keys
            $table->foreign('NIM')->references('NIM')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('id_mk')->references('id_mk')->on('matakuliah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
