<div>
    <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center">
      <span class="brand-text font-weight-light">Weight Application</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            @can('access-module', 'Peran User')
              <li class="nav-item">
                <a wire:navigate href="{{route('admin.peran-user')}}" 
                class="nav-link {{request()->routeIs('admin.peran-user') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-user-cog"></i>
                  <p>Peran User</p>
                </a>
              </li>
            @endcan

            @can('access-module', 'User Timbangan')
              <li class="nav-item">
                <a wire:navigate href="{{route('admin.user-timbangan')}}" 
                class="nav-link {{request()->routeIs('admin.user-timbangan') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>User Timbangan</p>
                </a>
              </li>
            @endcan

            @can('access-module', 'Serah Terima')
              <li class="nav-item">
                <a wire:navigate href="{{route('admin.serah-terima', ['plant' => 'unimos'])}}" 
                  class="nav-link {{request()->routeIs('admin.serah-terima') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-handshake"></i>
                  <p>Serah Terima</p>
                </a>
              </li>
            @endcan
          
            @can('access-module', 'Timbangan')
              <li class="nav-item">
                <a wire:navigate href="{{route('admin.timbangan', ['plant' => 'unimos'])}}" 
                  class="nav-link {{request()->routeIs('admin.timbangan') 
                  || request()->routeIs('admin.timbangan.sunfish') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-weight"></i>
                  <p>Timbangan</p>
                </a>
              </li>
            @endcan

          {{-- <li class="nav-item">
            <a wire:navigate href="{{route('admin.konversi-jo')}}" 
              class="nav-link {{request()->routeIs('admin.konversi-jo') ? 'active' : ''}}">
              <i class="nav-icon fas fa-redo"></i>
              <p>Konversi JO</p>
            </a>
          </li> --}}

          @can('access-module', 'Ganti JO')
            <li class="nav-item">
              <a wire:navigate href="{{route('admin.ganti-jo')}}" 
                class="nav-link {{request()->routeIs('admin.ganti-jo') ? 'active' : ''}}">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>Ganti JO</p>
              </a>
            </li>
          @endcan
          
          @can('access-module', 'Formula')
            <li class="nav-item">
              <a wire:navigate href="{{route('admin.formula', ['plant' => 'unimos'])}}"
                class="nav-link {{request()->routeIs('admin.formula') ? 'active' : ''}}">
                <i class="nav-icon fas fa-spinner"></i>
                <p>Formula</p>
              </a>
            </li>
          @endcan

          @can('access-module','Kartu Stok')
            <li class="nav-item">
              <a wire:navigate href="{{route('admin.kartu-stok', ['plant' => 'unimos'])}}"
                class="nav-link {{request()->routeIs('admin.kartu-stok') ? 'active' : ''}}">
                <i class="nav-icon fas fa-sticky-note"></i>
                <p>Kartu Stok</p>
              </a>
            </li>
          @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</div>
