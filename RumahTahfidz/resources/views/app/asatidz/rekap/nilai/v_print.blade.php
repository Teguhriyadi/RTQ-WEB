@extends("app.layouts.template")

@section("app_title", "Rekap Nilai")

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
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    @yield("app_title")
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Jenjang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $data_santri->nis }}</td>
                                        <td>{{ $data_santri->nama_lengkap }}</td>
                                        <td>{{ $data_santri->getJenjang->jenjang }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Pelajaran</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_tadribat as $data)
                                    <tr>
                                        <td>{{ $data->getPelajaranTadribat->getPelajaran->pelajaran }}</td>
                                        <td>{{ $data->nilai }}</td>
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
