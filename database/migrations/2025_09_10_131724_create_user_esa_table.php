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
        Schema::create('user_esa', function (Blueprint $table) {
            $table->integer('Id')->autoIncrement()->primary();
            $table->string('USER', 255);
            $table->string('NAMA', 50);
            $table->string('PASS', 255)->nullable()->default('c5ebb38d480d1b82b8950560fc82378edb652257078177fb79d730b15945f35b');
            $table->string('PASS2', 255)->nullable();
            $table->string('PIC', 50)->nullable();
            $table->string('TEMPAT', 20)->nullable();
            $table->string('BAGIAN', 100)->nullable();
            $table->string('HAK', 30)->nullable();
            $table->string('AKSES', 255)->nullable();
            $table->string('FLAG')->nullable()->default('1');
            $table->string('DEPT')->nullable();
            $table->integer('ID_USER')->nullable();
            $table->string('PICPASS', 255)->nullable()->default('c5ebb38d480d1b82b8950560fc82378edb652257078177fb79d730b15945f35b');
            $table->tinyInteger('PIC_VERIFIKATOR')->nullable();
            $table->json('TUJUAN')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_esa');
    }
};
