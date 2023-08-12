@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Jabatan</h1>
        <a href="/addjabatan">
        <button type="button" class="btn btn-outline-success">Tambah Jabatan</button>
        </a>

        <a href="/cetak_jabatan">
            <button type="button" class="btn btn-outline-primary" target="_blank">Cetak Laporan</button>
            </a>

    </div>


    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>No pengangkatan</th>
                            <th>Nama Pegawai</th>
                            <th>Jabatan</th>
                            <th>Pendidikan</th>
                            <th>Aksi</th>
                    </thead>

                    <tbody>
                    @foreach ($datajabatan as $data)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->no_pengangkatan}}</td>
                                <td>{{ $data->nama_pegawai}}</td>
                                <td>{{ $data->jabatan }}</td>
                                <td>{{ $data->pendidikan }}</td>
                            <td>
                            <form action="/data-jabatan" method="post">
                                                <a class="btn btn-success" href="/data-jabatan/{{ $data->id }}/update">Update<i class="fa-solid fa-pen-to-square"></i></a>
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