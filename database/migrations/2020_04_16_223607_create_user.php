<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nama_user');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('pass_kotlin')->nullable();
            $table->string('role');
            $table->string('nim')->unique()->nullable();
            $table->string('nik')->unique()->nullable();
            $table->string('angkatan')->nullable();
            $table->string('fakultas')->nullable();
            $table->string('telfon')->nullable();
            $table->string('alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
