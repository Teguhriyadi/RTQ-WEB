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
                    <h2>@yield('app_title')</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab"
                                    data-toggle="tab" aria-expanded="true">Home</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab"
                                    id="profile-tab" data-toggle="tab" aria-expanded="false">Profile</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content3" role="tab"
                                    id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1"
                                aria-labelledby="home-tab">
                                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                    aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan
                                    helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
                                    synth. Cosby sweater eu banh mi, qui irure terr.</p>
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
