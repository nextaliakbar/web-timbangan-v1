<div>
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav align-items-center">
      <li class="nav-item d-none d-sm-inline-block">
        <h5 class="p-2">
          <strong>Anda Masuk Sebagai PIC {{auth('user')->user()->PIC == 'PIC_SERAH' ? 'Serah' : 'Terima'}} : 
            <span class="badge badge-success p-2 text-md">{{auth('user')->user()->USER}}</span>
          </strong>
        </h5>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
        <h5 class="p-2">
          <strong>PIC {{session()->get('user-pic')->PIC == 'PIC_SERAH' ? 'Serah' : 'Terima'}} Anda Adalah : 
            <span class="badge badge-info p-2 text-md">{{session()->get('user-pic')->USER}}</span>
          </strong>
        </h5>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      <li class="nav-item mr-2">
        <button wire:click="loginToManagementApp" type="button" class="btn btn-md btn-primary">
          <i class="fas fa-window-restore mr-2"></i>
          Masuk Ke Aplikasi Manajemen
        </button>
      </li>

      <li class="nav-item">
          <button type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt mr-1"></i>Keluar
          </button>
      </li>

      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="{{asset('assets/image/profile-picture.png')}}" class="user-image img-circle" alt="User Image">
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header">
            <img src="{{asset('assets/image/profile-picture.png')}}" class="img-circle" alt="User Image">
            <p>{{auth()->guard('user')->user()->USER}}</p>
            <h5><span class="badge badge-success p-2">{{str_replace('_', ' ', auth()->guard('user')->user()->PIC)}}</span></h5>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <div class="modal fade" id="logoutModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body text-center">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title mb-2">Anda yakin ingin keluar?</h4>
            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Tidak</button>
            <button wire:click="logout" type="button" class="btn btn-danger">Ya</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
</div>
  <!-- /.navbar -->
</div>
