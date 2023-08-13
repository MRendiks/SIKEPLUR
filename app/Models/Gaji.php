<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    protected $table = "gaji";
    protected $fillable = [
        'pegawaiId',
        'bulan',
        'tahun',
        'tunjangan',
        'gaji_pokok',
        'total_gaji'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
