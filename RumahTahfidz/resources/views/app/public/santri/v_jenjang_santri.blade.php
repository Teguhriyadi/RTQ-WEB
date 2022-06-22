@php
use App\Models\Nilai;
use App\Models\Absensi;
@endphp
@extends('.app.layouts.template')

@section('app_title', 'Jenjang Santri')

@section('app_content')

    <style>
        th.dt-center,
        td.dt-center {
            text-align: center;
        }
    </style>

    <section class="section">
        <h3>
            @yield('app_title')
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('app/sistem/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">@yield('app_title')</li>
            </ol>
        </nav>
    </section>

    <div class="clearfix"></div>

    @if ($data_jenjang->count() < 1)
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 m-0">
                <div class="x_content bs-example-popovers">
                    <div class="alert alert-danger alert-dismissible " role="alert">
                        <strong>Oops!</strong> Data Jenjang Masih Kosong.
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            <i class="fa fa-bars"></i> Jenjang
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12">
                                <form id="main" name="main" method="POST" class="form-horizontal">
                                    @method('PUT')
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="jenjang"> Jenjang </label>
                                        <select name="jenjang" class="form-control" id="jenjang"
                                            onchange="formAction('main')">
                                            <option value="">- Pilih -</option>
                                            @foreach ($data_jenjang as $data)
                                                @if (empty($edit))
                                                    <option value="{{ $data->id }}">
                                                        {{ $data->jenjang }}
                                                    </option>
                                                @else
                                                    <option value="{{ $data->id }}"
                                                        {{ $edit->id == $data->id ? 'selected' : '' }}>
                                                        {{ $data->jenjang }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            <i class="fa fa-users"></i> Data @yield('app_title')
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box table-responsive">
                                    <table id="table-1" class="table table-bordered table-striped" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th>Santri</th>
                                                <th class="text-center">Absensi</th>
                                                <th class="text-center">Tadribat</th>
                                                <th class="text-center">Hafalan</th>
                                                <th class="text-center">Kriteria</th>
                                                <th class="text-center">Jenjang</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 0;
                                            @endphp
                                            @foreach ($data_santri as $data)
                                                <tr>
                                                    <td class="text-center">{{ ++$no }}.</td>
                                                    <td>{{ $data->nama_lengkap }}</td>
                                                    <td class="text-center">
                                                        @php
                                                            $data_absensi = Absensi::where('id_santri', $data->id)
                                                                ->where('id_status_absen', 1)
                                                                ->count();

                                                            if ($data_absensi == 0) {
                                                                echo '0';
                                                            } else {
                                                                $hasil_absensi = ((270 / $data_absensi) * 40) / 100;
                                                                echo $hasil_absensi;
                                                            }
                                                        @endphp
                                                    </td>
                                                    <td class="text-center">
                                                        @php
                                                            $data_nilai = 0;
                                                            $jum_pelajaran = 0;

                                                            foreach ($data_kategori_satu as $d) {
                                                                $data_nilai += Nilai::where('id_santri', $data->id)
                                                                    ->where('id_kategori_pelajaran', $d->id)
                                                                    ->sum('nilai');

                                                                $jum_pelajaran += Nilai::where('id_santri', $data->id)
                                                                    ->where('id_kategori_pelajaran', $d->id)
                                                                    ->count();
                                                            }

                                                            if ($data_nilai == 0 && $jum_pelajaran == 0) {
                                                                echo '0';
                                                            } else {
                                                                $hasil_tadribat = (($data_nilai / $jum_pelajaran) * 30) / 100;

                                                                echo $hasil_tadribat;
                                                            }

                                                        @endphp
                                                    </td>
                                                    <td class="text-center">
                                                        @php
                                                            $data_nilai = 0;
                                                            $jum_pelajaran = 0;
                                                            foreach ($data_kategori_dua as $d) {
                                                                $data_nilai += Nilai::where('id_santri', $data->id)
                                                                    ->where('id_kategori_pelajaran', $d->id)
                                                                    ->sum('nilai');

                                                                $jum_pelajaran += Nilai::where('id_santri', $data->id)
                                                                    ->where('id_kategori_pelajaran', $d->id)
                                                                    ->count();
                                                            }

                                                            if ($data_nilai == 0 && $jum_pelajaran == 0) {
                                                                echo '0';
                                                            } else {
                                                                $hasil_hafalan = (($data_nilai / $jum_pelajaran) * 30) / 100;
                                                                echo $hasil_hafalan;
                                                            }
                                                        @endphp
                                                    </td>
                                                    <td class="text-center">
                                                        @php
                                                            $data_absensi = Absensi::where('id_santri', $data->id)
                                                                ->where('id_status_absen', 1)
                                                                ->count();

                                                            if ($data_absensi == 0) {
                                                                $hasil_absensi = 0;
                                                            } else {
                                                                $hasil_absensi = ((270 / $data_absensi) * 40) / 100;
                                                                $hasil_absensi;
                                                            }

                                                            $data_nilai = 0;
                                                            $jum_pelajaran = 0;

                                                            foreach ($data_kategori_satu as $d) {
                                                                $data_nilai += Nilai::where('id_santri', $data->id)
                                                                    ->where('id_kategori_pelajaran', $d->id)
                                                                    ->sum('nilai');

                                                                $jum_pelajaran += Nilai::where('id_santri', $data->id)
                                                                    ->where('id_kategori_pelajaran', $d->id)
                                                                    ->count();
                                                            }

                                                            if ($data_nilai == 0 && $jum_pelajaran == 0) {
                                                                $hasil_tadribat = 0;
                                                            } else {
                                                                $hasil_tadribat = (($data_nilai / $jum_pelajaran) * 30) / 100;

                                                                $hasil_tadribat;
                                                            }

                                                            $data_nilai = 0;
                                                            $jum_pelajaran = 0;
                                                            foreach ($data_kategori_dua as $d) {
                                                                $data_nilai += Nilai::where('id_santri', $data->id)
                                                                    ->where('id_kategori_pelajaran', $d->id)
                                                                    ->sum('nilai');

                                                                $jum_pelajaran += Nilai::where('id_santri', $data->id)
                                                                    ->where('id_kategori_pelajaran', $d->id)
                                                                    ->count();
                                                            }

                                                            if ($data_nilai == 0 && $jum_pelajaran == 0) {
                                                                $hasil_hafalan = 0;
                                                            } else {
                                                                $hasil_hafalan = (($data_nilai / $jum_pelajaran) * 30) / 100;
                                                                $hasil_hafalan;
                                                            }

                                                            $total = 0;
                                                            $total = $hasil_absensi + $hasil_tadribat + $hasil_hafalan;
                                                        @endphp
                                                        @if ($total == 0)
                                                            <span class="badge badge-danger p-2" style="font-size: 14px;">
                                                                <i class="fa fa-check"></i> Belum Ada Data
                                                            </span>
                                                        @elseif($total <= 100 && $total >= 75)
                                                            <span class="badge badge-success p-2" style="font-size: 14px;">
                                                                <i class="fa fa-check"></i> Lulus
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center"></td>
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
    @endif

@endsection

@section('app_scripts')

    <script type="text/javascript">
        function formAction(idForm, action, target = '') {
            if (target != '') {
                $('#' + idForm).attr('target', target);
            }
            $('#' + idForm).attr('action', action);
            console.log();
            $('#' + idForm).submit();
        }

        $(document).ready(function() {
            $("#table-1").dataTable();
        })
    </script>

@endsection
