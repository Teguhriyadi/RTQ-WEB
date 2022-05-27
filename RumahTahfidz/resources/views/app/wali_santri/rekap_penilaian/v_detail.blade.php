@php
use Illuminate\Support\Str;
@endphp
@extends('app.layouts.template')

@section('app_title', $santri->nama_lengkap)

@section('app_content')


    <h3>
        Rekap
        Penilaian @yield('app_title')
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('app/sistem/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('app/sistem/rekap_penilaian/' . $penilaian->slug) }}">Rekap
                    Penilaian {{ $penilaian->kategori_penilaian }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">@yield('app_title')</li>
        </ol>
    </nav>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <ul class="nav nav-tabs">
                                @foreach ($jenjang as $j)
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ Request::url() }}/{{ $j->id }}">{{ $j->jenjang }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Pelajaran</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_pelajaran as $pelajaran)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $pelajaran->getPelajaran->nama_pelajaran }}</td>
                                                <td>{{ $pelajaran->getNilai->nilai }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('app_scripts')

    <script>
        $(document).ready(function() {
            $('.table').on('show.bs.dropdown', function(e) {
                var table = $(this),
                    menu = $(e.target).find('.dropdown-menu'),
                    tableOffsetHeight = table.offset().top + table.height(),
                    menuOffsetHeight = $(e.target).offset().top + $(e.target).outerHeight(true) + menu
                    .outerHeight(true);

                console.log(menuOffsetHeight, tableOffsetHeight);

                if (menuOffsetHeight > tableOffsetHeight) {
                    table.css("margin-bottom", menuOffsetHeight - tableOffsetHeight);
                    $('.table')[0].scrollIntoView(false);
                }

            });

            $('.table').on('hide.bs.dropdown', function() {
                $(this).css("margin-bottom", 0);
            })
        });
    </script>

@endsection
