@extends('dashboard.layouts.main')

@section('container')

<div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card mt-5">
                        <div class="card-body">
                        <div id="card-content">
                            <div id="card-title">
                                <h3>Data Jabatan</h3>
                                <br>
                                <div class="underline-title"></div>
                            </div>
                            </div>
                            <br>
                             <!-- form validasi -->
                            <form action="{{url('data-jabatan',$jabatan->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-4">
                                <label for="no_pengangkatan" class="form-label">No pengakuan</label>
                                <input type="text" class="form-control" id="no_pengangkatan" name="no_pengangkatan"
                                value="{{ $jabatan->no_pengangkatan }}" />
                                @error('no_pengangkatan')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                           
                            <div class="mb-4">
                                <label for="nama_pegawai">Nama Pegawai</label>
                                <select class="form-select" aria-label="Default select example" name="nama_pegawai">
                                    <option value="">---Pilih Nama pegawai---</option>
                                    @foreach ($users as $data)
                                        <option value="{{$data->id}}">{{$data->nama_pegawai}}</option>
                                    @endforeach
                                </select>
                                </div>
                            <div class="mb-4">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan"
                                value="{{ $jabatan->jabatan }}" />
                                @error('jabatan')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                    <label for="pendidikan">Pendidikan</label>
                                    <input class="form-control" 
                                    type="text" 
                                    name="pendidikan" 
                                    value="{{ $jabatan->pendidikan }}">
                                    @error('kelas')
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