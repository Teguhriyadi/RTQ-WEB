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
                    <li><a href="{{ url('/blog') }}">Blog</a></li>
                    <li class="text-capitalize">{{ $blog->judul }}</li>
                </ol>
            </div>
        </section>

        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row">

                    <div class="col-lg-8 entries">
                        <article class="entry entry-single">
                            <div class="entry-img text-center">
                                <img src="{{ url('storage/' . $blog->foto) }}" alt="{{ $blog->judul }}"
                                    class="img-fluid pt-3">
                            </div>

                            <h2 class="entry-title text-capitalize">
                                <a href="{{ url('/' . $blog->slug) }}">
                                    {{ $blog->judul }}
                                </a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-person"></i>
                                        <a>
                                            {{ $blog->getUser->nama }}
                                        </a>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-clock"></i>
                                        <a>
                                            {{ Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->isoFormat('dddd, D MMMM Y') }}
                                        </a>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-tags"></i>
                                        <a>
                                            {{ $blog->getKategori->kategori }}
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    {!! $blog->deskripsi !!}
                                </p>
                            </div>

                        </article>
                    </div>

                    <div class="col-lg-4">

                        @include('app.landing.layouts.widgets.w_pencarian')
                    </div>
                </div>

            </div>
        </section>

    </main>
@endsection
