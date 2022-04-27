@php
    use Carbon\Carbon;
@endphp
@extends(".app.layouts.template")

@section("app_title", "Detail Santri " . $santri->nama_lengkap)

@section("app_content")

<section class="section">
    <h3>
        @yield("app_title")
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('app/sistem/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('app/sistem/profil_santri') }}">Profil Santri</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('app_title')</li>
        </ol>
    </nav>

    <div class="section-body">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5 mb-3">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <center class="m-3">
                            <img src="{{ url('gambar/gambar_user.png') }}" class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-description">
                                <div class="profile-widget-name mt-3">
                                    <h5>{{ $santri->nama_lengkap }}</h5>
                                    <div class="text-muted d-inline font-weight-normal">
                                        <div class="slash"></div> Santri
                                    </div>
                                </div>
                                <div class="m-3">
                                    <a href="{{ url('app/sistem/profil_santri/' . $santri->id . '/edit') }}" class="btn btn-primary btn-block">
                                        <i class="fa fa-edit"></i> Edit Profil
                                    </a>
                                    <a href="{{ url('app/sistem/profil_santri/') }}" class="btn btn-warning btn-block d-inline d-sm-none">
                                        <i class="fa fa-arrow-left"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </center>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Detail Profil</h5>

                            <a href="{{ url('app/sistem/profil_santri') }}" class="btn btn-warning d-sm-inline d-none">Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <tr>
                                <td>NIS</td>
                                <td>:</td>
                                <td>{{ $santri->nis }}</td>
                            </tr>
                            <tr>
                                <td>Nama Panggilan</td>
                                <td>:</td>
                                <td>{{ $santri->nama_panggilan }}</td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>:</td>
                                <td>{{ $santri->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir</td>
                                <td>:</td>
                                <td>{{ $santri->tempat_lahir }}, {{ Carbon::createFromFormat('Y-m-d', $santri->tanggal_lahir)->isoFormat('D MMMM Y') }}</td>
                            </tr>
                            <tr>
                                <td>Asal Sekolah</td>
                                <td>:</td>
                                <td>{{ $santri->sekolah }}</td>
                            </tr>
                            <tr>
                                <td>Jenjang</td>
                                <td>:</td>
                                <td>{{ $santri->getJenjang->jenjang }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td>{{ $santri->status == 1 ? 'Belum Lulus' : 'Lulus' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
