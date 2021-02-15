<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name'  => 'admin',
            'email' => 'admin@gmail.com',
            'password'  => bcrypt('rahasia'),
            'level' => 'admin',
        ]);

        DB::table('users')->insert([
        	'name'  => 'Dokter 1',
            'email' => 'dokter@gmail.com',
            'password'  => bcrypt('dokter@gmail.com'),
            'level' => 'Dokter',
            'spesialis' => 'THT',
        	'biaya_tindakan'  => '50000',
        ]);

        DB::table('users')->insert([
        	'name'  => 'Kasir 1',
            'email' => 'kasir@gmail.com',
            'password'  => bcrypt('kasir@gmail.com'),
            'level' => 'Kasir',
        ]);
        DB::table('users')->insert([
        	'name'  => 'Apoteker 1',
            'email' => 'apoteker@gmail.com',
            'password'  => bcrypt('apoteker@gmail.com'),
            'level' => 'Apoteker',
        ]);
    }
}
