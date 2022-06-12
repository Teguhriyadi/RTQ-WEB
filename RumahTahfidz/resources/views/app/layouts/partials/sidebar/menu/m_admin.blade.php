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
<li>
    <a>
        <i class="fa fa-money"></i> Biaya Iuran
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
        <i class="fa fa-bars"></i> Biaya Administrasi
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
