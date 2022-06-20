@php
use Illuminate\Support\Str;
@endphp
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
                    <div class="col-lg-8">
                        @if (!empty($kategori))
                            <div class="breadcrumbs mb-4 text-center" style="margin-top: 0">
                                <h4 class="text-uppercase" style="margin-block: 0">
                                    {{ $kategori->kategori }}
                                </h4>
                            </div>
                        @endif

                        @forelse ($data_blog as $data)
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card" style="width: 18rem;">
                                        <img src="{{ url('storage/' . $data->foto) }}" class="card-img-top py-2 px-5"
                                            alt="{{ $data->judul }}">
                                        <div class="card-body">
                                            <h5 class="card-title text-uppercase"><b>{{ $data->judul }}</b></h5>
                                            <div class="entry-meta">
                                                <ul>
                                                    <li class="d-flex align-items-center">
                                                        <i class="bi bi-person"></i> &nbsp;
                                                        <a>
                                                            {{ $data->getUser->nama }}
                                                        </a>
                                                    </li>
                                                    <li class="d-flex align-items-center">
                                                        <i class="bi bi-clock"></i> &nbsp;
                                                        <a>
                                                            {{ Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->isoFormat('dddd, D MMMM Y') }}
                                                        </a>
                                                    </li>
                                                    <li class="d-flex align-items-center">
                                                        <i class="bi bi-tags"></i> &nbsp;
                                                        <a>
                                                            {{ $data->getKategori->kategori }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <a href="{{ url('/' . $data->slug) }}" class="btn btn-primary">Selanjutnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
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
                        @endforelse
                    </div>

                    <div class="col-lg-4">

                        @include('app.landing.layouts.widgets.w_pencarian')
                    </div>
                </div>

            </div>
        </section>

    </main>
@endsection
