@extends('dashboard.layouts.main')

@section('container')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">

                <div class="card shadow mt-2">

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-black">Data Pegawai</h6>
                    </div>
                    <div class="card-body">
                        <form action="/addpegawai" method="post">
                        @csrf
                            <div class="mb-4">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik"
                                value="{{ old('nik') }}" />
                                @error('nik')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="email_pegawai" class="form-label">Email Pegawai</label>
                                <input type="text" class="form-control" id="email_pegawai" name="email_pegawai"
                                value="{{ old('email_pegawai') }}" />
                                @error('email_pegawai')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="password_pegawai" class="form-label">Password Pegawai</label>
                                <input type="text" class="form-control" id="password_pegawai" name="password_pegawai"
                                value="{{ old('password_pegawai') }}" />
                                @error('password_pegawai')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai"
                                value="{{ old('nama_pegawai') }}" />
                                @error('nama_pegawai')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="">--Silahkan Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                    <input class="form-control" type="text" 
                                    name="tempat_lahir" 
                                    value="{{ old('tempat_lahir') }}">
                                    @error('tempat_lahir')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="mb-4">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input class="form-control" type="date" 
                                    name="tanggal_lahir" 
                                    value="{{ old('tanggal_lahir') }}">
                                    @error('tanggal_lahir')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="mb-4">
                                <label for="Telpon">Telpon</label>
                                    <input class="form-control" 
                                    type="text" 
                                    name="telpon" 
                                    value="{{ old('telpon') }}">
                                    @error('telpon')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="mb-4">
                                <label for="Agama">Agama</label>
                                <select name="agama" class="form-control">
                                    <option value="">--Silahkan Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Hindu">Hindu</option>
                                </select>
                                    @error('agama')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                            </div>
                            {{-- <div class="mb-4">
                                <label for="jabatan">Jabatan</label>
                                    <input class="form-control" 
                                    type="text" 
                                    name="jabatan" 
                                    value="{{ old('jabatan') }}">
                                    @error('jabatan')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                    </div> --}}
                            <div class="mb-4">
                                <label for="Alamat">Alamat</label>
                                    <input class="form-control" 
                                    type="text" 
                                    name="alamat" 
                                    value="{{ old('alamat') }}">
                                    @error('alamat')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                    </div>
                            <div class="mb-4">
                                <label for="pendidikan">pendidikan</label>
                                <select name="pendidikan" class="form-control">
                                    <option value="">--Silahkan Pilih Pendidikan</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMK">SMK</option>
                                    <option value="SMA">SMA</option>
                                    <option value="MAN">MAN</option>
                                    <option value="D3">D3</option>
                                    <option value="S1">S1</option>
                                    
                                </select>
                                    @error('pendidikan')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                            <div>
                                <button class="btn btn-primary" type="submit">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection