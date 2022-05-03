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
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    @yield("app_title")
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box table-responsive">
                        <table id="table-1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">NIS</th>
                                    <th class="text-center">Kelas</th>
                                    <th>Nama</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 0 @endphp
                                @foreach ($data_santri as $data)
                                <tr>
                                    <td class="text-center">{{ ++$no }}.</td>
                                    <td class="text-center">{{ $data->nis }}</td>
                                    <td class="text-center">{{ $data->getKelas->nama_kelas }}</td>
                                    <td>{{ $data->nama_lengkap }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/app/sistem/rekap/nilai/'.$data->id) }}" class="btn btn-warning">
                                            <i class="fa fa-print"></i> Rekap
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

@endsection

@section("app_scripts")

<script type="text/javascript">
    $(document).ready(function() {
        $("#table-1").dataTable();
    })
</script>

@endsection
