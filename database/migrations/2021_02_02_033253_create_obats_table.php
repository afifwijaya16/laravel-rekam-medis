<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomor_obat');
            $table->string('nama', 50);
            $table->string('gambar', 255)->nullable();
            $table->integer('harga')->length(10)->unsigned();
            $table->integer('stock')->length(10)->unsigned();
            $table->string('satuan', 10);
            $table->string('kemasan', 100);
            $table->string('komposisi', 255);
            $table->string('dosis', 100);
            // $table->string('segmentasi', 25);
            // $table->string('manufaktur', 50);
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('obats');
    }
}
