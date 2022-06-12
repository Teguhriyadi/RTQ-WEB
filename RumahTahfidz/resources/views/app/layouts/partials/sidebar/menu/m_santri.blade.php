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
