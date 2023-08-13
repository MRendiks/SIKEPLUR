<header class="navbar navbar-blue sticky-top bg-#A9A9A9 flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">SIMPEG KELURAHAN PIYAMAN</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- <input class="form-control form-control-black w-100" type="text" placeholder="Search" aria-label="Search"> -->
  <div class="navbar-nav">
    <div class="nav-item text-nowrap d-flex justify-content-between" >
      <div class="d-flex justify-content-between" data-bs-toggle="modal" data-bs-target="#profile">
      <span class="d-md-block mt-2 mr-2">{{$userName}}</span>
      <img src="{{asset('pegawai/images/person_3.jpg')}}" alt="Profile" class="rounded-circle mt-1" width="30px" height="30px">
      </div>
    <form action="/logout" method="post">
    @csrf
        <button type="submit" class="nav-link px-3 bg-white border-0">LOGOUT<i class="bi bi-house-door-fill"></i></i></button>
    </form>
  </div>
</header>

<div class="modal fade col-md-15" id="profile" tabindex="-1" role="dialog" aria-labelledby="detailprofile" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <center><h4 class="modal-title" id="detailprofile">Profile User</h4></center>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="nama_pegawai" class=" col-form-label">Nama Pegawai</label>
              <input type="text" name="nama_pegawai" class="form-control" value="{{$userName}}" readonly>
            </div>
            <div class="mb-3">
              <label for="jenis_kelamin" class=" col-form-label">Jenis Kelamin</label>
              <input type="text" name="jenis_kelamin" class="form-control" value="{{$dataUser->jenis_kelamin}}" readonly>
            </div>
            <div class="mb-3">
              <label for="tempat_tanggal_lahir" class=" col-form-label">Tempat, Tanggal Lahir</label>
              <input type="text" name="tempat_tanggal_lahir" class="form-control" value="{{$dataUser->tempat_tanggal_lahir}}" readonly>
            </div>
            <div class="mb-3">
              <label for="telpon" class=" col-form-label">Nomor Hp</label>
              <input type="text" name="telpon" class="form-control" value="{{$dataUser->telpon}}" readonly>
            </div>
            <div class="mb-3">
              <label for="agama" class=" col-form-label">Agama</label>
              <input type="text" name="agama" class="form-control" value="{{$dataUser->agama}}" readonly>
            </div>
            <div class="mb-3">
              <label for="alamat" class=" col-form-label">Alamat</label>
              <input type="text" name="alamat" class="form-control" value="{{$dataUser->alamat}}" readonly>
            </div>
            <div class="mb-3">
              <label for="pendidikan" class=" col-form-label">Pendidikan</label>
              <input type="text" name="pendidikan" class="form-control" value="{{$dataUser->pendidikan}}" readonly>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div> <!-- End model -->