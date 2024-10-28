<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tb_users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('nama_user', 20);
            $table->string('username', 15)->unique(); // Ensure usernames are unique
            $table->string('password'); // Store passwords securely
            $table->string('level', 15);
            $table->char('no_hp', 13);
            $table->char('no_rek', 15)->nullable();
            $table->timestamps(); // Track created_at and updated_at
        });

        // Inserting default users with hashed passwords for security
        DB::table('tb_users')->insert([
            ['id_user' => 1, 'nama_user' => 'Joe Febrian Sinuraya', 'username' => 'admin', 'password' => Hash::make('1'), 'level' => 'Administrator', 'no_hp' => '085878526022', 'no_rek' => null],
            ['id_user' => 2, 'nama_user' => 'Arifin', 'username' => 'opt', 'password' => Hash::make('1'), 'level' => 'Operator', 'no_hp' => '087789987654', 'no_rek' => null],
            ['id_user' => 24, 'nama_user' => 'Joe', 'username' => 'joe', 'password' => Hash::make('1'), 'level' => 'Pelanggan', 'no_hp' => '085270592535', 'no_rek' => 'P001'],
            ['id_user' => 26, 'nama_user' => 'Yunia', 'username' => 'yunia', 'password' => Hash::make('1'), 'level' => 'Pelanggan', 'no_hp' => '083170465327', 'no_rek' => 'P001']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tb_users');
    }
};
