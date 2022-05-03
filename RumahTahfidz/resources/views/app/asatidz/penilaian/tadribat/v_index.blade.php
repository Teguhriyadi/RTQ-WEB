@extends("app.layouts.template")

@section("app_title", "Penilaian Tadribat")

@section("app_content")

<div class="">
    <div class="panel-title">
        <div class="title_left">
            <h3>
                @yield("app_title")
            </h3>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <a href="{{ url('/app/sistem/nilai/tadribat/create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah
                </a>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Tanggal</th>
                                        <th>Nama</th>
                                        <th class="text-center">Halaman</th>
                                        <th>Bagian</th>
                                        <th class="text-center">Nilai</th>
                                        <th>Lokasi</th>
                                        <th>Halaqah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 0 @endphp
                                    @foreach ($data_penilaian_tadribat as $data)
                                    <tr>
                                        <td class="text-center">{{ ++$no }}.</td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>{{ $data->getSantri->nama_lengkap }}</td>
                                        <td>{{ $data->halaman }}</td>
                                        <td>{{ $data->bagian }}</td>
                                        <td>{{ $data->nilai }}</td>
                                        <td>{{ $data->getSantri->getWali->getHalaqah->getLokasiRt->lokasi_rt }}</td>
                                        <td>{{ $data->getSantri->getWali->getHalaqah->nama_halaqah }}</td>
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
