<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardCutiController extends Controller
{
    public function index()
    {
        $cuti = Cuti::select('cuti.id'  ,'cuti.nik', 'users.nama_pegawai', 'cuti.jabatan', 'cuti.jenis_cuti', 'cuti.jumlah_hari_cuti', 'cuti.tanggal_mulai', 'cuti.tanggal_akhir', 'cuti.status')
        	->join('users', 'users.id', '=', 'cuti.pegawaiId')
        	->get();
        $userId     = getAuthenticatedUserId();
        $userName   = getAuthenticatedUserName(); 
        $dataUser   = User::find($userId);
        return view('dashboard.cuti.datacuti', ['datacuti' => $cuti, 'userName'=>$userName, 'dataUser'=>$dataUser]);
    }

    public function cetak_cuti()
    {
        $data_cuti = Cuti::select('cuti.id'  ,'cuti.nik', 'users.nama_pegawai', 'cuti.jabatan', 'cuti.jenis_cuti', 'cuti.jumlah_hari_cuti', 'cuti.tanggal_mulai', 'cuti.tanggal_akhir', 'cuti.status')
        	->join('users', 'users.id', '=', 'cuti.pegawaiId')
        	->get();
        $userId     = getAuthenticatedUserId();
        $userName   = getAuthenticatedUserName(); 
        $dataUser   = User::find($userId);
        return view('dashboard.cuti.laporan_cetak', compact('data_cuti', 'userName', 'dataUser'));
    }

    public function cetak_cuti_karyawan($id)
    {
        $data_cuti = Cuti::select('cuti.id'  ,'cuti.nik', 'users.nama_pegawai', 'cuti.jabatan', 'cuti.jenis_cuti', 'cuti.jumlah_hari_cuti', 'cuti.tanggal_mulai', 'cuti.tanggal_akhir', 'cuti.status')
        	->join('users', 'users.id', '=', 'cuti.pegawaiId')
            ->where('cuti.id', '=', $id)
        	->get();
        $userId     = getAuthenticatedUserId();
        $userName   = getAuthenticatedUserName();
        $dataUser   = User::find($userId); 
        return view('dashboard.cuti.laporan_cetak_perkaryawan', compact('data_cuti','userName', 'dataUser'));
    }

    public function diproses()
    {
        $cuti = Cuti::select('cuti.id'  ,'cuti.nik', 'users.nama_pegawai', 'cuti.jabatan', 'cuti.jenis_cuti', 'cuti.jumlah_hari_cuti', 'cuti.tanggal_mulai', 'cuti.tanggal_akhir', 'cuti.status')
        	->join('users', 'users.id', '=', 'cuti.pegawaiId')
            ->where('cuti.status', 'diproses')
        	->get();
        $userId     = getAuthenticatedUserId();
        $userName   = getAuthenticatedUserName(); 
        $dataUser   = User::find($userId);
        return view('dashboard.cuti.datacuti_olah', ['datacuti' => $cuti, 'userName' => $userName, 'dataUser' => $dataUser]);
    }

    public function ditolak()
    {
        $cuti = Cuti::select('cuti.id'  ,'cuti.nik', 'users.nama_pegawai', 'cuti.jabatan', 'cuti.jenis_cuti', 'cuti.jumlah_hari_cuti', 'cuti.tanggal_mulai', 'cuti.tanggal_akhir', 'cuti.status')
        	->join('users', 'users.id', '=', 'cuti.pegawaiId')
            ->where('cuti.status', 'ditolak')
        	->get();
        $userId     = getAuthenticatedUserId();
        $userName   = getAuthenticatedUserName(); 
        $dataUser   = User::find($userId);
        return view('dashboard.cuti.datacuti_olah', ['datacuti' => $cuti, 'userName'=>$userName, 'dataUser'=>$dataUser]);
    }

    public function diterima()
    {
        $cuti = Cuti::select('cuti.id'  ,'cuti.nik', 'users.nama_pegawai', 'cuti.jabatan', 'cuti.jenis_cuti', 'cuti.jumlah_hari_cuti', 'cuti.tanggal_mulai', 'cuti.tanggal_akhir', 'cuti.status')
        	->join('users', 'users.id', '=', 'cuti.pegawaiId')
            ->where('cuti.status', 'diterima')
        	->get();
        foreach ($cuti as $item) {
            $item['tanggal_mulai'];
        }
        $userId     = getAuthenticatedUserId();
        $userName   = getAuthenticatedUserName(); 
        $dataUser   = User::find($userId);
        return view('dashboard.cuti.datacuti_olah', ['datacuti' => $cuti,'userName'=>$userName, 'dataUser'=>$dataUser]);
    }

    public function add()
    {
        $data_cuti = Cuti::select('cuti.nik', 'users.nama_pegawai', 'cuti.jabatan', 'cuti.jenis_cuti', 'cuti.tanggal_mulai', 'cuti.tanggal_mulai', 'cuti.tanggal_akhir', )
        	->join('users', 'users.id', '=', 'cuti.pegawaiId')
        	->get()
            ->first();
        // dd($data_cuti);
        $minDate = Carbon::now();
        $minDate = $minDate->toDateString();
        $maxDate = Carbon::now();
        $maxDate = $maxDate->addDays(3);
        $maxDate = $maxDate->toDateString();
        $userId     = getAuthenticatedUserId();
        $userName   = getAuthenticatedUserName(); 
        $dataUser   = User::find($userId);
        return view('dashboard.cuti.addcuti', compact('data_cuti', 'minDate', 'maxDate','userName','dataUser'));
    }


    public function store(Request $request)
    {
        $cuti = new Cuti;
        $mulai = Carbon::parse($request->tanggal_mulai);
        $akhir = Carbon::parse($request->tanggal_akhir);

        $cuti->nik = $request->nik;
        $cuti->pegawaiId = $request->pegawaiId;
        $cuti->jabatan = $request->jabatan;
        $cuti->jenis_cuti = $request->jenis_cuti;
        $cuti->jumlah_hari_cuti = $mulai->diffInDays($akhir);
        $cuti->tanggal_mulai = $mulai;
        $cuti->tanggal_akhir= $akhir;
        $cuti->keterangan= $request->keterangan;
        
        $cuti->status= 'diproses';

        $cuti->save();
        return redirect('/cuti-approval');
    }

    public function delete(Request $request, $id)
    {
        $id = $request->id;

        $cuti = new Cuti();
        $cuti->where('id', $id)->delete();

        return redirect('/dashboard');
    }


    public function edit(Request $request, $id)
    {
        // return view('admin.supplier.editsupplier');
        $cuti= Cuti::find($id);
        return view('dashboard.cuti.editcuti', compact('cuti'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $cuti= Cuti::find($id);
        $mulai = Carbon::parse($request->tanggal_mulai);
        $akhir = Carbon::parse($request->tanggal_akhir);

        $cuti->jenis_cuti = $request->jenis_cuti;
        $cuti->jumlah_hari_cuti = $mulai->diffInDays($akhir);
        $cuti->tanggal_mulai = $mulai;
        $cuti->tanggal_akhir= $akhir;
        $cuti->keterangan= $request->keterangan;
        $cuti->update();

        return redirect('data-cuti');
    }

    public function olah_persetujuan(Request $request, $id)
    {
        // dd($request);
        $cuti= Cuti::find($id);
        $cuti->status= $request->status;
        $cuti->update();

        return redirect('data-cuti');
    }

    
}
