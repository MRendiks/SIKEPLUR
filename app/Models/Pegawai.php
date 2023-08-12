<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use HasFactory;
    protected $table = "pegawai";
    protected $fillable = [
        'id',
        'nik',
        'nama_pegawai',
        'jenis_kelamin',
        'tempat_tanggal_lahir',
        'telpon',
        'agama',
        'jabatan',
        'alamat',
        'pendidikan',
    ];
    // protected $guarded = [];
}


