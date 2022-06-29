<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">

            <img src="{{ empty($data->logo) ? url('/gambar/logo_ulil.png') : url('/storage/' . $data->logo) }}"
                alt="">
            <span>{{ empty($data->singkatan) ? 'RTQ' : $data->singkatan }}</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="{{ url('') }}#hero">Home</a></li>
                <li class="dropdown">
                    <a href="#">
                        <span>Tentang Ulil Albab</span>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul>
                        <li><a class="nav-link scrollto" href="{{ url('') }}#about">Tentang Kami</a></li>
                        <li><a class="nav-link scrollto" href="{{ url('') }}#team">Struktur</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/blog') }}">Blog</a></li>
                <li><a class="nav-link scrollto" href="{{ url('') }}#contact">Kontak</a></li>
                <li>
                    <a
                        href="{{ url('https://drive.google.com/drive/u/0/folders/1M4Mpz_8IZLQoerYayQea_3QJg9dB--6Z') }}">
                        Download Aplikasi
                    </a>
                </li>
                <li>
                    <a href="{{ url('/app/login') }}">
                        Login
                    </a>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
