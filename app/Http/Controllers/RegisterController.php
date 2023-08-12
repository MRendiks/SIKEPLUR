<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function get()
    {
        return view('register');
    }

    public function create(Request $request)
    {
        $validateData = $request->validate([
            'email' => ['required', 'email:rfc,dns'],
            'password' => ['required', 'min:6','max:100']
        ]);

        $email = $validateData['email'];
        $password = Hash::make($validateData['password']) ;

        $user = new User();
        $finduser = $user->where('email', $email)->first();
        if ($finduser) {
            return redirect('/register')->withErrors([
                'email' => 'Email was registered'
            ]);
        }

        $ttl = $request->tempat . '/' . $request->tanggal; 

        $pegawai = new User;
        $pegawai->jabatanId = 2;
        $pegawai->email = $email;
        $pegawai->password = $password;
        $pegawai->nik = $request->nik;
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->tempat_tanggal_lahir = $ttl;
        $pegawai->telpon = $request->telpon;
        $pegawai->agama = $request->agama;
        $pegawai->pendidikan = $request->pendidikan;
        $pegawai->level = 'pegawai';
        $pegawai->save();
        

        Auth::attempt([
            'email' => $email,
            'password' => $password
        ]);

        return redirect('/login');
    }
}