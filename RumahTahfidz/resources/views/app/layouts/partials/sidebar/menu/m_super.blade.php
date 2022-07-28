<li>
    <a>
        <i class="fa fa-database"></i> Data Master
        <span class="fa fa-chevron-down"></span>
    </a>
    <ul class="nav child_menu">
        <li class="{{ Request::segment(4) == 'create' ? 'active' : '' }}">
            <a href="{{ url('/app/sistem/admin_cabang') }}">
                Admin Cabang
            </a>
        </li>
        <li class="{{ Request::segment(3) == 'asatidz' ? 'active' : '' }}">
            <a href="{{ url('/app/sistem/asatidz') }}">
                Asatidz
            </a>
        </li>
        <li class="{{ Request::segment(3) == 'kelas_halaqah' ? 'active' : '' }}">
            <a href="{{ url('/app/sistem/kelas_halaqah') }}">
                Wali Halaqah
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
        <i class="fa fa-file-archive-o"></i> Data Akademik
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
        <li class="{{ Request::segment(3) == 'lokasi_cabang' ? 'active' : '' }}">
            <a href="{{ url('/app/sistem/lokasi_cabang') }}">
                Lokasi Cabang
            </a>
        </li>
        <li class="{{ Request::segment(3) == 'halaqah' ? 'active' : '' }}">
            <a href="{{ url('/app/sistem/halaqah') }}">
                Halaqah
            </a>
        </li>
        <li>
            <a>
                Pelajaran
                <span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu">
                <li class="{{ Request::segment(3) == 'pelajaran' }}">
                    <a href="{{ url('/app/sistem/pelajaran') }}">
                        Pelajaran
                    </a>
                </li>
                <li class="{{ Request::segment(3) == 'kategori_pelajaran' }}">
                    <a href="{{ url('/app/sistem/setting/kategori/pelajaran') }}">
                        Kategori Pelajaran
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a>
                Penilaian
                <span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu">
                <li class="{{ Request::segment(3) == 'kategori_nilai' ? 'active' : '' }}">
                    <a href="{{ url('/app/sistem/setting/kategori/nilai') }}">
                        Kategori Penilaian
                    </a>
                </li>
                <li class="{{ Request::segment(3) == 'nilai_kategori' }}">
                    <a href="{{ url('/app/sistem/setting/nilai/kategori') }}">
                        Nilai Kategori
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</li>
<li>
    <a>
        <i class="fa fa-server"></i> Halaman Utama
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
        <li>
            <a>
                Struktur Organisasi
                <span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu">
                <li class="{{ Request::segment(3) == 'jabatan' ? 'active' : '' }}">
                    <a href="{{ url('/app/sistem/jabatan') }}">
                        Jabatan
                    </a>
                </li>
                <li class="{{ Request::segment(3) == 'struktur_organisasi' ? 'active' : '' }}">
                    <a href="{{ url('/app/sistem/struktur_organisasi') }}">
                        Struktur
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</li>
<li>
    <a>
        <i class="fa fa-money"></i> Administasi Keuangan
        <span class="fa fa-chevron-down"></span>
    </a>
    <ul class="nav child_menu">
        <li>
            <a href="{{ url('/app/sistem/generate/iuran') }}">
                Rekap Iuran
            </a>
        </li>
        <li>
            <a href="{{ url('/app/sistem/iuran') }}">
                Validasi Iuran
            </a>
        </li>
        <li>
            <a>Pengaturan <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li class="{{ Request::segment(3) == 'nominal/iuran' }}">
                    <a href="{{ url('/app/sistem/setting/nominal/iuran') }}">
                        Nominal Pendaftaran
                    </a>
                </li>
                <li>
                    <a href="{{ url('/app/sistem/besaran_iuran') }}">
                        Besaran Iuran
                    </a>
                </li>
                <li class="{{ Request::segment(3) == 'status' ? 'active' : '' }}">
                    <a href="{{ url('/app/sistem/setting/validasi') }}">
                        Status Validasi
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</li>
<li class="{{ Request::segment(3) == 'users' || Request::segment(3) == 'role' ? 'active' : '' }}">
    <a>
        <i class="fa fa-users"></i> Data Akun
        <span class="fa fa-chevron-down"></span>
    </a>
    <ul class="nav child_menu"
        style="display: {{ Request::segment(3) == 'users' || Request::segment(3) == 'role' ? 'block' : '' }}">
        <li class="{{ Request::segment(3) == 'users' ? 'active' : '' }}">
            <a href="{{ url('/app/sistem/users') }}">
                Users
            </a>
        </li>
        <li>
            <a>
                Pengaturan
                <span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu">
                <li class="{{ Request::segment(3) == 'role' ? 'active' : '' }}">
                    <a href="{{ url('/app/sistem/role') }}">
                        Role
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</li>
<li class="{{ Request::segment(3) == 'hafalan_asatidz' ? 'active' : '' }}">
    <a href="{{ url('/app/sistem/hafalan/asatidz') }}">
        <i class="fa fa-book"></i> Hafalan Asatidz
    </a>
</li>
<li id="laporan">
    <a>
        <i class="fa fa-bar-chart"></i> Rekap Absensi
        <span class="fa fa-chevron-down"></span>
    </a>
    <ul class="nav child_menu">
        <li class="{{ Request::segment(3) == 'laporan/absensi/santri' ? 'active' : '' }}">
            <a href="{{ url('/app/sistem/laporan/absensi/santri/') }}">
                Santri
            </a>
        </li>
        <li class="{{ Request::segment(3) == 'laporan/absensi/asatidz' ? 'active' : '' }}">
            <a href="{{ url('/app/sistem/laporan/absensi/asatidz') }}">
                Asatidz
            </a>
        </li>
    </ul>
</li>
<li class="{{ Request::segment(3) == 'pengaturan' ? 'active' : '' }}">
    <a href="{{ url('/app/sistem/pengaturan') }}">
        <i class="fa fa-gears"></i> Pengaturan
    </a>
</li>
