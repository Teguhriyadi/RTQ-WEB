@php
use Illuminate\Support\Str;
@endphp
@extends("app.layouts.template")

@section('app_title', 'Detail Rekap Iuran')

@section('app_content')


    <h3>
        @yield("app_title")
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
                                <table class="table table-hover table-bordered" style="width: 100%">
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
                                    <tbody>
                                        @foreach ($santri as $s)
                                            <tr>
                                                <th class="text-center">{{ $loop->iteration }}</th>
                                                <td>{{ $s->getSantri->nis }}</td>
                                                <td>{{ $s->getSantri->nama_lengkap }}</td>
                                                <td>{{ 'Rp. 20.000' }}</td>
                                                <td>{{ date('d F Y', strtotime($s->tanggal)) }}</td>
                                                <th class="text-center">
                                                    <div class="badge badge-success"><i class="fa fa-check"></i> Diterima
                                                    </div>
                                                </th>
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

    <script></script>

@endsection
