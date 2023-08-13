<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    protected $table = "absen";
    protected $fillable = [
        'tanggal',
        'waktu_masuk',
        'waktu_keluar',
        'tipe'
    ];

    protected $casts = [
        'waktu_masuk' => 'date:hh:mm',
        'waktu_keluar' => 'date:hh:mm'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
