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
        Schema::create('tb_timbang_temp', function (Blueprint $table) {
            $table->integer('ID');
            $table->string('ID_BARANG', 15)->nullable();
            $table->string('UNIQ_ID', 100)->nullable();
            $table->string('BERAT', 100)->nullable();
            $table->string('BERAT_FILTER', 50)->nullable();
            $table->string('QTY', 50);
            $table->dateTime('WAKTU')->nullable();
            $table->text('NAMA_BARANG');
            $table->string('KATEGORI', 200)->nullable();
            $table->string('NAMA_USER', 200)->nullable();
            $table->string('DARI', 100)->nullable();
            $table->string('SHIFT', 1)->nullable();
            $table->string('PIC_SERAH', 30);
            $table->string('PIC_TERIMA', 30);
            $table->string('ID_PRINT', 65);
            $table->string('SATUAN', 10)->nullable();
            $table->string('PCS', 25)->nullable();
            $table->string('TGL_PRODUKSI', 100)->nullable();
            $table->string('SHIFT_PRODUKSI', 50)->nullable();
            $table->string('KETERANGAN', 200);
            $table->string('WTA', 50)->nullable();
            $table->string('WHT', 50)->nullable();
            $table->dateTime('WAKTU_SINKRON')->nullable();
            $table->integer('IDX_TB')->nullable();
            $table->string('ASAL', 11)->nullable();
            $table->string('TUJUAN', 11)->nullable();
            $table->integer('PLANT')->default(2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_timbang_temp');
    }
};
