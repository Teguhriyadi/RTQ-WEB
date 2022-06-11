@php
use Illuminate\Support\Str;
@endphp
@extends('app.layouts.template')

@section('app_title', 'Rekap Nilai Santri')

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
                    <h2>
                        @yield('app_title')
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="card-box table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">NIS</th>
                                        <th>Nama</th>
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">Jenjang</th>
                                        <th>Sekolah</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 0;
                                    @endphp
                                    @foreach ($data_santri as $data)
                                        <tr>
                                            <td class="text-center">{{ ++$no }}.</td>
                                            <td class="text-center">{{ $data->nis }}</td>
                                            <td>{{ $data->nama_lengkap }}</td>
                                            <td class="text-center">{{ $data->getKelas->nama_kelas }}</td>
                                            <td class="text-center">{{ $data->getJenjang->jenjang }}</td>
                                            <td>{{ $data->sekolah }}</td>
                                            <td class="text-center">
                                                <a href="{{ url('/app/sistem/rekap_nilai/' . $data->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fa fa-eye"></i> Detail Nilai
                                                </a>
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

@endsection
