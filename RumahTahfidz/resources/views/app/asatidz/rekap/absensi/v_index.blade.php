@php
use Carbon\Carbon;
@endphp
@extends('app.layouts.template')

@section('app_title', 'Rekap Absensi Saya')

@section('app_content')

    <div class="">
        <div class="panel-title">
            <div class="title_left">
                <h3>
                    @yield('app_title')
                </h3>
            </div>
        </div>
    </div>

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
                    <h2>
                        <i class="fa fa-book"></i> @yield('app_title')
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Tanggal Absensi</th>
                                            <th class="text-center">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($asatidz as $a)
                                            <tr>
                                                <th class="text-center">{{ $loop->iteration }}</th>
                                                <td class="text-center">{{ $a->getAsatidz->getUser->nama }}</td>
                                                <td class="text-center">{{ $a->alamat }}</td>
                                                <td class="text-center">
                                                    {{ Carbon::createFromFormat('Y-m-d H:i:s', $a->created_at)->isoFormat('dddd, D MMMM Y') }}
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#exampleModal" data-alamat="{{ $a->alamat }}"
                                                        data-gambar="{{ $a->gambar }}" id="view-image"><i
                                                            class="fa fa-eye"></i> Lihat Foto</button>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="img-show" src="">
                    <div id="alamat-show"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("body").on('click', '#view-image', function() {
                let alamat = $(this).data('alamat');
                let gambar = $(this).data('gambar');

                $("#img-show").attr('src', gambar);
                $("#alamat-show").html(alamat);
            })
        })
    </script>
@endsection
