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
        Schema::create('dari_ke_temp', function (Blueprint $table) {
            $table->integer('Id')->autoIncrement()->primary();
            $table->string('DARI_KE', 200)->nullable();
            $table->string('KODE', 100)->nullable();
            $table->string('DARI', 255)->nullable();
            $table->string('KE', 255)->nullable();
            $table->string('DG_JO', 2)->nullable();
            $table->integer('PLANT')->nullable()->default(2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dari_ke_temp');
    }
};
