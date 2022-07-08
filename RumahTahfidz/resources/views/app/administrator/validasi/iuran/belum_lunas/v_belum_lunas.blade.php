@php
use App\Models\Santri;
use App\Models\Iuran;
use Carbon\Carbon;
@endphp
@extends('.app.layouts.template')

@section('app_title', 'Iuran Belum Lunas')

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
                <li class="breadcrumb-item active" aria-current="page">
                    @yield('app_title')
                </li>
            </ol>
        </nav>
    </section>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-money"></i> Iuran Bulan <b>{{ date('d') }}</b>
                    </h2>
                    <form action="" class="pull-right">
                        <div class="form-group">
                            <select name="" id="" style="padding: 5px;">
                                <option value="">- Pilihan Rekap -</option>
                                <option value="1"> 5 Hari </option>
                                <option value="2"> 10 Hari </option>
                                <option value="3"> Lainnya </option>
                            </select>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal_awal"> Tanggal Awal </label>
                                <input type="date" class="form-control" name="tanggal_awal">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal_akhir"> Tanggal Akhir </label>
                                <input type="date" class="form-control" name="tanggal_akhir">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-sm btn-block mt-4 p-2">
                                <i class="fa fa-search"></i> Cari
                            </button>
                        </div>
                    </div>
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
                                            <th class="text-center">NIS</th>
                                            <th>Santri</th>
                                            <th class="text-center">Sisa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($data_santri as $data)
                                            @php
                                                $total = Iuran::where('id_santri', $data->id_santri)->get();

                                                $data_total = 0;

                                                foreach ($total as $s) {
                                                    $data_total += $s->nominal;
                                                }

                                                $santri = Santri::where('id', $data->id_santri)->first();

                                                $nominal_sekarang = $data_total - $santri->getBesaranIuran->besaran;

                                            @endphp
                                            @if ($santri->id_jenjang != 0)
                                                @if ($nominal_sekarang <= 0)
                                                    <tr>
                                                        <td class="text-center">{{ ++$no }}.</td>
                                                        <td class="text-center">{{ $data->getSantri->nis }}</td>
                                                        <td>{{ $data->getSantri->nama_lengkap }}</td>
                                                        <td class="text-center">
                                                            Rp. {{ number_format(abs($nominal_sekarang)) }}
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endif
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

    <script type="text/javascript">
        $(document).ready(function() {
            $("#table-1").dataTable();
        })
    </script>

@endsection
