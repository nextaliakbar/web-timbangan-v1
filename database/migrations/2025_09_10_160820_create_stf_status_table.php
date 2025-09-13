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
        Schema::create('stf_status', function (Blueprint $table) {
            $table->integer('ID')->autoIncrement()->primary();
            $table->string('NO_JO', 255)->nullable();
            $table->string('NO_STF', 255)->nullable();
            $table->tinyInteger('STATUS')->nullable();
            $table->dateTime('TANGGAL');
            $table->string('WTA')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stf_status');
    }
};
