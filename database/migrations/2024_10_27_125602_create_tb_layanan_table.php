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
        Schema::create('tb_layanan', function (Blueprint $table) {
            $table->increments('id_layanan');
            $table->string('layanan', 20);
            $table->integer('tarif');
        });
    
        DB::table('tb_layanan')->insert([
            ['id_layanan' => 1, 'layanan' => 'Layanan Air 1', 'tarif' => 1500]
        ]);
    }
    
};
