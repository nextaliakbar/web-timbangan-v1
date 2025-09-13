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
        Schema::create('job_order_temp', function (Blueprint $table) {
            $table->integer('Id')->autoIncrement()->primary();
            $table->string('NO_JO')->unique();
            $table->integer('COMPANY_ID')->nullable();
            $table->date('JO_DATE')->nullable();
            $table->integer('SHIFT')->nullable();
            $table->string('FLAG', 2)->nullable();
            $table->integer('WH_ID')->nullable();
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
