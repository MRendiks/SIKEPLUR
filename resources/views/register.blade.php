<!doctype html>
<html lang="en">
<head>
    @include('dashboard.layouts.head')
    <title>Register</title>
</head>
<body style="background-image: url('pegawai/images/img_2.jpeg');">
@include('components.navbar')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-lg-5">
  
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-1">REGISTER SI KARYAWAN</h1>
                      <img src="img/logo.png" class="mt-2 mb-4" width="100">
                    </div>

                    <form action="/register" method="POST">
                        @csrf
                            <div class="mb-4">
                                <label for="input-email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="input-email" name="email" value="{{ old('email') }}" />
                                @error('email')
                                <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="input-password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="input-password" name="password" />
                                @error('password')
                                <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="input-nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="input-nik" name="nik" />
                                @error('nik')
                                <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="input-nama_pegawai" class="form-label">Nama Pegawai</label>
                                <input type="text" class="form-control" id="input-nama_pegawai" name="nama_pegawai" />
                                @error('nama_pegawai')
                                <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="input-tempat" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="input-tempat" name="tempat" />
                                @error('tempat')
                                <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="input-tanggal" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="input-tanggal" name="tanggal" />
                                @error('tanggal')
                                <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="input-telepon" class="form-label">Telepon</label>
                                <input type="text" class="form-control" id="input-telepon" name="telepon" />
                                @error('telepon')
                                <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="input-jenis_kelamin">Jenis Kelamin</label><br>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="">---Pilih jenis_kelamin---</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="input-agama">Agama</label><br>
                                <select name="agama" class="form-control">
                                    <option value="">---Pilih Agama---</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="input-pendidikan">pendidikan</label><br>
                                <select name="pendidikan" class="form-control">
                                    <option value="">---Pilih pendidikan---</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="SARJAN">SARJAN</option>
                                </select>
                            </div>
                            <div>
                                <button class="btn btn-primary" type="submit">Register</button>
                            </div>
                        </form>
  
                  </div>
                </div>
              </div>
            </div>
          </div>
  
        </div>
  
      </div>
</div>
</body>
</html>