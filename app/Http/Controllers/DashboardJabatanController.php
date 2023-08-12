<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardJabatanController extends Controller
{
    public function index()
    {
        $jabatan = Jabatan::select('jabatan.id', 'jabatan.no_pengangkatan', 'users.nama_pegawai', 'jabatan.jabatan', 'jabatan.pendidikan')
        ->join('users', 'users.id', '=', 'jabatan.pegawaiId')
        ->get();
        
        return view('dashboard.jabatan.data-jabatan', ['datajabatan' => $jabatan]);
    }

    public function cetak_jabatan(Request $request)
    {
        $jabatan = Jabatan::select('jabatan.id', 'jabatan.no_pengangkatan', 'users.nama_pegawai', 'jabatan.jabatan', 'jabatan.pendidikan')
        ->join('users', 'users.id', '=', 'jabatan.pegawaiId')
        ->get();

        return view('dashboard.jabatan.laporan_cetak', compact('jabatan'));
    }

    public function add()
    {
        $pegawai = User::get();
        return view('dashboard.jabatan.addjabatan', );
    }
    public function store(Request $request)
    {
        // dd($request);
        $jabatan = new Jabatan;
        $pegawai = User::select('id')->where('nama_pegawai', "=", $request->nama_pegawai)->first();

        $jabatan->id = $request->id;
        $jabatan->no_pengangkatan = $request->no_pengangkatan;
        $jabatan->pegawaiId= $pegawai['id'];
        $jabatan->jabatan = $request->Jabatan;
        $jabatan->pendidikan = $request->pendidikan;


        $jabatan->save();
        return redirect()->route('datajabatan');
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $jabatan = new Jabatan();
        $jabatan->where('id', $id)->delete();

        return redirect()->route('datajabatan');
    }


    public function edit(Request $request, $id)
    {
        // return view('admin.supplier.editsupplier');
        $jabatan= jabatan::find($id);
        $users = User::get();
        return view('dashboard.jabatan.editjabatan', compact('jabatan', 'users'));
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        $jabatan = jabatan::find($id);


        $jabatan->no_pengangkatan = $request->input('no_pengangkatan');
        $jabatan->pegawaiId= $request->input('nama_pegawai');
        $jabatan->jabatan= $request->input('jabatan');
        $jabatan->pendidikan = $request->input('pendidikan');
        $jabatan->update();

        

        return redirect('data-jabatan');
    }
}
