@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Cuti</h1>
        
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
                                <form action="/hapus_cuti/{{$data->id}}" method="post">
                                    <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateDatacuti{{$data->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
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

                           
                  
                    </tbody>
                    <div class="modal fade" id="updateDatacuti{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="updateDatacutiLabel" aria-hidden="true">
                        <div class="modal-dialog " role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <center><h4 class="modal-title" id="updateDatacutiLabel">Update Data Cuti</h4></center>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" name="cuti" action="/update_cuti/{{$data->id}}" method="POST" enctype="multipart/form-data">
                                    <div class="panel panel-default">
                                        @csrf
                                        @method("PUT")
                                        <div class="panel-body">
                                            <div class="form-group">
                                                
                                                <label class=" control-label col-sm-3">Mulai Cuti</label>
                                                <div class="col-sm-4">
                                                    <input type="date" name="tanggal_mulai" class="form-control" value="{{$data->mulai_cuti}}" required>
                                                    
                                                </div>
                                            </div>
    
                                            <div class="form-group">
                                                <label class="control-label col-sm-3">Akhir Cuti</label>
                                                <div class="col-sm-4">
                                                    <input type="date" name="tanggal_akhir" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-3">Jenis Cuti</label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="jenis_cuti" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-3">Keterangan</label>
                                                <div class="col-sm-4">
                                                    <textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="3" required></textarea>
                                                </div>
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
                </table>
            </div>
        </div>
    </div>
</div>
@endsection