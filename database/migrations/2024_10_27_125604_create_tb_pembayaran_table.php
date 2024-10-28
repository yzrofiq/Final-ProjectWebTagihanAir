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
        Schema::create('tb_pembayaran', function (Blueprint $table) {
            $table->increments('id'); // Adding an auto-incrementing primary key for this table
            $table->unsignedInteger('id_tagihan'); // Foreign key column must match type in 'tb_tagihan'
            $table->date('tgl_bayar');
            $table->integer('uang_bayar');
            $table->integer('kembali');

            $table->foreign('id_tagihan')->references('id_tagihan')->on('tb_tagihan')->onDelete('cascade')->onUpdate('cascade');
        });

        DB::table('tb_pembayaran')->insert([
            ['id_tagihan' => 78, 'tgl_bayar' => '2024-06-11', 'uang_bayar' => 20000, 'kembali' => 2000]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tb_pembayaran');
    }
};
