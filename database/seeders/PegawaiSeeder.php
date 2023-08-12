<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pegawai')->insert([
            'nik' => '123456',
            'nama_pegawai' => 'administrator',
            'jenis_kelamin' => 'Laki-Laki',
            'tempat_tanggal_lahir' => 'Gunung Kidul, 06-10-2001',
            'telpon' => '089670128440',
            'agama' => 'Islam',
            'jabatanId' => 1,
            'alamat' => 'Trini Trihanggo',
            'pendidikan' => 'SMK',
            'level' => 'petugas',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('pegawai')->insert([
            'nik' => '1234',
            'nama_pegawai' => 'Muhamad Rendi',
            'jenis_kelamin' => 'Laki-Laki',
            'tempat_tanggal_lahir' => 'Gunung Kidul, 06-10-2001',
            'telpon' => '089670128440',
            'agama' => 'Islam',
            'jabatanId' => 1,
            'alamat' => 'Trini Trihanggo',
            'pendidikan' => 'SMK',
            'level' => 'pegawai',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
