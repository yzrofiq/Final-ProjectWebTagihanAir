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
    Schema::create('tb_bulan', function (Blueprint $table) {
        $table->char('id_bulan', 3)->primary();
        $table->string('nama_bulan', 10);
    });

    DB::table('tb_bulan')->insert([
        ['id_bulan' => 'A', 'nama_bulan' => 'Januari'],
        ['id_bulan' => 'B', 'nama_bulan' => 'Februari'],
        // Tambahkan bulan lainnya sesuai dump
    ]);
}

};
