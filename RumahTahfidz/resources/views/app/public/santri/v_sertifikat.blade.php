@extends('.app.layouts.template')

@section('app_title', 'Sertifikat Santri ')

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
                    <a href="{{ url('app/sistem/santri') }}">Santri</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">@yield('app_title')</li>
            </ol>
        </nav>
    </section>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-search"></i> Detail Tentang <b>{{ $detail->nama_lengkap }}</b>
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tr>
                                    <td class="text-right">NIS</td>
                                    <td class="text-center">:</td>
                                    <td>
                                        {{ $detail->nis }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Nama Lengkap</td>
                                    <td class="text-center">:</td>
                                    <td>
                                        {{ $detail->nama_lengkap }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Nama Panggilan</td>
                                    <td class="text-center">:</td>
                                    <td>
                                        {{ $detail->nama_panggilan }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Lokasi Cabang</td>
                                    <td class="text-center">:</td>
                                    <td>
                                        {{ $detail->getHalaqah->getLokasiRt->lokasi_rt }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Halaqah</td>
                                    <td class="text-center">:</td>
                                    <td>
                                        {{ $detail->getHalaqah->nama_halaqah }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Jenjang Sekarang</td>
                                    <td class="text-center">:</td>
                                    <td>
                                        {{ $detail->getJenjang->jenjang }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Rekam Jenjang</td>
                                    <td class="text-center">:</td>
                                    <td>
                                        <ol>
                                            @forelse ($data_nilai as $data)
                                                <li>{{ $data->getJenjang->jenjang }}</li>
                                            @empty
                                                <i>
                                                    <b>
                                                        Kosong
                                                    </b>
                                                </i>
                                            @endforelse
                                        </ol>
                                    </td>
                                </tr>
                            </table>
                            <a target="_blank" href="{{ url('/app/sistem/santri') }}"
                                class="btn btn-warning btn-block btn-sm">
                                <i class="fa fa-sign-out"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-download"></i> @yield('app_title')
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Jenjang</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 0;
                                    @endphp
                                    @forelse ($data_nilai as $data)
                                        <tr>
                                            <td>{{ ++$no }}.</td>
                                            <td>{{ $data->getJenjang->jenjang }}</td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-download"></i> Download Sertifikat
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                <i>
                                                    <b>
                                                        Belum Ada Rekam Jenjang
                                                    </b>
                                                </i>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
