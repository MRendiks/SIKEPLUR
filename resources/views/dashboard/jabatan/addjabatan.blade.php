@extends('dashboard.layouts.main')

@section('container')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">

                <div class="card shadow mt-2">

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-black">Data Jabatan</h6>
                    </div>
                    <div class="card-body">
                        <form action="/addjabatan" method="post">
                        @csrf
                            <div class="mb-4">
                                <label for="no_pengangkatan" class="form-label">No Pengakuan</label>
                                <input type="text" class="form-control" id="no_pengakuan" name="no_pengangkatan"
                                value="{{ old('no_pengangkatan') }}" />
                                @error('no_pengakuan')
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
                                <label for="Jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="Jabatan" name="Jabatan"
                                value="{{ old('jabatan') }}" />
                                @error('Jabatan')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="pendidikan">Pendidikan</label>
                                    <input class="form-control" 
                                    type="text" 
                                    name="pendidikan" 
                                    value="{{ old('pendidikan') }}">
                                    @error('pendidikan')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                            </div>
                            
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