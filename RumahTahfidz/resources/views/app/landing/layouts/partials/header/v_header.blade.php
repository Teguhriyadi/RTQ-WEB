<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">

            <img src="{{ empty($data->logo) ? url('/gambar/logo_ulil.png') : url('/storage/' . $data->logo) }}" alt="">
            <span>{{ empty($data->singkatan) ? 'RTQ' : $data->singkatan }}</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
                <li><a class="nav-link scrollto" href="#services">Program</a></li>
                <li><a class="nav-link scrollto" href="#portfolio">Dokumentasi</a></li>
                <li><a class="nav-link scrollto" href="#team">Struktur</a></li>
                <li><a href="{{ url('/blog') }}">Blog</a></li>
                <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                <li class="dropdown">
                    <a href="#">
                        <span>Login</span>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul>
                        <li><a href="{{ url('/app/login') }}">Asatidz</a></li>
                        <li><a href="{{ url('/app/login') }}">Admin</a></li>
                    </ul>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
