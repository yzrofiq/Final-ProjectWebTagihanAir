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
        Schema::create('tb_pelanggan', function (Blueprint $table) {
            $table->char('id_pelanggan', 15)->primary();
            $table->string('nama_pelanggan', 20);
            $table->string('alamat', 40);
            $table->char('no_hp', 15);
            $table->char('status', 10)->default('Aktif');
            $table->unsignedInteger('id_layanan'); // Ensure this matches the type in 'tb_layanan'

            $table->foreign('id_layanan')->references('id_layanan')->on('tb_layanan')->onDelete('cascade')->onUpdate('cascade');
        });

        DB::table('tb_pelanggan')->insert([
            ['id_pelanggan' => 'P001', 'nama_pelanggan' => 'Yunia', 'alamat' => 'Metro', 'no_hp' => '083170465327', 'status' => 'Aktif', 'id_layanan' => 1]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tb_pelanggan');
    }
};
