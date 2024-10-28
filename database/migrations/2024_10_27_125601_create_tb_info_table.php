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
    Schema::create('tb_info', function (Blueprint $table) {
        $table->increments('id_info');
        $table->string('isi_info', 500);
    });

    DB::table('tb_info')->insert([
        ['id_info' => 1, 'isi_info' => 'Untuk para pelanggan segera membayar tagihan bulan ini. Terimakasih.']
    ]);
}

};
