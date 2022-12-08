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
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLScRclacuowu2SAiSInfVdwN5XNt81l5M9cRNHNb6D3YJ0D2Gg/viewform">
                        Form Keluhan
                    </a>
                </li>
                <li>
                    <a
                        href="https://rtqulilalbab.com/android/rtq-v1.1.apk">
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
