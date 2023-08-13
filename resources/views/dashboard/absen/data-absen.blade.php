@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Absen</h1>
        <a href="{{ route('add_view') }}">
            <button type="button" class="btn btn-success">Tambah Absen </button>
            </a>

        <a href="{{route('cetak_absen')}}">
        <button type="button" class="btn btn-outline-primary" target="_blank">Cetak Laporan</button>
        </a>

    </div>

    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Tanggal</th>
                            <th>Waktu Masuk</th>
                            <th>Waktu Keluar</th>
                            <th>Tipe</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach ($dataTable as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_pegawai}}</td>
                                <td>{{ $data->tanggal}}</td>
                                <td>{{ $data->waktu_masuk }}</td>
                                <td>{{ $data->waktu_keluar}}</td>
                                @if ($data->jenis == "in")
                                    <td><span class="badge badge-warning">Hadir (belum absen keluar)</span> </td>
                                @else
                                    @if ($data->jenis == "out")
                                        <td><span class="badge badge-success">Hadir</span></td>
                                    @else
                                        <td><span class="badge badge-danger">Alpha</span></td>
                                    @endif
                                @endif
                            <td>
                                <form action="{{route('delete_absen')}}" method="post">
                                    <a class="btn btn-success" href="/update_absen/{{ $data->id }}/update">Update<i class="fa-solid fa-pen-to-square"></i></a>
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