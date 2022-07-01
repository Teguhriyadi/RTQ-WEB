<li>
    <a>
        <i class="fa fa-database"></i> Data Master
        <span class="fa fa-chevron-down"></span>
    </a>
    <ul class="nav child_menu">
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
        <li class="{{ Request::segment(3) == 'jenjang_santri' ? 'active' : '' }}">
            <a href="{{ url('/app/sistem/jenjang_santri') }}">
                Jenjang Santri
            </a>
        </li>
        <li class="{{ Request::segment(3) == 'asatidz' ? 'active' : '' }}">
            <a href="{{ url('/app/sistem/asatidz') }}">
                Asatidz
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
                Lokasi RT
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
                <li class="{{ Request::segment(3) == 'kategori_pelajaran' }}">
                    <a href="{{ url('/app/sistem/setting/kategori/pelajaran') }}">
                        Kategori Pelajaran
                    </a>
                </li>
                <li class="{{ Request::segment(3) == 'pelajaran' }}">
                    <a href="{{ url('/app/sistem/pelajaran') }}">
                        Pelajaran
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
<li>
    <a>
        <i class="fa fa-tasks"></i> Tes Santri
        <span class="fa fa-chevron-down"></span>
    </a>
    <ul class="nav child_menu">
        <li>
            <a href="{{ url('/app/sistem/tes/input') }}">Pemilihan Jenjang</a>
        </li>
        <li>
            <a href="{{ url('/app/sistem/tes/data') }}">Konfirmasi Penerimaan</a>
        </li>
    </ul>
</li>
<li>
    <a>
        <i class="fa fa-money"></i> Keuangan
        <span class="fa fa-chevron-down"></span>
    </a>
    <ul class="nav child_menu">
        <li>
            <a>
                Biaya Iuran
                <span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu">
                <li>
                    <a href="{{ url('/app/sistem/validasi/iuran/belum_lunas') }}">
                        Iuran Belum Lunas
                    </a>
                </li>
                <li>
                    <a href="{{ url('/app/sistem/validasi/iuran/lunas') }}">
                        Iuran Lunas
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a>
                Biaya Administrasi
                <span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu">
                <li>
                    <a href="{{ url('/app/sistem/administrasi/belum_lunas') }}">
                        Belum Lunas
                    </a>
                </li>
                <li>
                    <a href="{{ url('/app/sistem/administrasi/lunas') }}">
                        Lunas
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</li>
