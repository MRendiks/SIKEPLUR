@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Cuti</h1>
        <a href="/cetak_cuti">
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
                            <th>Nik</th>
                            <th>Nama Pegawai</th>
                            <th>Jabatan</th>
                            <th>Jenis Cuti</th>
                            <th>Tanggal Cuti</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Akhir</th>
                            <th>Status</th>
                            <th>Cetak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($datacuti as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->nama_pegawai }}</td>
                                <td>{{ $data->jabatan }}</td>
                                <td>{{ $data->jenis_cuti}}</td>
                                <td>{{ $data->jumlah_hari_cuti }} Hari</td>
                                <td>{{ $data->tanggal_mulai}}</td>
                                <td>{{ $data->tanggal_akhir}}</td>
                                @if ($data->status == "diproses")
                                <td> <div class="badge badge-warning px-auto">{{ $data->status}}</div> </td>
                                @endif
                                @if ($data->status == "ditolak")
                                <td> <div class="badge badge-danger px-auto">{{ $data->status}}</div> </td>
                                @endif
                                @if ($data->status == "diterima")
                                <td> <div class="badge badge-success px-auto">{{ $data->status}}</div> </td>
                                @endif
                                <td>
                                    <form action="/{{$data->id}}/cetak_cuti_karyawan" method="post">
                                        @csrf
                                        <input type="submit" class="btn btn-primary" value="Cetak">
                                    </form>
                                </td>
                            <td>
                                <form action="/datacuti" method="post">
                                    <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#olahPersetujuan{{$data->id}}"><i class="fa-solid fa-pen-to-square">Edit</i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" formmethod="POST"
                                    onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')"
                                    name="id" value="{{ $data->id }}" class="btn btn-danger">
                                    <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                            </tr>
                            <div class="modal fade" id="olahPersetujuan{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="olahPersetujuanLabel" aria-hidden="true">
                                <div class="modal-dialog " role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <center><h4 class="modal-title" id="olahPersetujuanLabel">Olah Persetujuan</h4></center>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" name="cuti" action="/olah_persetujuan/{{$data->id}}" method="POST" enctype="multipart/form-data">
                                            <div class="panel panel-default">
                                                @csrf
                                                @method("PUT")
                                                <div class="form-group">
                                                    <label for="progres">Progress</label>
                                                    <select class="form-select" aria-label="Default select example" name="status">
                                                    <option {{ $data->status == 'diproses' ? 'selected' : '' }} value="diproses">diproses</option>
                                                    <option {{ $data->status == 'ditolak' ? 'selected' : '' }} value="ditolak">ditolak</option>
                                                    <option {{ $data->status == 'diterima' ? 'selected' : '' }} value="diterima">diterima</option>
                                                    </select>
                                                </div>
                                                </div>
                                                <div class="panel-footer">
                                                    <button type="submit" name="simpan" class=" btn btn-success">Simpan</button>
                                                </div>
                                            </div><!-- /.panel -->
                                        </form>
                                    </div>
                                    </div>
                                </div>
                              </div>
                    @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection