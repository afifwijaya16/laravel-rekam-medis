<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekammedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekammedis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('no_rekam');                      
            $table->string('id_pasien');
            $table->string('keluhan');
            $table->string('tindakan')->nullable();
            $table->string('catatan_apoteker')->nullable();
            $table->string('diagnosa')->nullable();
            $table->string('catatan')->nullable();
            $table->string('id_dokter')->nullable();
            $table->string('id_resep')->nullable();
            $table->integer('total_pembayaran')->nullable();
            $table->string('status_rekam_medis');
            $table->boolean('status_pembayaran')->default(0);
            $table->string('id_kasir')->nullable();
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
        Schema::dropIfExists('rekammedis');
    }
}
