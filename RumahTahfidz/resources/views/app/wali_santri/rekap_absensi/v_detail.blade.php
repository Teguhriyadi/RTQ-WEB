@php
use Illuminate\Support\Str;
use Carbon\Carbon;
@endphp
@extends("app.layouts.template")

@section("app_title", "Detail Absensi")

@section("app_content")


<h3>
    @yield("app_title")
</h3>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('app/sistem/home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('app/sistem/rekap_absensi') }}">Rekap Absensi</a></li>
        <li class="breadcrumb-item active" aria-current="page">@yield('app_title')</li>
    </ol>
</nav>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="{{ url('gambar/gambar_user.png') }}" alt="" height="100">
                        <h3><strong>{{ $santri->nama_panggilan }}</strong></h3>
                    </div>
                    <div class="col-sm-6">
                        <table class="mt-4">
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
                                <td>Wali Santri</td>
                                <td>:</td>
                                <td>{{ $santri->getWali->getUser->nama }}</td>
                            </tr>
                            <tr>
                                <td>Jenjang</td>
                                <td>:</td>
                                <td>{{ $santri->getJenjang->jenjang }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="perhari-tab" data-toggle="tab" href="#perhari" role="tab" aria-controls="perhari" aria-selected="true">Perhari</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="perbulan-tab" data-toggle="tab" href="#perbulan" role="tab" aria-controls="perbulan" aria-selected="false">Perbulan</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="card-box table-responsive tab-pane fade show active" id="perhari" role="tabpanel" aria-labelledby="perhari-tab">
                                <table class="table table-hover table-bordered" id="datatable" style="width: 100%">
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

                                    </tbody>
                                </table>
                            </div>
                            <div class="card-box table-responsive tab-pane fade" id="perbulan" role="tabpanel" aria-labelledby="perbulan-tab">
                                <table class="table table-hover table-bordered" id="datatable" style="width: 100%">
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

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section("app_scripts")

<script>

</script>

@endsection
