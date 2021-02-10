<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PasienSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pasiens')->insert([
        	'nomor_pasien'  => time(),
        	'nama_pasien'  => 'Aji',
        	'alamat'  => 'Kota Agung',
        	'tgl_lahir'  => '1996-01-01',
        	'agama'  => 'Islam',
        	'pekerjaan'  => 'Tentara',
        	'telepon'  => '08992208787',
        	'alergi_obat'  => 'Tidak Ada',
        ]);
    }
}
