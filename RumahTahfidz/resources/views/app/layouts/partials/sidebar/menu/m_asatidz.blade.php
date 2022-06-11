<li>
    <a>
        <i class="fa fa-edit"></i> Penilaian
        <span class="fa fa-chevron-down"></span>
    </a>
    <ul class="nav child_menu" {!! Request::segment(3) == 'penilaian' ? 'style="display: block;"' : 'style="display: none";' !!}>
        @foreach ($kategori_penilaian as $item)
            <li>
                <a href="{{ url('/app/sistem/penilaian/' . $item->slug) }}">{{ $item->kategori_penilaian }}</a>
            </li>
        @endforeach
    </ul>
</li>
<li class="{{ Request::segment(3) == 'rekap' ? 'active' : '' }}">
    <a href="{{ url('/app/sistem/rekap/absensi/asatidz/' . auth()->user()->id) }}">
        <i class="fa fa-book"></i>Absensi Saya
    </a>
</li>
