@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data pegawai</h1>
        <a href="/addpegawai">
            <button type="button" class="btn btn-success">Tambah Pegawai </button>
            </a>

        <a href="/cetak_pegawai">
        <button type="button" class="btn btn-outline-primary" target="_blank">Cetak Laporan</button>
        </a>

    </div>

    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id Pegawai</th>
                            <th>Nik</th>
                            <th>Nama Pegawai</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Tanggal Lahir</th>
                            <th>Telpon</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Pendidikan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach ($datapegawai as $data)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nik}}</td>
                                <td>{{ $data->nama_pegawai}}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                                <td>{{ $data->tempat_tanggal_lahir}}</td>
                                <td>{{ $data->telpon}}</td>
                                <td>{{ $data->agama}}</td>
                                {{-- <td>{{ $data->jabatan}}</td> --}}
                                <td>{{ $data->alamat}}</td>
                                <td>{{ $data->pendidikan}}</td>
                            <td>
                            <form action="/data-pegawai" method="post">
                                                <a class="btn btn-success" href="/data-pegawai/{{ $data->id }}/update">Update<i class="fa-solid fa-pen-to-square"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" formmethod="POST"
                                                onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')"
                                                name="id" value="{{ $data->id }}" class="btn btn-danger">Delete
                                                <i class="fa-solid fa-trash-can"></i>
                                </form>
                            </td>
                            
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection