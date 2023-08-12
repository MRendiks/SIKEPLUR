<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardPegawaiController;
use App\Http\Controllers\DashboardJabatanController;
use App\Http\Controllers\DashboardCutiController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
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



Route::get('/register', function () {
return view('register');
});


Route::group(['middleware' => ['auth', 'ceklevel:petugas,pegawai']], function(){
    Route::get('/dashboard', function () {
        return view('dashboard.index');
       });

           
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
    route::get('/data-cuti', [DashboardCutiController::class, 'index'])->name('datacuti');

});
