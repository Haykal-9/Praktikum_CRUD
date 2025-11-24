<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up(): void
    {
        Schema::create('matakuliah', function (Blueprint $table) {
              // make id_mk a string primary key (non-auto-increment), similar to mahasiswa.NIM
              $table->string('id_mk', 15)->primary();
            $table->string('nama_mk', 100);
            $table->integer('sks');
            $table->string('NIP', 20); // Kolom untuk foreign key
            $table->timestamps();
            $table->foreign('NIP')->references('NIP')->on('dosen')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('matakuliah');
    }
};
