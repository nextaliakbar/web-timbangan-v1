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
        Schema::create('bstb_temp', function (Blueprint $table) {
            $table->integer('Id')->autoIncrement()->primary();
            $table->string('DARIKE', 255)->nullable();
            $table->string('NO', 10)->nullable();
            $table->integer('PLANT')->nullable()->default(2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bstb_temp');
    }
};
