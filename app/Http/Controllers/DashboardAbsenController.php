<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardAbsenController extends Controller
{
    # ADMIN

    public function index()
    {
        $dataTable = Absen::select('users.nama_pegawai', 'absen.*')
        	->join('users', 'users.id', '=', 'absen.pegawaiId')
        	->get();
        $userId     = getAuthenticatedUserId();
        $userName   = getAuthenticatedUserName(); 
        $dataUser   = User::find($userId);
        return view('dashboard.absen.data-absen', compact('dataTable', 'userName'));
    }
    
    public function add_view()
    {
        $list_nama_karyawan = User::all();
        $userId     = getAuthenticatedUserId();
        $userName   = getAuthenticatedUserName(); 
        $dataUser   = User::find($userId);
        return view('dashboard.absen.add-absen', compact('list_nama_karyawan', 'userName', 'dataUser'));
    }

    public function update_view($id)
    {
        $data = Absen::find($id);
        $list_nama_karyawan = User::all();
        $userId     = getAuthenticatedUserId();
        $userName   = getAuthenticatedUserName(); 
        $dataUser   = User::find($userId);
        return view('dashboard.absen.edit-absen', compact('data', 'list_nama_karyawan','userName', 'dataUser'));
    }

    public function store(Request $request)
    {
        $absen = new Absen;
        $absen->pegawaiId   = $request->input('pegawaiId');
        $absen->tanggal     = $request->input('tanggal');
        $absen->jenis       = $request->input('jenis');
        if ($request->input('jenis') == 'in') {
            $absen->waktu_masuk = now();
        }else if($request->input('jenis') == 'out'){
            $absen->waktu_keluar = now();
        }
        $absen->save();

        return redirect()->route('data-absen');
    }

    public function update(Request $request, $id)
    {
        $absen = Absen::find($id);
        $absen->pegawaiId       = $request->input('pegawaiId');
        $absen->tanggal         = $request->input('tanggal');
        $absen->waktu_masuk     = $request->input('waktu_masuk');
        $absen->waktu_keluar    = $request->input('waktu_keluar');
        $absen->jenis           = $request->input('jenis');
        $absen->update();
        
        return redirect()->route('data-absen');
    }

    public function delete_absen(Request $request)
    {
        $id = $request->id;

        $absen = new Absen();
        $absen->where('id', $id)->delete();

        return redirect()->route('data-absen');
    }

    public function cetak_absen()
    {
        $dataTable = Absen::select('users.nama_pegawai', 'absen.*')
        	->join('users', 'users.id', '=', 'absen.pegawaiId')
        	->get();
        $userId     = getAuthenticatedUserId();
        $userName   = getAuthenticatedUserName(); 
        $dataUser   = User::find($userId);
        return view('dashboard.absen.laporan_cetak', compact('dataTable','userName', 'dataUser'));
    }

    # USER
    # VIEW
    public function add_absen_view_user()
    {
        $userId     = getAuthenticatedUserId();
        $userName   = getAuthenticatedUserName(); 
        $dataUser   = User::find($userId);

        $checkAbsen = Absen::select('users.nama_pegawai', 'absen.*')
            ->join('users', 'users.id', '=', 'absen.pegawaiId')
            ->where('absen.pegawaiId', '=', $userId)
            ->where('absen.tanggal', '=', now()->format('Y-m-d'))
            ->first();

        if (is_null($checkAbsen) || $checkAbsen->jenis == "in") {
            return view('dashboard.absen.add-absen_karyawan', compact('checkAbsen', 'userName', 'dataUser'));
            
        }
        else{
            return redirect('/dashboard')->with('failed', 'Anda Sudah Absen');
        }
    }

    public function data_absen_user()
    {
        $userId     = getAuthenticatedUserId();
        $userName   = getAuthenticatedUserName();
        
        $dataTable = Absen::select('users.nama_pegawai', 'absen.*')
        ->join('users', 'users.id', '=', 'absen.pegawaiId')
        ->where('absen.pegawaiId', '=', $userId)
        ->get();
        $dataUser   = User::find($userId);
        return view('dashboard.absen.data-absen_karyawan', compact('dataTable','userName','dataUser'));

    }


    # ADD
    public function store_absen_user(Request $request)
    {
        $absen = new Absen;
        $userId     = getAuthenticatedUserId();

        $absen->pegawaiId       = $userId;
        $absen->tanggal         = $request->input('tanggal');
        $absen->waktu_masuk     = now();
        $absen->jenis           = 'in';
        $absen->save();

        return redirect()->route('data_absen_user');
    }

    # UPDATE
    public function update_absen_keluar_user(Request $request)
    {
        $userId     = getAuthenticatedUserId();

        $getAbsenToday = Absen::select('users.nama_pegawai', 'absen.*')
        ->join('users', 'users.id', '=', 'absen.pegawaiId')
        ->where('absen.pegawaiId', '=', $userId)
        ->where('absen.tanggal', '=', now()->format('Y-m-d'))
        ->first();

        $absen      = Absen::find($getAbsenToday->id);
        $absen->waktu_keluar    = now();
        $absen->jenis           = 'out';
        $absen->update();

        return redirect()->route('data_absen_user');
    }


}
