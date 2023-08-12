<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;
    protected $table = "cuti";
    protected $fillable = [
        'nik',
        'nama_pegawai',
        'jabatan',
        'jenis_cuti',
        'tanggal_cuti',
        'tanggal_mulai',
        'tanggal_akkhir',
        'pengajuan_disetujui',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
