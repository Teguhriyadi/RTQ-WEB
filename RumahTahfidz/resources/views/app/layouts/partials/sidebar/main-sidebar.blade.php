<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="javascript:void(0)" class="site_title"><i class="fa fa-paw"></i> <span>RTQ Ulil
                Albab</span>
            </a>
        </div>

        <div class="clearfix"></div>
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ auth()->user()->gambar == null? 'http://rtq-freelance.my.id/gambar/gambar_user.png': auth()->user()->gambar }}"
                alt="{{ auth()->user()->nama }}" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2>{{ auth()->user()->nama }}</h2>
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
                    @can('santri')
                    <li class="">
                        <a>
                            <i class="fa fa-list"></i> Rekap Penilaian
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="">Tadribat</a>
                            </li>
                            <li>
                                <a href="">Hafalan</a>
                            </li>
                            <li>
                                <a href="">Imla</a>
                            </li>
                            <li>
                                <a href="">Iman Adab</a>
                            </li>
                            <li>
                                <a href="">Mulok</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ Request::segment(3)=='rekap_absensi' ? 'active' : '' }}">
                        <a href="{{ url('/app/sistem/rekap_absensi') }}">
                            <i class="fa fa-book"></i>Rekap Absensi
                        </a>
                    </li>
                    <li class="{{ Request::segment(3)=='rekap_iuran' ? 'active' : '' }}">
                        <a href="{{ url('/app/sistem/rekap_iuran') }}">
                            <i class="fa fa-money"></i>Rekap Iuran
                        </a>
                    </li>
                    <li class="{{ Request::segment(3)=='profil_santri' ? 'active' : '' }}">
                        <a href="{{ url('/app/sistem/profil_santri') }}">
                            <i class="fa fa-users"></i>Profil Santri
                        </a>
                    </li>
                    @endcan

                    @can("asatidz")
                    <li>
                        <a>
                            <i class="fa fa-edit"></i> Absensi Santri
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/app/sistem/input_absensi_santri') }}">Input Kehadiran</a></li>
                            <li><a href="{{ url('/app/sistem/absensi_santri') }}">Data Absensi</a></li>
                        </ul>
                    </li>

                    <li>
                        <a>
                            <i class="fa fa-edit"></i> Penilaian Kategori
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/app/sistem/kategori/tadribat/') }}">Tadribat</a></li>
                            <li><a href="{{ url('/app/sistem/kategori/hafalan') }}">Hafalan</a></li>
                            <li><a href="{{ url('/app/sistem/kategori/imla') }}">Imla</a></li>
                        </ul>
                    </li>

                    <li>
                        <a>
                            <i class="fa fa-edit"></i> Data Penilaian
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/app/sistem/data/tadribat/') }}">Tadribat</a></li>
                            <li><a href="{{ url('/app/sistem/data/hafalan') }}">Hafalan</a></li>
                            <li><a href="{{ url('/app/sistem/data/imla') }}">Imla</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ url('/app/sistem/rekap/nilai') }}">
                            <i class="fa fa-book"></i> Rekap Nilai
                        </a>
                    </li>

                    @endcan

                    @can('admin')
                    <li>
                        <a>
                            <i class="fa fa-bars"></i> Level Tes Santri
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="{{ url('/app/sistem/tes/input') }}">Input Level Tes Santri</a>
                            </li>
                            <li>
                                <a href="{{ url('/app/sistem/tes/data') }}">Data Level Tes Santri</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ Request::segment(3)=='santri' ? 'active' : '' }}">
                        <a href="{{ url('/app/sistem/santri') }}">
                            <i class="fa fa-user"></i>Santri
                        </a>
                    </li>
                    <li class="{{ Request::segment(3)=='wali_santri' ? 'active' : '' }}">
                        <a href="{{ url('/app/sistem/wali_santri') }}">
                            <i class="fa fa-user"></i>Wali Santri
                        </a>
                    </li>
                    <li class="{{ Request::segment(3)=='asatidz' ? 'active' : '' }}">
                        <a href="{{ url('/app/sistem/asatidz') }}">
                            <i class="fa fa-user"></i>Asatidz
                        </a>
                    </li>
                    <li class="{{ Request::segment(3)=='absensi' ? 'active' : '' }}">
                        <a href="{{ url('/app/sistem/absensi') }}">
                            <i class="fa fa-book"></i>Absensi
                        </a>
                    </li>
                    @endcan

                    @can('super_admin')
                    <li class="{{ Request::segment(3)=='admin_lokasi_rt' ? 'active' : '' }}">
                        <a href="{{ url('/app/sistem/admin_lokasi_rt') }}">
                            <i class="fa fa-users"></i> Admin Lokasi RT
                        </a>
                    </li>
                    <li class="{{ Request::segment(3)=='kelas' ? 'active' : '' }}">
                        <a href="{{ url('/app/sistem/kelas') }}">
                            <i class="fa fa-bars"></i>Kelas
                        </a>
                    </li>
                    <li class="{{ Request::segment(3)=='profil' ? 'active' : '' }}">
                        <a href="{{ url('/app/sistem/profil') }}">
                            <i class="fa fa-search"></i>Profil WEB
                        </a>
                    </li>
                    <li class="{{ Request::segment(3)=='status_absen' ? 'active' : '' }}">
                        <a href="{{ url('/app/sistem/status_absen') }}">
                            <i class="fa fa-book"></i>Status Absen
                        </a>
                    </li>
                    <li class="{{ Request::segment(3)=='cabang' ? 'active' : '' }}">
                        <a href="{{ url('/app/sistem/cabang') }}">
                            <i class="fa fa-search"></i>RTQ Cabang
                        </a>
                    </li>
                    <li class="{{ Request::segment(3)=='halaqah' ? 'active' : '' }}">
                        <a href="{{ url('/app/sistem/halaqah') }}">
                            <i class="fa fa-search"></i>Halaqah
                        </a>
                    </li>
                    <li>
                        <a>
                            <i class="fa fa-home"></i> Pelajaran <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('/app/sistem/pelajaran/tadribat') }}">Tadribat</a></li>
                            <li><a href="{{ url('/app/sistem/pelajaran/hafalan') }}">Hafalan</a></li>
                            <li><a href="{{ url('/app/sistem/pelajaran/imla') }}">Imla</a></li>
                            <li><a href="{{ url('/app/sistem/pelajaran/iman_adab') }}">Iman & Adab</a></li>
                            <li><a href="{{ url('/app/sistem/pelajaran/mulok') }}">Mulok</a></li>
                        </ul>
                    </li>
                    <li class="{{ Request::segment(3)=='jenjang' ? 'active' : '' }}">
                        <a href="{{ url('/app/sistem/jenjang') }}">
                            <i class="fa fa-search"></i>Jenjang
                        </a>
                    </li>
                    <li class="{{ Request::segment(3)=='role' ? 'active' : '' }}">
                        <a href="{{ url('/app/sistem/role') }}">
                            <i class="fa fa-user"></i>Role
                        </a>
                    </li>
                    <li class="{{ Request::segment(3)=='users' ? 'active' : '' }}">
                        <a href="{{ url('/app/sistem/users') }}">
                            <i class="fa fa-user"></i>Users
                        </a>
                    </li>
                    <li class="{{ Request::segment(3)=='pesan' ? 'active' : '' }}">
                        <a href="{{ url('/app/sistem/pesan') }}">
                            <i class="fa fa-book"></i>Pesan
                        </a>
                    </li>
                    @endcan

                    <li class="{{ Request::segment(3)=='profil' ? 'active' : '' }}">
                        <a href="{{ url('/app/sistem/profil_user') }}">
                            <i class="fa fa-user"></i>Profil Saya
                        </a>
                    </li>

                    <li class="{{ Request::segment(3)=='informasi_login' ? 'active' : '' }}">
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
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('app/logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
    </div>
</div>
