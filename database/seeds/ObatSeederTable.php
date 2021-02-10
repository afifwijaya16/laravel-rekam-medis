<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ObatSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('obats')->insert([
        	'nomor_obat'  => time(),
        	'nama'  => 'Paracetamol',
        	'harga'  => '7500',
        	'stock'  => '50',
        	'satuan'  => 'Pcs',
        	'dosis'  => '500mg',
        	'kemasan'  => '-',
        	'keterangan'  => '-',
        	'komposisi'  => '-',
        ]);

        DB::table('obats')->insert([
        	'nomor_obat'  => time() + 1,
        	'nama'  => 'Betadine',
        	'harga'  => '8500',
        	'stock'  => '20',
        	'satuan'  => 'Botol',
        	'dosis'  => '-',
        	'kemasan'  => '-',
        	'keterangan'  => '-',
            'komposisi'  => '-',
        ]);
    }
}
