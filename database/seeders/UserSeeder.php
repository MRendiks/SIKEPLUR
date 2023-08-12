<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'jabatanID' => 1,
            'email' => "admin@gmail.com",
            'password' => Hash::make('admin'),
            'nik' => '123456',
            'nama_pegawai' => 'administrator',
            'jenis_kelamin' => 'Laki-Laki',
            'tempat_tanggal_lahir' => 'Gunung Kidul, 06-10-2001',
            'telpon' => '089670128440',
            'agama' => 'Islam',
            'alamat' => 'Trini Trihanggo',
            'pendidikan' => 'SMK',
            'level' => 'petugas',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'jabatanID' => 2,
            'email' => "dwiki@gmail.com",
            'password' => Hash::make('dwiki'),
            'nik' => '1234',
            'nama_pegawai' => 'dwiki',
            'jenis_kelamin' => 'Perempuan',
            'tempat_tanggal_lahir' => 'Gunung Kidul, 06-10-2001',
            'telpon' => '089670128440',
            'agama' => 'Islam',
            'alamat' => 'Trini Trihanggo',
            'pendidikan' => 'SMK',
            'level' => 'pegawai',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
