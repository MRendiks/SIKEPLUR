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
        Schema::create('gaji', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pegawaiId')->unsigned();
            $table->integer('bulan')->nullable();
            $table->integer('tahun')->nullable();
            $table->bigInteger('tunjangan')->nullable();
            $table->bigInteger('gaji_pokok')->nullable();
            $table->bigInteger('total_gaji')->nullable();
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
        Schema::dropIfExists('gaji');
    }
};
