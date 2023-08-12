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
        Schema::create('cuti', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pegawaiId')->unsigned();
            $table->string('nik')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('jenis_cuti')->nullable();
            $table->string('jumlah_hari_cuti')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_akhir')->nullable();
            $table->string('keterangan')->nullable();
            $table->enum('status', ['diproses', 'ditolak', 'diterima'])->nullable();
            $table->timestamps();
            $table->foreign('pegawaiId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuti');
    }
};
