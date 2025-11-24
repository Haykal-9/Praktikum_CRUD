<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->string('NIP', 20)->primary(); 
            $table->string('nama', 100);
            $table->string('email')->unique();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
