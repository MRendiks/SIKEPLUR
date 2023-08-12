@extends('dashboard.layouts.main')

@section('container')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 px-2">

                <div class="card shadow mt-2">

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h3 class="m-0 font-weight-bold text-black">Form pengajuan Cuti</h3>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="form-horizontal" name="cuti" action="/pengajuan_cuti" method="POST" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    @csrf
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <input type="text" name="pegawaiId" value="{{auth()->user()->id}}" hidden>
                                            <input type="text" name="nik" value="{{auth()->user()->nik}}" hidden>
                                            <input type="text" name="jabatan" value="pegawai" hidden>
                                            
                                            <label class=" control-label col-sm-3">Mulai Cuti</label>
                                            
                                                <input type="date" name="tanggal_mulai" min="{{$minDate}}" class="form-control" required>
                                                
                                            
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Akhir Cuti</label>
                                            
                                                <input type="date" name="tanggal_akhir" min="{{$minDate}}" class="form-control" required>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Jenis Cuti</label>
                                            
                                                <select name="jenis_cuti" class="form-control">
                                                    <option value="">---Pilih Jenis Cuti---</option>
                                                    <option value="Cuti Tahunan">Cuti Tahunan</option>
                                                    <option value="Cuti Besar">Cuti Besar</option>
                                                    <option value="Cuti Bersama">Cuti Bersama</option>
                                                    <option value="Cuti Haid">Cuti Haid</option>
                                                    <option value="Cuti Hamil dan Melahirkan">Cuti Hamil dan Melahirkan</option>
                                                    <option value="Cuti Keguguran">Cuti Keguguran</option>
                                                    <option value="Cuti Sakit">Cuti Sakit</option>
                                                    <option value="Cuti Alasan Penting">Cuti Alasan Penting</option>
                                                    
                                                </select>
                                            
                                           
                                            {{-- 
                                                <input type="text" name="jenis_cuti" class="form-control" required>
                                            </div> --}}
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Keterangan</label>
                                            
                                                <textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="3" required></textarea>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="panel-footer">
                                        <center><button type="submit" name="simpan" class=" btn btn-success">Simpan</button></center>
                                    </div>
                                </div><!-- /.panel -->
                            </form>
                        </div><!-- /.col-lg-12 -->
                    </div><!-- /.row -->
                </div>
            </div>
        </div>
    </div>

@endsection