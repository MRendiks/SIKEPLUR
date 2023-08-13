<?php

use App\Http\Controllers\DashboardAbsenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardPegawaiController;
use App\Http\Controllers\DashboardJabatanController;
use App\Http\Controllers\DashboardCutiController;
use App\Http\Controllers\DashboardGajiController;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
route::post('/login',[LoginController::class, 'attempt' ]);
Route::post('/logout', [LoginController::class, 'logout']);

route::get('/register', [RegisterController::class, 'get' ])->name('register')->middleware('guest');


route::get('/login', [LoginController::class, 'get' ])->name('login')->middleware('guest');

route::post('register', [RegisterController::class, 'create']);

route::post('/logout', function(){
    Auth::logout();
    return redirect('/');
}); 
Route::get('/register', [RegisterController::class, 'dashboard'])->middleware('guest');
//Route::post('/register', [RegisterController::class, 'authenticate']);//
Route::post('/register', [RegisterController::class, 'create']);

Route::get('/login', function () {
 return view('login');
});
    
# MENGAMBIL DATA USER
route::get('/get-user-data/{id}', [DataController::class, 'getUserData'])->name('get-user-data');

Route::get('/register', function () {
return view('register');
});


Route::group(['middleware' => ['auth', 'ceklevel:petugas,pegawai']], function(){
    Route::get('/dashboard', [DashboardPegawaiController::class, 'dashboard'])->name('dashboard');

    route::get('/cetak_pegawai', [DashboardPegawaiController::class, 'cetak_pegawai'])->name('cetak_pegawai');
    route::get('/cetak_jabatan', [DashboardJabatanController::class, 'cetak_jabatan'])->name('cetak_jabatan');
    route::get('/cetak_cuti', [DashboardCutiController::class, 'cetak_cuti'])->name('cetak_cuti');
    route::post('/{id}/cetak_cuti_karyawan', [DashboardCutiController::class, 'cetak_cuti_karyawan'])->name('cetak_cuti_karyawan');
    route::get('/data-pegawai', [DashboardPegawaiController::class, 'index'])->name('datapegawai');
    route::delete('/data-pegawai', [DashboardPegawaiController::class, 'delete']);
    route::get('/addpegawai', [DashboardPegawaiController::class, 'add'])->name('addpegawai');;
    route::post('/addpegawai', [DashboardPegawaiController::class, 'store'])->name('storepegawai');
    route::get('/data-pegawai/{id}/update', [DashboardPegawaiController::class, 'edit']);
    route::put('/data-pegawai/{id}', [DashboardPegawaiController::class, 'update']);

    route::get('/data-jabatan', [DashboardJabatanController::class, 'index'])->name('datajabatan');
    route::delete('/data-jabatan', [DashboardJabatanController::class, 'delete']);
    route::get('/addjabatan', [DashboardJabatanController::class, 'add'])->name('addjabatan');;
    route::post('/addjabatan', [DashboardJabatanController::class, 'store'])->name('storejabatan');
    route::get('/data-jabatan/{id}/update', [DashboardJabatanController::class, 'edit']);
    route::put('/data-jabatan/{id}', [DashboardJabatanController::class, 'update']);
    // route::get('/data-cuti', [DashboardCutiController::class, 'index'])->name('datacuti');

    route::get('/data-cuti', [DashboardCutiController::class, 'index'])->name('datacuti');
    route::get('/cuti-approval', [DashboardCutiController::class, 'diproses'])->name('datacuti_diproses');
    route::get('/cuti-ditolak', [DashboardCutiController::class, 'ditolak'])->name('datacuti_ditolak');
    route::get('/cuti-diterima', [DashboardCutiController::class, 'diterima'])->name('datacuti_diterima');
    route::delete('/hapus_cuti/{id}', [DashboardCutiController::class, 'delete']);
    route::get('/addcuti', [DashboardCutiController::class, 'add'])->name('addcuti');;
    route::post('/pengajuan_cuti', [DashboardCutiController::class, 'store'])->name('storecuti');
    route::get('/data-cuti/{id}/update', [DashboardCutiController::class, 'edit']);
    route::put('/update_cuti/{id}', [DashboardCutiController::class, 'update']);
    route::put('/olah_persetujuan/{id}', [DashboardCutiController::class, 'olah_persetujuan']);

    route::get('/cetak_pegawai', [DashboardPegawaiController::class, 'cetak_pegawai'])->name('cetak_pegawai');
    route::get('/cetak_jabatan', [DashboardJabatanController::class, 'cetak_jabatan'])->name('cetak_jabatan');
    route::get('/cetak_cuti', [DashboardCutiController::class, 'cetak_cuti'])->name('cetak_cuti');
    route::post('/{id}/cetak_cuti_karyawan', [DashboardCutiController::class, 'cetak_cuti_karyawan'])->name('cetak_cuti_karyawan');

    # ABSEN ADMIN
    # 1.VIEW
    route::get('/data-absen', [DashboardAbsenController::class, 'index'])->name('data-absen');
    # 2. ADD
    route::get('/add_view', [DashboardAbsenController::class, 'add_view'])->name('add_view');
    route::post('/store_absen', [DashboardAbsenController::class, 'store'])->name('store_absen');
    # 3. DELETE
    route::delete('/delete_absen', [DashboardAbsenController::class, 'delete_absen'])->name('delete_absen');
    # 4. UPDATE
    route::get('/update_absen/{id}/update', [DashboardAbsenController::class, 'update_view'])->name('update_absen_view');
    route::put('/update_absen/{id}', [DashboardAbsenController::class, 'update'])->name('update_absen');
    # 5. CETAK ABSEN
    route::get('/cetak_absen', [DashboardAbsenController::class, 'cetak_absen'])->name('cetak_absen');

    # ABSEN PENGGUNA
    # 1. VIEW
    route::get('/addabsen', [DashboardAbsenController::class, 'add_absen_view_user'])->name('add_absen_view_user');
    route::get('/data_absen_user', [DashboardAbsenController::class, 'data_absen_user'])->name('data_absen_user');
    # 2. ADD
    route::post('/store_absen_user', [DashboardAbsenController::class, 'store_absen_user'])->name('store_absen_user');
    # 3. UPDATE
    route::post('/update_absen_keluar_user', [DashboardAbsenController::class, 'update_absen_keluar_user'])->name('update_absen_keluar_user');

    # GAJI ADMIN
    # 1. VIEW 
    route::get('/data-gaji', [DashboardGajiController::class, 'index'])->name('data-gaji');
    route::get('/add_gaji_view', [DashboardGajiController::class, 'add_gaji_view'])->name('add_gaji_view');
    route::get('/update-gaji/{id}/update', [DashboardGajiController::class, 'update_gaji_view'])->name('update_gaji_view');
    # 2. ADD
    route::post('/store_gaji_admin', [DashboardGajiController::class, 'store_gaji_admin'])->name('store_gaji_admin');
    # 3. DELETE
    route::delete('/delete_gaji', [DashboardGajiController::class, 'delete_gaji'])->name('delete_gaji');
    # 4. UPDATE
    route::put('/update_gaji/{id}', [DashboardGajiController::class, 'update_gaji'])->name('update_gaji');
    # 5. CETAK
    route::get('/cetak_gaji_admin', [DashboardGajiController::class, 'cetak_gaji_admin'])->name('cetak_gaji_admin');

    # GAJI USER
    route::get('/data_gaji_user', [DashboardGajiController::class, 'data_gaji_user'])->name('data_gaji_user');

});

