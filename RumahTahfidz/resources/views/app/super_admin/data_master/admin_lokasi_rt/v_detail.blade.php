@extends('.app.layouts.template')

@section('app_title', 'Admin Cabang')

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
                <a href="{{ url('/app/sistem/admin_cabang') }}">@yield('app_title')</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Detail @yield('app_title')</li>
        </ol>
    </nav>
</section>

<div class="clearfix"></div>

<form action="{{ url('/app/sistem/admin_cabang') }}" method="POST" enctype="multipart/form-data"
id="tambahAdminCabang">
<div class="row">
    {{ csrf_field() }}
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <center>
                    <img src="{{ $detail->getUser->gambar }}" class="gambar-preview img-fluid mb-3">
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
                        <td class="text-right">Rumah Tahfidz</td>
                        <td>:</td>
                        <td>
                            {{ $detail->getLokasiRt->lokasi_rt }}
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
                            @if ($detail->getUser->jenis_kelamin == "L")
                            Laki - Laki
                            @else
                            Perempuan
                            @endif
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
                <a href="{{ url('/app/sistem/admin_cabang') }}" class="btn btn-warning btn-sm">
                    <i class="fa fa-sign-out"></i> Kembali ke Halaman Sebelumnya
                </a>
            </div>
        </div>
    </div>
</div>
</form>

@endsection
