@extends('dashboard.layouts.main')

@section('container')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">

                <div class="card shadow mt-2">

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-black">Data Absen</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{route('store_absen')}}" method="post">
                        @csrf
                            <div class="mb-4">
                                <label for="pegawaiId">pegawai</label>
                                <select name="pegawaiId" class="form-control">
                                    <option value="">--Silahkan Pilih pegawai</option>
                                    @foreach ($list_nama_karyawan as $item)
                                        <option value="{{$item->id}}">{{$item->nama_pegawai}}</option>
                                    @endforeach
                                </select>
                                    @error('pegawaiId')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                            </div>

                            <div class="mb-4">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal"
                                value="{{ old('tanggal') }}" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}"/>
                                @error('tanggal')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="jenis">Jenis Absen</label>
                                <select name="jenis" class="form-control">
                                    <option value="">--Silahkan Pilih Jenis Absen</option>
                                    <option value="in">in</option>
                                    <option value="out">out</option>
                                    <option value="alpha">alpha</option>                                    
                                </select>
                                @error('jenis')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            <br>
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