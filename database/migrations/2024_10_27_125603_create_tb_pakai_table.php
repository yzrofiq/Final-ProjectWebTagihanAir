<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tb_pakai', function (Blueprint $table) {
            $table->char('id_pakai', 11)->primary();
            $table->char('id_pelanggan', 15);
            $table->char('bulan', 3);
            $table->char('tahun', 4);
            $table->integer('awal');
            $table->integer('akhir');
            $table->integer('pakai');
 
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('tb_pelanggan')->onDelete('cascade')->onUpdate('cascade');
            // If 'bulan' should match a specific table, ensure 'tb_bulan' exists and has a matching column
        });

        DB::table('tb_pakai')->insert([
            ['id_pakai' => 'K000000001', 'id_pelanggan' => 'P001', 'bulan' => 'A', 'tahun' => '2024', 'awal' => 0, 'akhir' => 12, 'pakai' => 0],
            ['id_pakai' => 'K000000002', 'id_pelanggan' => 'P001', 'bulan' => 'B', 'tahun' => '2024', 'awal' => 12, 'akhir' => 24, 'pakai' => 12]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tb_pakai');
    }
};
