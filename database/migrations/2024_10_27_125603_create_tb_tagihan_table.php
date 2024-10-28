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
        Schema::create('tb_tagihan', function (Blueprint $table) {
            $table->increments('id_tagihan'); // Auto-incrementing primary key
            $table->char('id_pakai', 11);
            $table->integer('tagihan');
            $table->char('status', 12)->default('Belum Bayar');

            $table->foreign('id_pakai')->references('id_pakai')->on('tb_pakai')->onDelete('cascade')->onUpdate('cascade');
        });

        DB::table('tb_tagihan')->insert([
            ['id_tagihan' => 77, 'id_pakai' => 'K000000001', 'tagihan' => 0, 'status' => 'Belum Bayar'],
            ['id_tagihan' => 78, 'id_pakai' => 'K000000002', 'tagihan' => 18000, 'status' => 'Lunas']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tb_tagihan');
    }
};
