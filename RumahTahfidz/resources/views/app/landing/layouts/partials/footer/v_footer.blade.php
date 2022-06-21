<footer id="footer" class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <img src="{{ url('/gambar') }}/logo_ulil.png" alt="">
                        <span>
                            {{ empty($data->singkatan) ? '' : $data->singkatan }}
                        </span>
                    </a>
                    <p style="text-align: justify">
                        @if (empty($data->deskripsi))
                            Lahir dari idealisme untuk menanamkan nilai-nilai Al-Quran, Rumah Tahfidz Ulil Quran Albab
                            menawarkan konsep pendidikan Al-Quran yang bukan hanya menekankan pada kecapakan membaca dan
                            menghafalkan Al-Quran, namun berupaya menanamkan iman dan adab yang mulai terkikis dengan
                            perkembangan teknologi.
                        @else
                            {{ $data->deskripsi }}
                        @endif
                    </p>
                    <div class="social-links mt-3">
                        <a target="_blank" href="{{ 'https://www.facebook.com/RumahTahfidzUlilAlbab/' }}"
                            class="facebook"><i class="bi bi-facebook"></i></a>
                        <a target="_blank" href="{{ 'https://instagram.com/rtqulilalbab?igshid=YmMyMTA2M2Y=' }}"
                            class="instagram"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Tautan</h4>
                    <ul>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="#">Tentang Ulil Albab</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="#">Blog</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="#">Kontak</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="#">Download Aplikasi</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="#">Login</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12 footer-contact text-center text-md-start">
                    <h4>Kontak Kami</h4>
                    <p>
                        {{ empty($data->alamat) ? 'Indramayu, West Java, Indonesia 45212' : $data->alamat }}
                        <br>
                        <strong>Phone:</strong> {{ empty($data->no_hp) ? '0821 - 2850 - 4559' : $data->no_hp }} <br>
                        <strong>Email:</strong>
                        {{ empty($data->email) ? 'rumahtahfidzulilalbab@gmail.com' : $data->email }} <br>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Anonymus</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">
                Team RTQ
            </a>
        </div>
    </div>
</footer>
