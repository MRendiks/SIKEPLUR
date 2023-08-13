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
                                <select name="nama_pegawai" id="nama_pegawai" class="form-control">
                                    <option value="">- SILAHKAN PILIH PEGAWAI -</option>
                                    @foreach ($pegawai as $item)
                                        <option value="{{$item->id}}">{{$item->nama_pegawai}}</option>
                                    @endforeach
                                </select>
                                @error('nama_pegawai')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <select name="jabatan" id="jabatan" class="form-control">
                                    <option value="">- SILAHKAN PILIH JABATAN -</option>
                                    @foreach ($jabatan as $item)
                                        <option value="{{$item->jabatan}}">{{$item->jabatan}}</option>
                                    @endforeach
                                </select>
                                @error('jabatan')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="input-pendidikan">pendidikan</label><br>
                                <select name="pendidikan" class="form-control">
                                    <option value="">- PILIH PENDIDIKAN -</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
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