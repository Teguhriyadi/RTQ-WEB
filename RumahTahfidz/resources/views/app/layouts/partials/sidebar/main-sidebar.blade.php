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
                <img src="{{ $user->gambar == null ? 'http://rtq-freelance.my.id/gambar/gambar_user.png' : $user->gambar }}"
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
                        <li>
                            <a>
                                <i class="fa fa-bars"></i> Data Master
                                <span class="fa fa-chevron-down"></span>
                            </a>
                            <ul class="nav child_menu">
                                <li class="{{ Request::segment(3) == 'kelas' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/kelas') }}">
                                        Kelas
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'status_absen' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/status_absen') }}">
                                        Status Absen
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'jenjang' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/jenjang') }}">
                                        Jenjang
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'kelas_halaqah' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/kelas_halaqah') }}">
                                        Kelas Halaqah
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'jabatan' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/jabatan') }}">
                                        Jabatan
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'halaqah' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/halaqah') }}">
                                        Halaqah
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'admin_lokasi_rt' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/admin_lokasi_rt') }}">
                                        Admin Lokasi RT
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'asatidz' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/asatidz') }}">
                                        Asatidz
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'wali_santri' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/wali_santri') }}">
                                        Wali Santri
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'santri' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/santri') }}">
                                        Santri
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a>
                                <i class="fa fa-bars"></i> Halaman Utama
                                <span class="fa fa-chevron-down"></span>
                            </a>
                            <ul class="nav child_menu">
                                <li class="{{ Request::segment(3) == 'profil/web' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/profil/web') }}">
                                        Profil WEB
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'kategori' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/kategori') }}">
                                        Kategori
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'kategori' ? 'blog' : '' }}">
                                    <a href="{{ url('/app/sistem/blog') }}">
                                        Blog
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'pesan' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/pesan') }}">
                                        Pesan
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'tentang_kami' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/tentang_kami') }}">
                                        Tentang Kami
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'struktur_organisasi' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/struktur_organisasi') }}">
                                        Struktur Organisasi
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a>
                                <i class="fa fa-bar-chart"></i> Laporan
                                <span class="fa fa-chevron-down"></span>
                            </a>
                            <ul class="nav child_menu">
                                <li>
                                    <a href="{{ url('/app/sistem/iuran') }}">
                                        Iuran
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="{{ Request::segment(3) == 'users' || Request::segment(3) == 'role' ? 'active' : '' }}">
                            <a>
                                <i class="fa fa-users"></i> Akun
                                <span class="fa fa-chevron-down"></span>
                            </a>
                            <ul class="nav child_menu"
                                style="display: {{ Request::segment(3) == 'users' || Request::segment(3) == 'role' ? 'block' : '' }}">
                                <li class="{{ Request::segment(3) == 'role' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/role') }}">
                                        Role
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'users' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/users') }}">
                                        Users
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a>
                                <i class="fa fa-gears"></i> Setting
                                <span class="fa fa-chevron-down"></span>
                            </a>
                            <ul class="nav child_menu">
                                {{-- <li class="{{ Request::segment(3) == 'iuran' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/setting/iuran') }}">
                                        Iuran
                                    </a>
                                </li> --}}
                                <li class="{{ Request::segment(3) == 'status' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/setting/validasi') }}">
                                        Status Validasi
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'kategori_nilai' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/setting/kategori/nilai') }}">
                                        Kategori Penilaian
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'kategori_pelajaran' }}">
                                    <a href="{{ url('/app/sistem/setting/kategori/pelajaran') }}">
                                        Kategori Pelajaran
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'nilai_kategori' }}">
                                    <a href="{{ url('/app/sistem/setting/nilai/kategori') }}">
                                        Nilai Kategori
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'pelajaran' }}">
                                    <a href="{{ url('/app/sistem/pelajaran') }}">
                                        Pelajaran
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'nominal/iuran' }}">
                                    <a href="{{ url('/app/sistem/setting/nominal/iuran') }}">
                                        Nominal Iuran
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a>
                                <i class="fa fa-download"></i> Generate
                                <span class="fa fa-chevron-down"></span>
                            </a>
                            <ul class="nav child_menu">
                                <li>
                                    <a href="{{ url('/app/sistem/generate/iuran') }}">
                                        Iuran
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/app/sistem/generate/asatidz') }}">
                                        Asatidz
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/app/sistem/generate/santri') }}">
                                        Santri
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::segment(3) == 'hafalan_asatidz' ? 'active' : '' }}">
                            <a href="{{ url('/app/sistem/hafalan/asatidz') }}">
                                <i class="fa fa-book"></i> Hafalan Asatidz
                            </a>
                        </li>
                    @endcan
                    @can('admin')
                        <li>
                            <a>
                                <i class="fa fa-bars"></i> Data Master
                                <span class="fa fa-chevron-down"></span>
                            </a>
                            <ul class="nav child_menu">
                                <li class="{{ Request::segment(3) == 'santri' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/santri') }}">
                                        Santri
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'wali_santri' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/wali_santri') }}">
                                        Wali Santri
                                    </a>
                                </li>
                                <li class="{{ Request::segment(3) == 'asatidz' ? 'active' : '' }}">
                                    <a href="{{ url('/app/sistem/asatidz') }}">
                                        Asatidz
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li id="laporan">
                            <a>
                                <i class="fa fa-bar-chart"></i> Laporan
                                <span class="fa fa-chevron-down"></span>
                            </a>
                            <ul class="nav child_menu">
                                <li>
                                    <a href="{{ url('/app/sistem/iuran') }}">
                                        Iuran
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        Absensi <span class="fa fa-chevron-down"></span>
                                    </a>
                                    <ul class="nav child_menu">
                                        <li>
                                            <a href="{{ url('/app/sistem/laporan/absensi/santri/') }}">
                                                Santri
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/app/sistem/laporan/absensi/asatidz') }}">
                                                Asatidz
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    @can('santri')
                        <li class="{{ Request::segment(3) == 'rekap_nilai' ? 'active' : '' }}">
                            <a href="{{ url('/app/sistem/rekap_nilai') }}">
                                <i class="fa fa-book"></i> Rekap Nilai
                            </a>
                        </li>
                        <li class="{{ Request::segment(3) == 'rekap_absensi' ? 'active' : '' }}">
                            <a href="{{ url('/app/sistem/rekap_absensi') }}">
                                <i class="fa fa-book"></i>Rekap Absensi
                            </a>
                        </li>
                        <li class="{{ Request::segment(3) == 'rekap_iuran' ? 'active' : '' }}">
                            <a href="{{ url('/app/sistem/rekap_iuran') }}">
                                <i class="fa fa-money"></i>Rekap Iuran
                            </a>
                        </li>
                        <li class="{{ Request::segment(3) == 'profil_santri' ? 'active' : '' }}">
                            <a href="{{ url('/app/sistem/profil_santri') }}">
                                <i class="fa fa-users"></i>Profil Santri
                            </a>
                        </li>
                    @endcan

                    @can('asatidz')
                        <li>
                            <a>
                                <i class="fa fa-edit"></i> Penilaian
                                <span class="fa fa-chevron-down"></span>
                            </a>
                            <ul class="nav child_menu" {!! Request::segment(3) == 'penilaian' ? 'style="display: block;"' : 'style="display: none";' !!}>
                                @foreach ($kategori_penilaian as $item)
                                    <li>
                                        <a
                                            href="{{ url('/app/sistem/penilaian/' . $item->slug) }}">{{ $item->kategori_penilaian }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li id="laporan">
                            <a>
                                <i class="fa fa-bar-chart"></i> Laporan
                                <span class="fa fa-chevron-down"></span>
                            </a>
                            <ul class="nav child_menu">
                                <li>
                                    <a href="{{ url('/app/sistem/iuran') }}">
                                        Iuran
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        Absensi <span class="fa fa-chevron-down"></span>
                                    </a>
                                    <ul class="nav child_menu">
                                        <li>
                                            <a href="{{ url('/app/sistem/laporan/absensi/santri/') }}">
                                                Santri
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/app/sistem/laporan/absensi/asatidz') }}">
                                                Asatidz
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
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

                        <li class="{{ Request::segment(3) == 'absensi' ? 'active' : '' }}">
                            <a href="{{ url('/app/sistem/absensi') }}">
                                <i class="fa fa-book"></i>Absensi
                            </a>
                        </li>
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
