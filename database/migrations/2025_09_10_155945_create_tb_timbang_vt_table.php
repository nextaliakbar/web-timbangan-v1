<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use SebastianBergmann\Type\NullType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_timbang_vt', function (Blueprint $table) {
            $table->integer('ID')->autoIncrement()->primary();
            $table->string('NO_DOK', 50)->nullable();
            $table->string('NO_LOT', 255)->nullable();
            $table->string('ITEM_CODE', 100)->nullable();
            $table->string('BERAT', 100)->nullable();
            $table->string('BERAT_FILTER', 50)->nullable();
            $table->integer('BATCH')->nullable();
            $table->string('KET', 255)->nullable();
            $table->string('SERAH', 100)->nullable();
            $table->string('TERIMA', 100)->nullable();
            $table->string('VERIFIKATOR', 100)->nullable();
            $table->dateTime('WAKTU_TIMBANG')->nullable();
            $table->dateTime('WAKTU_PROD')->nullable();
            $table->tinyInteger('SHIFT_TIMBANG');
            $table->tinyInteger('SHIFT_PROD');
            $table->decimal('BERAT_PER_LOR')->nullable();
            $table->integer('PLANT')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_timbang_vt');
    }
};
