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
            $table->string('no_rekam');                      
            $table->string('id_pasien');
            $table->string('keluhan');
            $table->string('tindakan')->nullable();
            $table->string('diagnosa')->nullable();
            $table->string('id_dokter')->nullable();
            $table->string('status_rekam_medis');
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