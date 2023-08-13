<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DashboardGajiController extends Controller
{
    # ADMIN
    # 1. VIEW
    public function index()
    {
        $dataTable = Gaji::select('users.nama_pegawai', 'gaji.*')
        ->join('users', 'users.id', '=', 'gaji.pegawaiId')
        ->get();
        $userId     = getAuthenticatedUserId();
        $userName   = getAuthenticatedUserName(); 
        $dataUser   = User::find($userId);
        return view('dashboard.gaji.data-gaji', compact('dataTable','userName','dataUser'));
    }

    public function add_gaji_view()
    {
        $list_nama_karyawan = User::all();
        $userId     = getAuthenticatedUserId();
        $userName   = getAuthenticatedUserName();
        $dataUser   = User::find($userId); 
        return view('dashboard.gaji.add_gaji', compact('list_nama_karyawan','userName','dataUser'));
    }

    # 2. ADD
    public function store_gaji_admin(Request $request)
    {
        $request->validate([
            'pegawaiId' => [
                'required',
                Rule::unique('gaji')->where(function ($query) use ($request) {
                    return $query->where('bulan', $request->bulan)
                                ->where('tahun', $request->tahun);
                })
            ],
            'bulan' => 'required',
            'tahun' => 'required',
            'tunjangan' => 'required',
            'gaji_pokok' => 'required',
            'total_gaji' => 'required',
        ]);

        // dd($request->except('_token'));
        Gaji::create($request->except('_token'));

        return redirect()->route('data-gaji');
    }

    # 3. DELETE
    public function delete_gaji(Request $request)
    {
        $id = $request->id;

        $gaji = new Gaji();
        $gaji->where('id', $id)->delete();

        return redirect()->route('data-gaji');
    }

    # 4. UPDATE
    public function update_gaji_view($id)
    {
        $data = Gaji::find($id);
        $list_nama_karyawan = User::all();

        $userId     = getAuthenticatedUserId();
        $userName   = getAuthenticatedUserName(); 
        $dataUser   = User::find($userId);
        return view('dashboard.gaji.edit_gaji', compact('list_nama_karyawan', 'data','userName','dataUser'));
    }

    # 5. UPDATE
    public function update_gaji(Request $request, $id)
    {
        $validateData = $request->validate([
            'pegawaiId' => [
                'required',
                Rule::unique('gaji')->where(function ($query) use ($request) {
                    return $query->where('bulan', $request->bulan)
                                ->where('tahun', $request->tahun);
                })
            ],
            'bulan' => 'required',
            'tahun' => 'required',
            'tunjangan' => 'required',
            'gaji_pokok' => 'required',
            'total_gaji' => 'required',
        ]);

        $gaji = Gaji::find($id);

        $gaji->update($validateData);

        return redirect()->route('data-gaji');
    }

    # 5. CETAK GAJi
    public function cetak_gaji_admin()
    {
        $dataTable = Gaji::select('users.nama_pegawai', 'gaji.*')
        ->join('users', 'users.id', '=', 'gaji.pegawaiId')
        ->get();
        $userId     = getAuthenticatedUserId();
        $userName   = getAuthenticatedUserName(); 
        $dataUser   = User::find($userId);
        return view('dashboard.gaji.laporan_cetak', compact('dataTable','userName','dataUser'));
    }


    # USER
    # 1. VIEW
    public function data_gaji_user()
    {
        $userId     = getAuthenticatedUserId();
        $userName   = getAuthenticatedUserName(); 

        $dataTable = Gaji::select('users.nama_pegawai', 'gaji.*')
        ->join('users', 'users.id', '=', 'gaji.pegawaiId')
        ->where('gaji.pegawaiId', '=', $userId)
        ->get();
        $dataUser   = User::find($userId);

        return view('dashboard.gaji.data-gaji_karyawan', compact('dataTable', 'userName','dataUser'));
    }
}
