@php
use App\Models\Santri;
use App\Models\Iuran;
@endphp
@extends('.app.layouts.template')

@section('app_title', 'Iuran Lunas')

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
                                            <th class="text-center">Jumlah Uang</th>
                                            <th class="text-center">Status</th>
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

                                                $nominal_sekarang = $santri->getBesaranIuran->besaran = $data_total;

                                            @endphp
                                            @if ($nominal_sekarang >= 0)
                                                <tr>
                                                    <td class="text-center">{{ ++$no }}.</td>
                                                    <td class="text-center">{{ $data->getSantri->nis }}</td>
                                                    <td>{{ $data->getSantri->nama_lengkap }}</td>
                                                    <td class="text-center">Rp. {{ number_format($nominal_sekarang) }}
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge badge-success p-2" style="font-size: 14px">
                                                            <i class="fa fa-check"></i> Sudah Lunas
                                                        </span>
                                                    </td>
                                                </tr>
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
