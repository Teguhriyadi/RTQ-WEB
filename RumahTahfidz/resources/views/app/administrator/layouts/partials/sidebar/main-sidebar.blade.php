<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/app/admin/') }}">Rumah Tahfidz</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/app/admin') }}">RTQ</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Home</li>
            <li class="dropdown {{ Request::segment(3) == "home" ? "active" : "" }}">
                <a href="{{ url('/app/admin/home') }}" class="nav-link">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="menu-header">Starter</li>
            @can("admin")
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
            </li>
            <li class="{{ Request::segment(3) == "siswa" ? "active" : "" }}">
                <a class="nav-link" href="{{ url('/app/admin/siswa') }}">
                    <i class="fa fa-user"></i>
                    <span>Siswa</span>
                </a>
            </li>
            <li class="{{ Request::segment(3) == "pengajar" ? "active" : "" }}">
                <a class="nav-link" href="{{ url('/app/admin/pengajar') }}">
                    <i class="fa fa-user"></i>
                    <span>Pengajar</span>
                </a>
            </li>
            <li class="{{ Request::segment(3) == "status_absen" ? "active" : "" }}">
                <a class="nav-link" href="{{ url('/app/admin/status_absen') }}">
                    <i class="fa fa-book"></i>
                    <span>Status Absen</span>
                </a>
            </li>
            @endcan
            <li class="{{ Request::segment(3)=='absensi' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/app/admin/absensi') }}">
                    <i class="fa fa-book"></i>
                    <span>Absensi</span>
                </a>
            </li>
            @can("pengajar")
            <li class="{{ Request::segment(3)=='penilaian' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/app/admin/penilaian') }}">
                    <i class="fa fa-book"></i>
                    <span>Penilaian</span>
                </a>
            </li>
            @endcan
            <li class="menu-header">Settings</li>
            <li class="{{ Request::segment(3)=='pesan' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/app/admin/pesan') }}">
                    <i class="fa fa-book"></i>
                    <span>Pesan</span>
                </a>
            </li>
            <li class="{{ Request::segment(3)=='profile' ? 'active' : ''}}">
                <a class="nav-link" href="{{ url('/app/admin/profil') }}">
                    <i class="far fa-user"></i>
                    <span>Profil</span>
                </a>
            </li>
            @can("admin")
            <li class="{{ Request::segment(3)=='users' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/app/admin/users/') }}">
                    <i class="far fa-user"></i>
                    <span>Users</span>
                </a>
            </li>
            <li class="{{ Request::segment(3)=='role' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/app/admin/role') }}">
                    <i class="far fa-user"></i>
                    <span>Role</span>
                </a>
            </li>
            <li class="{{ Request::segment(3)=='informasi_login' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/app/admin/informasi_login') }}">
                    <i class="fa fa-key"></i>
                    <span>Informasi Login</span>
                </a>
            </li>
            @endcan
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>


</section>
</div>
