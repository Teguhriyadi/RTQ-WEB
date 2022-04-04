<?php
use App\Models\Profil;
$data = Profil::select("nama", "singkatan")->first();
?>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/app/admin/') }}">
                @if(empty($data->nama))
                Anonymus
                @else
                {{ $data->nama }}
                @endif
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/app/admin') }}">
                @if(empty($data->singkatan))
                HIN
                @else
                {{ $data->singkatan }}
                @endif
            </a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Home</li>
            <li class="dropdown {{ Request::segment(3) == "home" ? "active" : "" }}">
                <a href="{{ url('/app/sistem/home') }}" class="nav-link">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="menu-header">Menu</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
            </li>
            @can("admin")
            <li class="{{ Request::segment(3) == "santri" ? "active" : "" }}">
                <a class="nav-link" href="{{ url('/app/sistem/santri') }}">
                    <i class="fa fa-user"></i>
                    <span>Siswa</span>
                </a>
            </li>
            <li class="{{ Request::segment(3) == "asatidz" ? "active" : "" }}">
                <a class="nav-link" href="{{ url('/app/sistem/asatidz') }}">
                    <i class="fa fa-user"></i>
                    <span>Asatidz</span>
                </a>
            </li>
            <li class="{{ Request::segment(3)=='absensi' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/app/sistem/absensi') }}">
                    <i class="fa fa-book"></i>
                    <span>Absensi</span>
                </a>
            </li>   
            @endcan
            @can("super_admin")
            <li class="{{ Request::segment(3)=="admin_cabang" ? "active" : "" }}">
                <a class="nav-link" href="{{ url('/app/sistem/admin_cabang') }}">
                    <i class="fa fa-users"></i>
                    <span>Admin Cabang</span>
                </a>
            </li>
            @endcan
            <li class="menu-header"> Web </li>
            <li class="{{ Request::segment(3) == "profil" ? "active" : "" }}">
                <a class="nav-link" href="{{ url('/app/sistem/profil') }}">
                    <i class="fa fa-search"></i>
                    <span>Profil</span>
                </a>
            </li>
            <li class="menu-header">Settings</li>
            @can("super_admin")
            <li class="{{ Request::segment(3) == "status_absen" ? "active" : "" }}">
                <a class="nav-link" href="{{ url('/app/sistem/status_absen') }}">
                    <i class="fa fa-book"></i>
                    <span>Status Absen</span>
                </a>
            </li>
            <li class="{{ Request::segment(3) == 'cabang' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/app/sistem/cabang') }}">
                    <i class="fa fa-search"></i>
                    <span>Cabang</span>
                </a>
            </li>
            <li class="{{ Request::segment(3) == 'jenjang' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/app/sistem/jenjang') }}">
                    <i class="fa fa-search"></i>
                    <span>Jenjang</span>
                </a>
            </li>
            <li class="{{ Request::segment(3)=='role' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/app/sistem/role') }}">
                    <i class="far fa-user"></i>
                    <span>Role</span>
                </a>
            </li>
            <li class="{{ Request::segment(3)=='users' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/app/sistem/users/') }}">
                    <i class="far fa-user"></i>
                    <span>Users</span>
                </a>
            </li>
            @endcan
            <li class="{{ Request::segment(3)=='pesan' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/app/sistem/pesan') }}">
                    <i class="fa fa-book"></i>
                    <span>Pesan</span>
                </a>
            </li>
            <li class="{{ Request::segment(3)=='profil_user' ? 'active' : ''}}">
                <a class="nav-link" href="{{ url('/app/sistem/profil_user') }}">
                    <i class="far fa-user"></i>
                    <span>Profil User</span>
                </a>
            </li>
            <li class="{{ Request::segment(3)=='informasi_login' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/app/sistem/informasi_login') }}">
                    <i class="fa fa-key"></i>
                    <span>Informasi Login</span>
                </a>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
