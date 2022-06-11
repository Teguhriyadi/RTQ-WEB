@php
use Carbon\Carbon;
use Illuminate\Support\Str;
@endphp
@extends('app.layouts.template')

@section('app_title', 'Detail Rekap Iuran')

@section('app_content')


    <h3>
        @yield('app_title')
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('app/sistem/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('app/sistem/rekap_iuran') }}">Rekap Iuran Santri</a></li>
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
                            <div class="card-box table-responsive">
                                <table class="table table-hover table-bordered" style="width: 100%" id="rekap-iuran">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Jumlah Uang</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th class="text-center">Status Validasi</th>
                                        </tr>
                                    </thead>
                                    <tbody> </tbody>
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
            $('#rekap-iuran').dataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('app/sistem/rekap_iuran/datatables/' . Request::segment(4)) }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nis',
                        name: 'nis'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'nominal',
                        name: 'nominal'
                    },
                    {
                        data: 'tgl_bayar',
                        name: 'tgl_bayar'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: true,
                        searchable: true
                    },
                ]
            })
        })
    </script>

@endsection
