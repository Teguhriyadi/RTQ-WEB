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
                    <form id="main" name="main" method="POST" class="pull-right">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <select name="rekap_by" id="rekap_by" style="padding: 5px;" onchange="formAction('main')">
                                @if (empty($select_rekap))
                                    <option value="">- Pilihan Rekap -</option>
                                    <option value="1"> 5 Hari </option>
                                    <option value="2"> 10 Hari </option>
                                    <option value="3"> Lainnya </option>
                                @else
                                    <option value="">- Pilihan Rekap -</option>
                                    <option value="1" {{ $select_rekap == 1 ? 'selected' : '' }}> 5 Hari </option>
                                    <option value="2" {{ $select_rekap == 2 ? 'selected' : '' }}> 10 Hari </option>
                                    <option value="3"{{ $select_rekap == 3 ? 'selected' : '' }}> Lainnya </option>
                                @endif
                            </select>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if (empty($select_rekap))
                    @else
                        @if ($select_rekap == 1)
                            @include('app.administrator.validasi.iuran.v_tanggal_filter')
                        @elseif($select_rekap == 2)
                            @include('app.administrator.validasi.iuran.v_tanggal_filter')
                        @elseif($select_rekap == 3)
                            @include('app.administrator.validasi.iuran.v_tanggal_lainnya')
                        @endif
                    @endif
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

        function formAction(idForm, action, target = '') {
            if (target != '') {
                $('#' + idForm).attr('target', target);
            }
            $('#' + idForm).attr('action', action);
            console.log();
            $('#' + idForm).submit();
        }
    </script>

@endsection
