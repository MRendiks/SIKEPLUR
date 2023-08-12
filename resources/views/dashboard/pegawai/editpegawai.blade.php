@extends('dashboard.layouts.main')

@section('container')

<div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card mt-5">
                        <div class="card-body">
                        <div id="card-content">
                            <div id="card-title">
                                <h3>Data Pegawai</h3>
                                <br>
                                <div class="underline-title"></div>
                            </div>
                            </div>
                            <br>
                             <!-- form validasi -->
                            <form action="{{url('data-pegawai',$pegawai->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-4">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik"
                                value="{{ $pegawai->nik }}" />
                                @error('nik')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai"
                                value="{{ $pegawai->nama_pegawai }}" />
                                @error('nama_pegawai')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                                value="{{ $pegawai->jenis_kelamin}}" />
                                @error('jenis_kelamin')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                    <label for="tempat_tanggal_lahir">Tempat Tanggal Lahir</label>
                                    <input class="form-control" 
                                    type="text" 
                                    name="tempat_tanggal_lahir" 
                                    value="{{ $pegawai->tempat_tanggal_lahir}}">
                                    @error('tempat_tanggal_lahir')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                            </div>
                                    <div class="mb-4">
                                    <label for="telpon">Telpon</label>
                                    <input class="form-control" 
                                    type="text" 
                                    name="telpon" 
                                    value="{{ $pegawai->telpon}}">
                                    @error('telpon')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="mb-4">
                                    <label for="agama">Agama</label>
                                    <input class="form-control" 
                                    type="text" 
                                    name="agama" 
                                    value="{{ $pegawai->agama}}">
                                    @error('agama')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                    </div>
                            <div class="mb-4">
                                    <label for="alamat">Alamat</label>
                                    <input class="form-control" 
                                    type="text" 
                                    name="alamat" 
                                    value="{{ $pegawai->alamat}}">
                                    @error('alamat')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                    </div>
                            <div class="mb-4">
                                <label for="jabatan">Jabatan</label>
                                <select class="form-select" aria-label="Default select example" name="jabatan">
                                    <option value="">---Pilih Jabatan---</option>
                                    @foreach ($jabatan as $data)
                                        <option value="{{$data->id}}">{{$data->jabatan}}</option>
                                    @endforeach
                                </select>
                                </div>
                                    
                            <div class="mb-4">
                                    <label for="pendidikan">Pendidikan</label>
                                    <input class="form-control" 
                                    type="text" 
                                    name="pendidikan" 
                                    value="{{ $pegawai->pendidikan}}">
                                    @error('pendidikan')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                    </div>
                        
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </form>
 
                        </div>
                    </div>
            </div>
</div>

@endsection