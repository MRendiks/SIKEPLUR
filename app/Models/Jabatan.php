<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = "jabatan";
    protected $fillable = [
        'id',
        'no_pengangkatan',
        'nama_pegawai',
        'jabatan',
        'pendidikan',
    ];
    protected $guarded = [];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
