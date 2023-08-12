<header class="navbar navbar-blue sticky-top bg-#A9A9A9 flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">SIMPEG KELURAHAN PIYAMAN</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- <input class="form-control form-control-black w-100" type="text" placeholder="Search" aria-label="Search"> -->
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
    <form action="/logout" method="post">
    @csrf
        <button type="submit" class="nav-link px-3 bg-white border-0">LOGOUT<i class="bi bi-house-door-fill"></i></i></button>
    </form>
  </div>
</header>