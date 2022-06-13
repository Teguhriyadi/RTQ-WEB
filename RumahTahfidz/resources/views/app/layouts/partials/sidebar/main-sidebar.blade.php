@php
$kategori_penilaian = \App\Models\KategoriPenilaian::all();
@endphp
<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="javascript:void(0)" class="site_title"><i class="fa fa-paw"></i> <span>RTQ Ulil Albab</span>
            </a>
        </div>

        <div class="clearfix"></div>
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ $user->gambar }}"
                    onerror="this.onerror=null; this.src='{{ url('gambar/no-images.png') }}'"
                    alt="{{ $user->nama }}" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2>{{ $user->nama }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                    <li class="{{ Request::segment(3) == 'home' ? 'active' : '' }}">
                        <a href="{{ url('/app/sistem/home') }}">
                            <i class="fa fa-home"></i>Home
                        </a>
                    </li>

                    @can('super_admin')
                        @include('app.layouts.partials.sidebar.menu.m_super')
                    @endcan
                    @can('admin')
                        @include('app.layouts.partials.sidebar.menu.m_admin')
                    @endcan

                    <li class="{{ Request::segment(3) == 'profil/user' ? 'active' : '' }}">
                        <a href="{{ url('/app/sistem/profil/user') }}">
                            <i class="fa fa-user"></i>Profil Saya
                        </a>
                    </li>

                    <li class="{{ Request::segment(3) == 'informasi_login' ? 'active' : '' }}">
                        <a href="{{ url('/app/sistem/informasi_login') }}">
                            <i class="fa fa-key"></i>Informasi Login
                        </a>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Logout" style="width: 100%"
                href="{{ url('app/logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
    </div>
</div>
