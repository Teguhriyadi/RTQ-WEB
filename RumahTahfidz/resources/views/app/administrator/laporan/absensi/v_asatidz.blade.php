@extends('.app.layouts.template')

@section('app_title', 'Laporan Absensi Santri')

@section('app_content')

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

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-book"></i> @yield('app_title')
                    </h2>
                    <div class="pull-right">
                        <button class="btn btn-danger btn-sm">
                            <i class="fa fa-download"></i> PDF
                        </button>
                        <button class="btn btn-success btn-sm">
                            <i class="fa fa-download"></i> Excel
                        </button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">NIS</th>
                                            <th>Nama</th>
                                            <th class="text-center">Hadir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                            use App\Models\AbsensiAsatidz;
                                        @endphp
                                        @foreach ($data_asatidz as $data)
                                        @php
                                            $jumlah_hadir = AbsensiAsatidz::where("id_asatidz", $data->id)->count();
                                        @endphp
                                            <tr>
                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $data->nomor_induk }}</td>
                                                <td>{{ $data->getUser->nama }}</td>
                                                <td class="text-center">{{ $jumlah_hadir }}</td>
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
