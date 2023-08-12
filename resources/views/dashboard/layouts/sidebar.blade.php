<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard') ? 'active' : ''}}" aria-current="page" href="/dashboard">
              <span data-feather="home" class="align-text-bottom"></span>
              <i class="fa-solid fa-house"></i> Dashboard
            </a>
          </li>
          @if (auth()->user()->level=="petugas")
              
          
          <li class="nav-item">
            <a class="nav-link {{Request::is('data-pegawai') ? 'active' : ''}}" href="data-pegawai">
              <span data-feather="book" class="align-text-bottom"></span>
              <i class="fa-solid fa-users"></i> Data Pegawai
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link {{Request::is('data-jabatan') ? 'active' : ''}}" href="data-jabatan">
              <span data-feather="users" class="align-text-bottom"></span>
              <i class="fa-solid fa-folder-tree"></i> Data Jabatan
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link {{Request::is('data-cuti') ? 'active' : ''}}" href="data-cuti">
              <span data-feather="users" class="align-text-bottom"></span>
              <i class="fa-solid fa-rectangle-list"></i> Data Pengajuan Cuti
            </a>
          </li>
         
          @else
          <li class="nav-item">
            <a class="nav-link {{Request::is('addcuti') ? 'active' : ''}}" href="addcuti">
                <span data-feather="users" class="align-text-bottom"></span>
                <i class="fa-solid fa-mailbox"></i> Pengajuan Cuti
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{Request::is('cuti-approval') ? 'active' : ''}}" href="cuti-approval">
                  <span data-feather="users" class="align-text-bottom"></span>
                  <i class="fa-solid fa-circle-pause"></i> Data Cuti Menunggu Proses
                </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{Request::is('cuti-ditolak') ? 'active' : ''}}" href="cuti-ditolak">
                  <span data-feather="users" class="align-text-bottom"></span>
                  <i class="fa-solid fa-ban"></i> Data Cuti Ditolak
                </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{Request::is('cuti-diterima') ? 'active' : ''}}" href="cuti-diterima">
                  <span data-feather="users" class="align-text-bottom"></span>
                  <i class="fa-solid fa-badge-check"></i> Data Cuti Diterima
                </a>
            </li>
          @endif
        </ul>
        
       
      </div>
    </nav>