Route::group(['middleware' => ['auth', 'ceklevel:petugas']], function(){
    
    route::get('/data-pegawai', [DashboardPegawaiController::class, 'index'])->name('datapegawai');
    route::delete('/data-pegawai', [DashboardPegawaiController::class, 'delete']);
    route::get('/addpegawai', [DashboardPegawaiController::class, 'add'])->name('addpegawai');;
    route::post('/addpegawai', [DashboardPegawaiController::class, 'store'])->name('storepegawai');
    route::get('/data-pegawai/{id}/update', [DashboardPegawaiController::class, 'edit']);
    route::put('/data-pegawai/{id}', [DashboardPegawaiController::class, 'update']);

    route::get('/data-jabatan', [DashboardJabatanController::class, 'index'])->name('datajabatan');
    route::delete('/data-jabatan', [DashboardJabatanController::class, 'delete']);
    route::get('/addjabatan', [DashboardJabatanController::class, 'add'])->name('addjabatan');;
    route::post('/addjabatan', [DashboardJabatanController::class, 'store'])->name('storejabatan');
    route::get('/data-jabatan/{id}/update', [DashboardJabatanController::class, 'edit']);
    route::put('/data-jabatan/{id}', [DashboardJabatanController::class, 'update']);
});

Route::group(['middleware' => ['auth', 'ceklevel:pegawai']], function(){
    

});
