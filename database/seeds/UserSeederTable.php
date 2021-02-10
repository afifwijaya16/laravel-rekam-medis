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
            'name'  => 'user',
            'email' => 'user@gmail.com',
            'password'  => bcrypt('rahasia'),
            'level' => 'user',
        ]);

        DB::table('users')->insert([
        	'name'  => 'Dr Wahyu Malawi',
            'email' => 'wahyu@gmail.com',
            'password'  => bcrypt('rahasia'),
            'level' => 'Dokter',
            'Spesialis' => 'THT',
        	'biaya_tindakan'  => '50000',
        ]);
    }
}
