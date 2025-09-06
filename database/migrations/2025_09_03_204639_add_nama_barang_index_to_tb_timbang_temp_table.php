<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::table('tb_timbang_temp', function (Blueprint $table) {
        //     $table->index('NAMA_BARANG');
        // });

        // DB::statement('CREATE INDEX tb_timbang_temp_nama_barang_index ON tb_timbang_temp(NAMA_BARANG(255))');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('tb_timbang_temp', function (Blueprint $table) {
        //     $table->dropIndex('tb_timbang_temp_nama_barang_index');
        // });
        // DB::statement('DROP INDEX tb_timbang_temp_nama_barang_index ON tb_timbang_temp');
    }
};
