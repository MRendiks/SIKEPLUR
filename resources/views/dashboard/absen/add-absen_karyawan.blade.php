@extends('dashboard.layouts.main')

@section('container')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
            @if (is_null($checkAbsen))
                <div class="card shadow mt-5">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-black">Data Absen Masuk</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{route('store_absen_user')}}" method="post">
                        @csrf
                            <div class="mb-4">
                                <label for="pegawaiId">pegawai</label>
                                <input type="text" class="form-control" id="pegawaiId" name="pegawaiId"
                                value="{{ $userName }}" disabled/>
                                    @error('pegawaiId')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                            </div>

                            <div class="mb-4">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal"
                                min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}"/>
                                @error('tanggal')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>

                            <div>
                                <center><button class="btn btn-primary" type="submit">Absen</button></center>
                            </div>
                        </form>
                    </div>
                </div> {{-- akhir contain --}}

                @else
                    <div class="card shadow mt-5">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-black">Data Absen Keluar</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{route('update_absen_keluar_user')}}" method="post">
                            @csrf
                                <div class="mb-4">
                                    <label for="pegawaiId">pegawai</label>
                                    <input type="text" class="form-control" id="tanggal" name="tanggal"
                                    value="{{ $userName }}" disabled/>
                                        @error('pegawaiId')
                                            <small class="text-danger mt-2">{{ $message }}</small>
                                        @enderror
                                </div>

                                <br>
                                <div>
                                    <center><button class="btn btn-primary" type="submit">Absen Keluar</button></center>
                                </div>
                            </form>
                        </div>
                    </div> {{-- akhir contain --}}
                @endif
            </div>
        </div>
    </div>

@endsection