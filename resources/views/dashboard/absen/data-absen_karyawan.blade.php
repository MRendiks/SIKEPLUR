@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Absen</h1>
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
                            
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection