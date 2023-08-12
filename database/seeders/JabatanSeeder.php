<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatan')->insert([
            'pegawaiId' => 1,
            'no_pengangkatan' => 'NP01',
            'jabatan' => 'administrator',
            'pendidikan' => 'SMK',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('jabatan')->insert([
            'pegawaiId' => 2,
            'no_pengangkatan' => 'NP02',
            'jabatan' => 'Sekretariat Desa',
            'pendidikan' => 'SMA',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
