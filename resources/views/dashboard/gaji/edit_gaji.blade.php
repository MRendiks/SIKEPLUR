@extends('dashboard.layouts.main')

@section('container')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">

                <div class="card shadow mt-2">

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-black">Edit Data Gaji</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{url('update_gaji',$data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="mb-4">
                                <label for="pegawaiId">pegawai</label>
                                <select name="pegawaiId" class="form-control" id="pegawai" required>
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
                                <label for="bulan" class="form-label">Bulan</label>
                                <select name="bulan" id="bulan" class="form-control" required>
                                    <option value="">- PILIH BULAN -</option>
                                    <option value="1" {{$data->bulan == '1' ? 'selected':''}}>Januari</option>
                                    <option value="2" {{$data->bulan == '2' ? 'selected':''}}>Februari</option>
                                    <option value="3" {{$data->bulan == '3' ? 'selected':''}}>Maret</option>
                                    <option value="4" {{$data->bulan == '4' ? 'selected':''}}>April</option>
                                    <option value="5" {{$data->bulan == '5' ? 'selected':''}}>Mei</option>
                                    <option value="6" {{$data->bulan == '6' ? 'selected':''}}>Juni</option>
                                    <option value="7" {{$data->bulan == '7' ? 'selected':''}}>Juli</option>
                                    <option value="8" {{$data->bulan == '8' ? 'selected':''}}>Agustus</option>
                                    <option value="9" {{$data->bulan == '9' ? 'selected':''}}>September</option>
                                    <option value="10" {{$data->bulan == '10' ? 'selected':''}}>Oktober</option>
                                    <option value="11" {{$data->bulan == '11' ? 'selected':''}}>November</option>
                                    <option value="12" {{$data->bulan == '12' ? 'selected':''}}>Desember</option>
                                </select>
                                @error('bulan')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="tahun" class="form-label">Tahun</label>
                                <select name="tahun" id="tahun" class="form-control" required>
                                    <option value="">- PILIH TAHUN -</option>
                                    @for ($year = 2015; $year <= 2030; $year++)
                                        <option value="{{$year}}" {{$data->tahun == $year ? 'selected':''}}>{{$year}}</option>
                                    @endfor
                                </select>
                                @error('tahun')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="tunjangan" class="form-label">Tunjangan</label>
                                <input type="number" class="form-control" id="tunjangan" name="tunjangan" value="{{$data->tunjangan}}" readonly/>
                                @error('tunjangan')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                                <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" value="{{$data->gaji_pokok}}" readonly/>
                                @error('gaji_pokok')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="total_gaji" class="form-label">Total Gaji</label>
                                <input type="number" class="form-control" id="total_gaji" name="total_gaji" value="{{$data->total_gaji}}" readonly/>
                                @error('total_gaji')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>

                            <div>
                                <center><button class="btn btn-primary" type="submit">Update</button></center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    const karyawan = {
        "A" : {
            "data" : ['Lurah']
        },
        "B" : {
            "data" : ['Carik', 'Sekretariat Desa']
        },
        "C" : {
            "data" : ['Kaur Tatalaksana', 'Kaur Danarto', 'Kaur Pangripto', 'Jagabaya', 'Ulu-Ulu', 'Kamituwa', 'administrator']
        },
        "D" : {
            "data" : ['Dukuh Piyaman I', 'Dukuh Piyaman II', 'Dukuh Pakeljaluk', 'Dukuh Ngerboh I', 'Dukuh Ngerboh II', 'Dukuh Kemorosari I', 'Dukuh Kemorosari II', 'Dukuh Pakelrejo', 'Dukuh Ngemplek', 'Dukuh Budegan I', 'Dukuh Budegan II', 'Staf Pamong']
        }
    };

    $(document).ready(function() {
        $('#pegawai').change(function() {
            var userId = $(this).val(); // Mendapatkan id_user yang dipilih
            
            // Memanggil AJAX
            $.ajax({
                url: '/get-user-data/' + userId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var jabatan = "";
                    var tunjangan = 0;
                    var gaji_pokok = 0;
                    var total_gaji = 0;
                    
                    
                    response.forEach(function(data){
                        jabatan = data.jabatan;
                    });
                    

                    for (var key = 'A'; key <= 'D'; key = String.fromCharCode(key.charCodeAt(0) + 1)) {
                        var karyawanJabatan = karyawan[key]['data'];
                        if (karyawanJabatan.includes(jabatan)) {
                            if (key == "A") {
                                tunjangan = 2000000;
                                gaji_pokok = 3000000;
                            }else if(key == "B"){
                                tunjangan = 1500000;
                                gaji_pokok = 2500000;
                            }else if(key == "C"){
                                tunjangan = 1000000;
                                gaji_pokok = 2000000;
                            }else{
                                tunjangan = 500000;
                                gaji_pokok = 1500000;
                            }
                        }
                    }

                    total_gaji = tunjangan + gaji_pokok;

                    $('#tunjangan').val(tunjangan);
                    $('#gaji_pokok').val(gaji_pokok);
                    $('#total_gaji').val(total_gaji);
                },
                error: function(xhr) {
                    console.error(xhr);
                }
            });
        });
    });
</script>

@endsection