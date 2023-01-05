@php
    use Carbon\Carbon;
@endphp

@extends('.app.layouts.template')

@section('app_title', 'Asatidz')

@section('app_content')

<section class="section">
    <h3>
        @yield('app_title')
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('app/sistem/home') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('/app/sistem/asatidz') }}">@yield('app_title')</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Detail @yield('app_title')</li>
        </ol>
    </nav>
</section>

<div class="clearfix"></div>

<div class="row">
    {{ csrf_field() }}
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <center>
                    @if (empty($detail->getUser->gambar))
                    <img src="{{ url('/gambar/gambar_user.png') }}" class="img-fluid mb-3">
                    @else
                    <img src="{{ $detail->getUser->gambar }}" class="img-fluid mb-3">
                    @endif
                </center>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    <i class="fa fa-search"></i> Detail Data
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped" style="width: 100%">
                    <tr>
                        <td class="text-right">Nomor Induk</td>
                        <td>:</td>
                        <td>
                            {{ $detail->nomor_induk }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Nama</td>
                        <td>:</td>
                        <td>
                            {{ $detail->getUser->nama }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Email</td>
                        <td>:</td>
                        <td>
                            @if (empty($detail->getUser->email))
                            <strong>
                                <i>
                                    Belum Mengisi Email
                                </i>
                            </strong>
                            @else
                            {{ $detail->getUser->email }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Pendidikan Terakhir</td>
                        <td>:</td>
                        <td>
                            @if (empty($detail->pendidikan_terakhir))
                            <strong>
                                <i>
                                    Belum Mengisi Data Pendidikan Terakhir
                                </i>
                            </strong>
                            @else
                            {{ $detail->pendidikan_terakhir }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Aktivitas Utama</td>
                        <td>:</td>
                        <td>
                            @if (empty($detail->aktivitas_utama))
                            <strong>
                                <i>
                                    Belum Mengisi Data Aktivitas Utama
                                </i>
                            </strong>
                            @else
                            {{ $detail->aktivitas_utama }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Motivasi Mengajar</td>
                        <td>:</td>
                        <td>
                            @if (empty($detail->motivasi_mengajar))
                            <strong>
                                <i>
                                    Belum Mengisi Data Motivasi Mengajar
                                </i>
                            </strong>
                            @else
                            {{ $detail->motivasi_mengajar }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Jenis Kelamin</td>
                        <td>:</td>
                        <td>
                            @if ($detail->getUser->jenis_kelamin == "L")
                            Laki - Laki
                            @else
                            Perempuan
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Tempat Lahir</td>
                        <td>:</td>
                        <td>
                            {{ $detail->getUser->tempat_lahir }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Tanggal Lahir</td>
                        <td>:</td>
                        <td>
                            {{ Carbon::createFromFormat("Y-m-d", $detail->getUser->tanggal_lahir)->isoFormat('D MMMM Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Nomor HP</td>
                        <td>:</td>
                        <td>
                            {{ $detail->getUser->no_hp }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Alamat</td>
                        <td>:</td>
                        <td>
                            {{ $detail->getUser->alamat }}
                        </td>
                    </tr>
                </table>
                <a href="{{ url('/app/sistem/asatidz') }}" class="btn btn-warning btn-sm">
                    <i class="fa fa-sign-out"></i> Kembali ke Halaman Sebelumnya
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
