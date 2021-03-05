<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('nomor_pasien');             
            $table->string('nama_pasien', 50);             
            $table->string('alamat', 100);
            $table->date('tgl_lahir');
            $table->string('agama', 10);        
            $table->string('pekerjaan', 20);
            $table->string('telepon', 15);
            $table->string('alergi_obat', 30);
            $table->integer('user_id');
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
        Schema::dropIfExists('pasiens');
    }
}
