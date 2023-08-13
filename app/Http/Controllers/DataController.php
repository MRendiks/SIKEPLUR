<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getUserData($id)
    {
        $data = User::select('users.*', 'jabatan.*')
        ->join('jabatan', 'jabatan.PegawaiId', '=', 'users.id')
        ->where('users.id', $id)->get();

        return response()->json($data); 
    }
}
