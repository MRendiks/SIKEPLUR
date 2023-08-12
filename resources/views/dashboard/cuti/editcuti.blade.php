@extends('dashboard.layouts.main')

@section('container')

<div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card mt-5">
                        <div class="card-body">
                        <div id="card-content">
                            <div id="card-title">
                                <h3>Data Cuti</h3>
                                <br>
                                <div class="underline-title"></div>
                            </div>
                            </div>
                            <br>
                             <!-- form validasi -->
                            <form action="{{url('data-cuti',$cuti->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-4">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik"
                                value="{{ $cuti->nik }}" />
                                @error('nik')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai"
                                value="{{ $cuti->nama_pegawai }}" />
                                @error('nama_pegawai')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan"
                                value="{{ $cuti->jabatan }}" />
                                @error('jabatan')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                    <label for="jenis_cuti">Jenis Cuti</label>
                                    <input class="form-control" 
                                    type="text" 
                                    name="jenis_cuti" 
                                    value="{{ $cuti->jenis_cuti}}">
                                    @error('jenis_cuti')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="mb-4">
                                    <label for="tanggal_cuti">Tanggal Cuti</label>
                                    <input class="form-control" 
                                    type="text" 
                                    name="tanggal_cuti" 
                                    value="{{ $cuti->tanggal_cuti}}">
                                    @error('tanggal_cuti')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="mb-4">
                                    <label for="tanggal_mulai">Tanggal Mulai</label>
                                    <input class="form-control" 
                                    type="text" 
                                    name="tanggal_mulai" 
                                    value="{{ $cuti->tanggal_mulai}}">
                                    @error('tanggal_mulai')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="mb-4">
                                    <label for="tanggal_akhir">Tanggal Akhir</label>
                                    <input class="form-control" 
                                    type="text" 
                                    name="tanggal_akhir" 
                                    value="{{ $cuti->tanggal_akhir}}">
                                    @error('tanggal_akhir')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="mb-4">
                                    <label for="pengajuan_disetujui">Pengajuan disetujui</label>
                                    <input class="form-control" 
                                    type="text" 
                                    name="pengajuan disetujui" 
                                    value="{{ $cuti->pengajuan disetujui}}">
                                    @error('pengajuan disetujui')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                            <div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-info">Ubah</button>
                                </div>
                            </form>
 
                        </div>
                    </div>
            </div>
</div>

@endsection