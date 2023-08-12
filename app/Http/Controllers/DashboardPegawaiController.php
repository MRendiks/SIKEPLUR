<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardPegawaiController extends Controller
{
    public function index()
    {
        $pegawai = User::get();
        return view('dashboard.pegawai.data-pegawai', ['datapegawai' => $pegawai]);
    }

    public function add()
    {
        return view('dashboard.pegawai.addpegawai');
    }
    public function store(Request $request)
    {
        // dd($request);
        $pegawai = new User;

        $ttl = $request->tempat_lahir. ',' . $request->tanggal_lahir;

        $pegawai->jabatanId= 2;
        $pegawai->nik = $request->nik ;
        $pegawai->email = $request->email_pegawai ;
        $pegawai->password = $request->password_pegawai ;
        
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;

        $pegawai->tempat_tanggal_lahir = $ttl;
        $pegawai->telpon = $request->telpon;
        $pegawai->agama = $request->agama ;
        
        $pegawai->alamat = $request->alamat;
        $pegawai->pendidikan = $request->pendidikan;

        $pegawai->save();
        return redirect()->route('datapegawai');
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $pegawai= new User();
        $pegawai->where('id', $id)->delete();

        return redirect()->route('datapegawai');
    }

    public function cetak_pegawai(Request $request)
    {
        $pegawai = User::get();

        return view('dashboard.pegawai.laporan_cetak', compact('pegawai'));
    }


    public function edit(Request $request, $id)
    {
        // return view('admin.supplier.editsupplier');
        $pegawai= User::find($id);
        $jabatan= Jabatan::get();
        return view('dashboard.pegawai.editpegawai', compact('pegawai', 'jabatan'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nik' => 'required',
            'nama_pegawai' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_tanggal_lahir' => 'required',
            'telpon' => 'required',
            'agama' => 'required',
            'jabatan' => 'required',
            'telpon' => 'required',
            'alamat' => 'required',
            'pendidikan' => 'required|max:255',
        ], [
            "nik.required" => "nik belum diisi !",
            "nama_pegawai.required" => "nama pegawai belum diisi !",
            "jenis_kelamin.required" => "Foto belum diisi !",
            "tempat_tanggal_lahir.required" => "Deskripsi belum diisi !",
            "telpon.required" => "Kategori belum diisi !",
            "agama.required" => "Lokasi belum diisi !",
            "jabatan.required" => "Foto belum diisi !",
            "telpon.required" => "Deskripsi belum diisi !",
            "alamat.required" => "Foto belum diisi !",
            "pendidikan.required" => "Deskripsi belum diisi !"
        ]);
        // dd($request);
        $pegawai = User::find($id);
        $pegawai->nik = $request->input('nik');
        $pegawai->nama_pegawai = $request->input('nama_pegawai');
        $pegawai->jenis_kelamin = $request->input('jenis_kelamin');
        $pegawai->tempat_tanggal_lahir= $request->input('tempat_tanggal_lahir');
        $pegawai->telpon = $request->input('telpon');
        $pegawai->agama= $request->input('agama');
        $pegawai->jabatanId= $request->input('jabatan');
        $pegawai->alamat= $request->input('alamat');
        $pegawai->pendidikan= $request->input('pendidikan');

        $pegawai->update();

        

        return redirect('data-pegawai');
    }
}
