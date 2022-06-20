@extends('app.landing.layouts.template')

@section('app_content')
    @php
    use App\Models\TentangKami;
    @endphp

    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Selamat Datang di {{ empty($data->nama) ? 'RTQ Ulil Albab' : $data->nama }}
                    </h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">
                        Silahkan pilih menu yang tersedia untuk memulai program
                    </h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="#about"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Selengkapnya</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ url('/landing') }}/assets/img/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section>

    <main id="main">
        <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <div class="row gx-0">
                    @php
                        $profil = TentangKami::select('id', 'foto', 'deskripsi')->first();
                    @endphp
                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="content">
                            <h2>Profil Singkat {{ empty($data->nama) ? 'RTQ Ulil Albab' : $data->nama }}</h2>
                            <p style="text-align: justify">
                                {{ empty($profil->deskripsi) ? 'Lahir dari idealisme untuk menanamkan nilai-nilai Al-Quran, Rumah Tahfidz Ulil Quran Albab menawarkan konsep pendidikan Al-Quran yang bukan hanya menekankan pada kecapakan membaca dan menghafalkan Al-Quran, namun berupaya menanamkan iman dan adab yang mulai terkikis dengan perkembangan teknologi.' : $profil->deskripsi }}
                            </p>
                            <div class="text-center text-lg-start">
                                {{-- <a href="#"
                                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span>Selengkapnya</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ empty($profil) ? url('/gambar/logo_ulil.png') : url('/storage/' . $profil->foto) }}"
                            class="img-fluid" alt="">
                    </div>

                </div>
            </div>

        </section>

        <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-people"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $jumlah_santri }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Santri</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-people" style="color: #ee6c20;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $jumlah_asatidz }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Asatidz</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-headset" style="color: #15be56;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $jumlah_cabang }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Lokasi</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-book" style="color: #bb0852;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $jumlah_program }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Program</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Team</h2>
                    <p>Struktur Organisasi</p>
                </header>

                <div class="row gy-4">
                    @forelse ($data_organisasi as $data)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                            <div class="member">
                                <div class="member-img">
                                    <img src="{{ url('/storage/' . $data->foto) }}" class="img-fluid" alt=""
                                        width="100%" height="300px">
                                    <div class="social">
                                        <a href=""><i class="bi bi-twitter"></i></a>
                                        <a href=""><i class="bi bi-facebook"></i></a>
                                        <a href=""><i class="bi bi-instagram"></i></a>
                                        <a href=""><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <h4>{{ $data->nama }}</h4>
                                    <span>{{ $data->getJabatan->nama_jabatan }}</span>
                                    <p>{{ $data->deskripsi }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                            data-aos-delay="400">
                            <div class="member">
                                <div class="member-img">
                                    <img src="https://p4m.rtq-freelance.my.id/frontend/img/no-images.png"
                                        class="img-fluid" alt="" width="100%" height="300px">
                                    <div class="social">
                                        <a href=""><i class="bi bi-twitter"></i></a>
                                        <a href=""><i class="bi bi-facebook"></i></a>
                                        <a href=""><i class="bi bi-instagram"></i></a>
                                        <a href=""><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <h4>Data Kosong</h4>
                                    <span>Data Kosong</span>
                                    <p>Data Kosong</p>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Blog</h2>
                    <p>Postingan Terbaru</p>
                </header>

                <div class="row">
                    @php
                        use Carbon\Carbon;
                    @endphp
                    @forelse ($data_blog as $data)
                        <div class="col-lg-4">
                            <div class="post-box">
                                <div class="post-img">
                                    <img src="{{ url('storage/' . $data->foto) }}" class="img-fluid" alt="">
                                </div>
                                <span class="post-date">
                                    {!! Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->isoFormat('D MMMM Y') !!}
                                </span>
                                <h3 class="post-title">
                                    {{ $data->judul }}
                                </h3>
                                <a href="{{ url('/blog/') }}ore stretched-link mt-auto">
                                    <span>Selengkapnya</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                <strong>Maaf</strong>, Data Blog saat ini masih kosong
                            </div>
                        </div>
                    @endforelse
                </div>

            </div>

        </section>

        <section id="contact" class="contact">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Kontak</h2>
                    <p>Kontak Kami</p>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-6">

                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Alamat</h3>
                                    <p>
                                        {{ empty($data->alamat) ? 'Indramayu, West Java, Indonesia 45212' : $data->alamat }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-telephone"></i>
                                    <h3>No. Handphone</h3>
                                    <p>
                                        {{ empty($data->no_hp) ? '0821 - 2850 - 4559' : $data->no_hp }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email</h3>
                                    <p>
                                        {{ empty($data->email) ? 'rumahtahfidzulilalbab@gmail.com' : $data->email }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-clock"></i>
                                    <h3>Jam Buka</h3>
                                    <p>Senin - Jum'at<br>9:00AM - 05:00PM</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <form action="{{ url('/pesan') }}" method="POST" class="php-email-form">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <input type="text" name="nama" class="form-control"
                                        placeholder="Masukkan Nama" required>
                                </div>
                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Masukkan Email" required>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="judul"
                                        placeholder="Masukkan Judul" required>
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="pesan" rows="6" placeholder="Masukkan Pesan" required></textarea>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
