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
        Schema::create('m_barang_temp', function (Blueprint $table) {
            $table->integer('Id')->autoIncrement()->primary();
            $table->string('ID_BARANG', 50)->nullable();
            $table->string('ID_SUNFISH', 100)->nullable();
            $table->string('NAMA_BARANG', 255)->nullable();
            $table->string('itemCategoryType', 5)->nullable();
            $table->string('KATEGORI', 100)->nullable();
            $table->string('SATUAN', 50)->nullable();
            $table->string('MIN', 100)->nullable();
            $table->string('MAX', 100)->nullable();
            $table->double('PENGURANG')->nullable()->default(0);
            $table->integer('FLAG')->nullable()->default(1);
            $table->integer('FLAG_UMS_2')->nullable()->default(1);
            $table->integer('FLAG_MGFI')->nullable()->default(1);
            $table->integer('STATUS')->nullable()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_barang_temp');
    }
};
