@php
use App\Models\Absensi;
@endphp
@extends('.app.layouts.template')

@section('app_title', 'Laporan Absensi Asatidz')

@section('app_content')

    <section class="section">
        <h3>
            @yield('app_title')
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('app/sistem/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                <li class="breadcrumb-item active" aria-current="page">Absensi</li>
                <li class="breadcrumb-item active" aria-current="page">Asatidz</li>
            </ol>
        </nav>
    </section>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-book"></i> Filter Laporan
                        @if (empty($tanggal_awal) && empty($tanggal_akhir))
                        @else
                            | <b>{{ $tanggal_awal }}</b> - <b>{{ $tanggal_akhir }}</b>
                        @endif
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="{{ url('/app/sistem/laporan/absensi/santri/') }}" method="POST">
                        @method('PUT')
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tanggal_awal"> Tanggal Awal </label>
                                    <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal"
                                        value="{{ empty($tanggal_awal) ? '' : $tanggal_awal }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tanggal_akhir"> Tanggal Akhir </label>
                                    <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir"
                                        value="{{ empty($tanggal_akhir) ? '' : $tanggal_akhir }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div>&nbsp;&nbsp;</div>
                                    <button type="submit" class="btn btn-primary btn-sm mt-2 btn-block">
                                        <i class="fa fa-search"></i> Cari
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-book"></i> @yield('app_title')
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box table-responsive">
                                <table id="table-1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th class="text-center">Halaqah</th>
                                            <th class="text-center">Jenis Kelamin</th>
                                            <th class="text-center">Hadir</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($data_santri as $data)
                                            @php
                                                $jumlah_hadir = Absensi::where('id_santri', $data->id)->count();
                                            @endphp
                                            <tr>
                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td>{{ $data->nis }}</td>
                                                <td>{{ $data->nama_lengkap }}</td>
                                                <td class="text-center">{{ $data->getHalaqah->nama_halaqah }}</td>
                                                <td class="text-center">{{ $data->jenis_kelamin }}</td>
                                                <td class="text-center">{{ $jumlah_hadir }}</td>
                                                <td class="text-center">
                                                    <a href="" class="btn btn-warning btn-sm">
                                                        <i class="fa fa-search"></i> Detail
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
    </div>

@endsection

@section('app_scripts')

    <script>
        $(document).ready(function() {
            $("#table-1").dataTable();
        })
    </script>

@endsection
