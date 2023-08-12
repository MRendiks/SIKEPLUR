<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function get(){
        return view('login');
    }

    // public function attemptWithoutPassword($email)
    // {
    //     $user = Pegawai::where('email', $email)->first();

    //     if ($user) {
    //         Auth::login($user);
    //         return true;
    //     }

    //     return false;
    // }

    public function attempt(Request $request){
        
        $validataData = $request->validate([
            'email' => ['required', 'email:rfc,dns'],
            'password' => ['required']
        ]);

        $email = $validataData['email'];
        $password = $validataData['password'];
    
        $isUserFound = Auth::validate([
            'email' => $email,
            'password' => $password
        ]);

        
        if ($isUserFound == false){
           return redirect('/login')->withErrors([
               'auth' => 'Email or password is not found'
           ]);
       
        }

        Auth::attempt([
            'email' => $email,
            'password' => $password
        ]);

        if(Auth::attempt($validataData)) {
            $request->session()->regenerate();
            return redirect('/dashboard')->with('success', 'Login Berhasil');
        }else{
            return redirect('login')->with('failed', 'Login Gagal, Cek email dan password anda');
        }
    }
}
