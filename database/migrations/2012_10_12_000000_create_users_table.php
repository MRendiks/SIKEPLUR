<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jabatanId')->unsigned();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nik')->nullable();
            $table->string('nama_pegawai')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_tanggal_lahir')->nullable();
            $table->string('telpon')->nullable();
            $table->string('agama')->nullable();
            $table->string('alamat')->nullable();
            $table->string('pendidikan')->nullable();
            $table->enum('level', ['petugas', 'pegawai'])->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
