@extends('dashboard.layouts.main')

@section('container')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">

                <div class="card shadow mt-2">

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-black">Tambah Data Gaji</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{route('store_gaji_admin')}}" method="post">
                        @csrf
                            <div class="mb-4">
                                <label for="pegawaiId">pegawai</label>
                                <select name="pegawaiId" class="form-control" id="pegawai" required>
                                    <option value="">--Silahkan Pilih pegawai</option>
                                    @foreach ($list_nama_karyawan as $item)
                                        <option value="{{$item->id}}">{{$item->nama_pegawai}}</option>
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
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
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
                                        <option value="{{$year}}">{{$year}}</option>
                                    @endfor
                                </select>
                                @error('tahun')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="tunjangan" class="form-label">Tunjangan</label>
                                <input type="number" class="form-control" id="tunjangan" name="tunjangan" readonly/>
                                @error('tunjangan')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                                <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" readonly/>
                                @error('gaji_pokok')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="total_gaji" class="form-label">Total Gaji</label>
                                <input type="number" class="form-control" id="total_gaji" name="total_gaji" readonly/>
                                @error('total_gaji')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>

                            <div>
                                <center><button class="btn btn-primary" type="submit">Tambah</button></center>
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