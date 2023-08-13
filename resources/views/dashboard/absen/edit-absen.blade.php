@extends('dashboard.layouts.main')

@section('container')

<div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card mt-5">
                        <div class="card-body">
                        <div id="card-content">
                            <div id="card-title">
                                <h3>Data Absen</h3>
                                <br>
                                <div class="underline-title"></div>
                            </div>
                            </div>
                            <br>
                             <!-- form validasi -->
                            <form action="{{url('update_absen',$data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                                <div class="mb-4">
                                    <label for="pegawaiId">pegawai</label>
                                    <select name="pegawaiId" class="form-control">
                                        <option value="">--Silahkan Pilih pegawai</option>
                                        @foreach ($list_nama_karyawan as $item)
                                            <option value="{{$item->id}}" {{$item->id == $data->pegawaiId ? 'selected' : ''}}>{{$item->nama_pegawai}}</option>
                                        @endforeach
                                    </select>
                                        @error('pegawaiId')
                                            <small class="text-danger mt-2">{{ $message }}</small>
                                        @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                                    value="{{ $data->tanggal }}"/>
                                    @error('tanggal')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="waktu_masuk" class="form-label">Waktu Masuk</label>
                                    <input type="datetime-local" class="form-control" id="waktu_masuk" name="waktu_masuk"
                                    value="{{ $data->waktu_masuk }}" />
                                    @error('waktu_masuk')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="waktu_keluar" class="form-label">Waktu Keluar</label>
                                    <input type="datetime-local" class="form-control" id="waktu_keluar" name="waktu_keluar"
                                    value="{{ $data->waktu_keluar }}"/>
                                    @error('waktu_keluar')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="jenis">Jenis Absen</label>
                                    <select name="jenis" class="form-control">
                                        <option value="">--Silahkan Pilih Jenis Absen</option>
                                        <option value="in" {{$data->jenis == 'in' ? 'selected':''}}>in</option>
                                        <option value="out" {{$data->jenis == 'out' ? 'selected':''}}>out</option>
                                        <option value="alpha" {{$data->jenis == 'alpha' ? 'selected':''}}>alpha</option>                                    
                                    </select>
                                    @error('jenis')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                <br>
                        
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </form>
 
                        </div>
                    </div>
            </div>
</div>

@endsection