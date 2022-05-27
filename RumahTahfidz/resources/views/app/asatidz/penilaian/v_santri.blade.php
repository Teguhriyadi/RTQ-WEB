@extends('app.layouts.template')

@section('app_title', 'Cabang ' . $data_santri[0]->getHalaqah->getLokasiRt->lokasi_rt)

@section('app_content')

    <div class="">
        <div class="panel-title">
            <div class="title_left">
                <h3>
                    @yield('app_title')
                </h3>
            </div>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('app/sistem/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('app/sistem/penilaian/tadribat') }}">Penilaian
                    {{ $data_kategori->kategori_penilaian }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('app_title')</li>
            <li class="breadcrumb-item active" aria-current="page">Jenjang {{ $data_santri[0]->getJenjang->jenjang }}</li>
        </ol>
    </nav>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-edit"></i> @yield('app_title')
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box table-responsive">
                                <form action="" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <select class="form-control" name="id_pelajaran" id="id_pelajaran">
                                            <option value="">Silahkan pilih pelajaran</option>
                                            @foreach ($data_pelajaran as $pelajaran)
                                                <option value="{{ $pelajaran->id_pelajaran }}">
                                                    {{ $pelajaran->getPelajaran->nama_pelajaran }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">NIS</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center"></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-simpan">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END -->

@endsection

@section('app_scripts')

    <script>
        $(document).ready(function() {
            $("#table-1").dataTable();
            $(".btn-simpan").hide();

            $('#id_pelajaran').on('change', function() {
                if ($(this).val() != '') {
                    $.ajax({
                        url: '{{ Request::url() }}/' + $(this).val(),
                        type: 'get',
                        success: function(response) {
                            $(".btn-simpan").show();
                            $('tbody').html(response);
                        }
                    })
                }
            })
        })
    </script>

@endsection
