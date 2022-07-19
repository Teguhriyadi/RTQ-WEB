@php
use App\Models\Nilai;
use App\Models\Absensi;
use App\Models\Santri;
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
                        <strong>Oops!</strong> Data Jenjang Masih Kosong. Silahkan Klik
                        <a target="_blank" href="{{ url('/app/sistem/jenjang') }}" style="color: white;">
                            Disini
                        </a>
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
                        <form action="{{ url('/app/sistem/jenjang_santri') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box table-responsive">
                                        <table class="table table-bordered table-striped" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Santri</th>
                                                    <th class="text-center">Absensi</th>
                                                    <th class="text-center">Tadribat</th>
                                                    <th class="text-center">Hafalan</th>
                                                    <th class="text-center">Kriteria</th>
                                                    <th class="text-center">Naik Ke</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (empty($data_santri))
                                                    <tr class="text-center">
                                                        <td colspan="7">
                                                            <b>
                                                                <i>
                                                                    Pilih Jenjang Terlebih Dahulu
                                                                </i>
                                                            </b>
                                                        </td>
                                                    </tr>
                                                @else
                                                    @forelse ($data_santri as $data)
                                                        <tr>
                                                            <td class="text-center">
                                                                <input type="checkbox" name="id_santri[]"
                                                                    value="{{ $data->id }}">
                                                            </td>
                                                            <td>{{ $data->nama_lengkap }}</td>
                                                            <td class="text-center">
                                                                @php
                                                                    $data_absensi = Absensi::where('id_jenjang', $data->id_jenjang)
                                                                        ->where('id_santri', $data->id)
                                                                        ->where('id_status_absen', 1)
                                                                        ->count();

                                                                    $pembagian_absensi = Absensi::where('id_santri', $data->id)->count();

                                                                    if ($data_absensi == 0) {
                                                                        echo '0';
                                                                    } else {
                                                                        $pembagian = $pembagian_absensi / 10;
                                                                        $hasil_absensi = (($data_absensi / $pembagian) * 40) / 10;
                                                                        echo $hasil_absensi;
                                                                    }
                                                                @endphp
                                                            </td>
                                                            <td class="text-center">
                                                                @php
                                                                    $data_nilai = 0;
                                                                    $jum_pelajaran = 0;

                                                                    foreach ($data_kategori_satu as $d) {
                                                                        $data_nilai += Nilai::where('id_jenjang', $data->id_jenjang)
                                                                            ->where('id_santri', $data->id)
                                                                            ->where('id_kategori_pelajaran', $d->id)
                                                                            ->sum('nilai');

                                                                        $jum_pelajaran += Nilai::where('id_jenjang', $data->id_jenjang)
                                                                            ->where('id_santri', $data->id)
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
                                                                        $data_nilai += Nilai::where('id_jenjang', $data->id_jenjang)
                                                                            ->where('id_santri', $data->id)
                                                                            ->where('id_kategori_pelajaran', $d->id)
                                                                            ->sum('nilai');

                                                                        $jum_pelajaran += Nilai::where('id_jenjang', $data->id_jenjang)
                                                                            ->where('id_santri', $data->id)
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
                                                                    $data_absensi = Absensi::where('id_jenjang', $data->id_jenjang)
                                                                        ->where('id_santri', $data->id)
                                                                        ->where('id_status_absen', 1)
                                                                        ->count();

                                                                    $pembagian_absensi = Absensi::where('id_santri', $data->id)->count();

                                                                    if ($data_absensi == 0) {
                                                                        $hasil_absensi = 0;
                                                                    } else {
                                                                        $pembagian = $pembagian_absensi / 10;
                                                                        $hasil_absensi = (($data_absensi / $pembagian) * 40) / 100;
                                                                        $hasil_absensi;
                                                                    }

                                                                    $data_nilai = 0;
                                                                    $jum_pelajaran = 0;

                                                                    foreach ($data_kategori_satu as $d) {
                                                                        $data_nilai += Nilai::where('id_jenjang', $data->id_jenjang)
                                                                            ->where('id_santri', $data->id)
                                                                            ->where('id_kategori_pelajaran', $d->id)
                                                                            ->sum('nilai');

                                                                        $jum_pelajaran += Nilai::where('id_jenjang', $data->id_jenjang)
                                                                            ->where('id_santri', $data->id)
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
                                                                        $data_nilai += Nilai::where('id_jenjang', $data->id_jenjang)
                                                                            ->where('id_santri', $data->id)
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
                                                                    $total = $hasil_absensi * 10 + $hasil_tadribat + $hasil_hafalan;
                                                                @endphp
                                                                @if ($total == 0)
                                                                    <span class="badge badge-danger p-2"
                                                                        style="font-size: 14px;">
                                                                        <i class="fa fa-times"></i> Belum Ada Data
                                                                    </span>
                                                                @elseif($total <= 100 && $total >= 75)
                                                                    <span class="badge badge-success p-2"
                                                                        style="font-size: 14px;">
                                                                        <i class="fa fa-check"></i> Lulus
                                                                    </span>
                                                                @else
                                                                    <span class="badge badge-warning p-2"
                                                                        style="font-size: 14px;">
                                                                        <i class="fa fa-times"></i> Belum Ada Kriteria
                                                                    </span>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                @if ($total == 0)
                                                                    -
                                                                @elseif($total <= 100 && $total >= 75)
                                                                    <select name="id_jenjang[]" id="jenjang"
                                                                        class="form-control">
                                                                        <option value="">- Pilih -</option>
                                                                        @foreach ($data_jenjang as $jenjang)
                                                                            @php
                                                                                $filter_jenjang = Santri::where('id', $data->id)
                                                                                    ->where('id_jenjang', $jenjang->id)
                                                                                    ->first();
                                                                            @endphp
                                                                            @if ($filter_jenjang)
                                                                            @else
                                                                                <option value="{{ $jenjang->id }}">
                                                                                    {{ $jenjang->jenjang }}
                                                                                </option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr class="text-center">
                                                            <td colspan="7">
                                                                <i>
                                                                    <b>
                                                                        Maaf, Data Santri Pada Jenjang Tersebut Kosong
                                                                    </b>
                                                                </i>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="checkbox" onchange="checkAll(this)" name="chk[]"> Check
                                        All |
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-plus"></i> Tambah
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group pull-right">
                                        {{-- {{ $data_santri->links() }} --}}
                                    </div>
                                </div>
                            </div>
                            @if (empty($data_santri))
                            @else
                                @if (empty($cek) || empty($data_santri))
                                    2
                                @else
                                    @if ($total == 0)
                                        -
                                    @elseif($total <= 100 && $total >= 75)
                                    @else
                                    @endif
                                @endif
                            @endif
                        </form>
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

        function checkAll(ele) {
            var checkboxes = document.getElementsByTagName("input");
            if (ele.checked) {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = true;
                    }
                }
            } else {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == "checkbox") {
                        checkboxes[i].checked = false;
                    }
                }
            }
        }

        $(document).ready(function() {
            $("#table-1").dataTable();
        })
    </script>

@endsection
