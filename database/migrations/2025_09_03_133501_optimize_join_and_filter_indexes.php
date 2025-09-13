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
        Schema::table('jo_timbang_temp', function (Blueprint $table) {
            $table->index('UNIQ_ID');
            $table->index('IDX_TB');
            $table->index('NO_JO');
        });

        Schema::table('tb_timbang_temp', function (Blueprint $table) {
            $table->index('UNIQ_ID');
            $table->index('IDX_TB');
            $table->index('WAKTU');
            $table->index('PLANT');
            $table->index('ID_BARANG');
        });
        
        // Schema::table('stf_status', function (Blueprint $table) {
        //     $table->index('NO_JO');
        //     $table->index('STATUS');
        //     $table->index('TANGGAL');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
