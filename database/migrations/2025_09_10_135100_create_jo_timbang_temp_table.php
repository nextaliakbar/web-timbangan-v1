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
        Schema::create('jo_timbang_temp', function (Blueprint $table) {
            $table->integer('Id')->autoIncrement()->primary();
            $table->string('NO_JO', 255)->nullable();
            $table->string('UNIQ_ID', 255)->nullable();
            $table->string('ID_BARANG', 255)->nullable();
            $table->string('BERAT_TOTAL', 255)->nullable();
            $table->string('BERAT_PER_JO', 255)->nullable();
            $table->integer('IDX_TB')->nullable();
            $table->integer('FLAG')->nullable();
            $table->string('NIK_GANTI_JO', 14)->nullable();
            $table->dateTime('TGL_GANTI_JO');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jo_timbang_temp');
    }
};
