@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Gaji</h1>
        <a href="{{route('add_gaji_view')}}">
            <button type="button" class="btn btn-success">Tambah Gaji </button>
            </a>
        <a href="{{route('cetak_gaji_admin')}}">
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
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Tunjangan</th>
                            <th>Gaji Pokok</th>
                            <th>Total Gaji</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach ($dataTable as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_pegawai}}</td>
                                <td>{{ $data->bulan}}</td>
                                <td>{{ $data->tahun }}</td>
                                <td>Rp.{{ number_format($data->tunjangan, 0, ',', '.')}}</td>
                                <td>Rp.{{ number_format($data->gaji_pokok, 0, ',', '.')}}</td>
                                <td>Rp.{{ number_format($data->total_gaji, 0, ',', '.')}}</td>
                            <td>
                                <form action="{{route('delete_gaji')}}" method="post">
                                    <a class="btn btn-success" href="/update-gaji/{{ $data->id }}/update">Update<i class="fa-solid fa-pen-to-square"></i></a>
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