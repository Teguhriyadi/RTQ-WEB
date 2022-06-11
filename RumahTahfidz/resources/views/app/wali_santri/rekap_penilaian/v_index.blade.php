@php
use Illuminate\Support\Str;
@endphp
@extends('app.layouts.template')

@section('app_title', 'Rekap Penilaian ' . $penilaian->kategori_penilaian)

@section('app_content')


    <h3>
        @yield('app_title')
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('app/sistem/home') }}">Home</a></li>
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
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Jenjang</th>
                                            <th class="text-center">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($santri as $s)
                                            <tr>
                                                <th class="text-center">{{ $loop->iteration }}</th>
                                                <td>{{ $s->nis }}</td>
                                                <td>{{ $s->nama_lengkap }}</td>
                                                <td>{{ $s->getJenjang->jenjang }}</td>
                                                <td class="text-center">
                                                    <a href="{{ url('app/sistem/rekap_penilaian/' . $penilaian->slug . '/' . $s->id) }}"
                                                        class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                                </td>
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
