@extends('app.landing.layouts.template')

@section('app_content')
    @php
    use Carbon\Carbon;
    @endphp

    <main id="main">
        <section class="breadcrumbs">
            <div class="container">
                <ol>
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li>Blog</li>
                </ol>
            </div>
        </section>

        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row">

                    @forelse ($data_blog as $data)
                        <div class="col-lg-8 entries">
                            <article class="entry entry-single">
                                <div class="entry-img">
                                    <img src="{{ url('storage/' . $data->foto) }}" alt="" class="img-fluid">
                                </div>

                                <h2 class="entry-title">
                                    <a href="blog-single.html">
                                        {{ $data->judul }}
                                    </a>
                                </h2>

                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center">
                                            <i class="bi bi-person"></i>
                                            <a>
                                                {{ $data->getUser->nama }}
                                            </a>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <i class="bi bi-clock"></i>
                                            <a href="blog-single.html">
                                                {{ Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->isoFormat('dddd, D MMMM') }}
                                            </a>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <i class="bi bi-tags"></i>
                                            <a href="blog-single.html">
                                                {{ $data->getKategori->kategori }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="entry-content">
                                    <p>
                                        {!! $data->deskripsi !!}
                                    </p>

                                    <p>
                                        Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in
                                        accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate
                                        cupiditate.
                                    </p>
                                </div>

                            </article>
                        </div>
                    @empty
                        <div class="col-lg-8 entries">
                            <article class="entry entry-single">
                                <div class="entry-img">
                                    <img src="https://p4m.rtq-freelance.my.id/frontend/img/no-images.png" alt=""
                                        class="img-fluid">
                                </div>

                                <div class="entry-content">

                                    <p>
                                    <div class="alert alert-danger">

                                    </div>
                                    </p>
                                </div>

                            </article>
                        </div>
                    @endforelse

                    <div class="col-lg-4">

                        <div class="sidebar">

                            <h3 class="sidebar-title">Cari</h3>
                            <div class="sidebar-item search-form">
                                <form action="">
                                    <input type="text">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div>

                            <h3 class="sidebar-title">Kategori</h3>
                            <div class="sidebar-item categories">
                                <ul>
                                    @forelse ($data_kategori as $data)
                                        <li>
                                            <a href="#"> {{ $data->kategori }}
                                                <span>(25)</span>
                                            </a>
                                        </li>
                                    @empty
                                        <div class="alert alert-danger">
                                            Tidak Ada Kategori
                                        </div>
                                    @endforelse
                                </ul>
                            </div>

                            <h3 class="sidebar-title">Post Terbaru</h3>
                            <div class="sidebar-item recent-posts">
                                @forelse ($data_blog as $data)
                                    <div class="post-item clearfix">
                                        <img src="assets/img/blog/blog-recent-1.jpg" alt="">
                                        <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                                        <time datetime="2020-01-01">Jan 1, 2020</time>
                                    </div>
                                @empty
                                    <div class="post-item clearfix">
                                        <div class="alert alert-danger">
                                            Tidak Ada Post
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>
@endsection
