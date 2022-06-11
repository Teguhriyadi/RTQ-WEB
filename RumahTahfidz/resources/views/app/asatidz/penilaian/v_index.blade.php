@extends('app.layouts.template')

@section('app_title', 'Penilaian ' . $data_kategori->kategori_penilaian)

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
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/app/sistem/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('app_title')</li>
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
                    <div class="mb-3">
                        <div class="form-group">
                            <select name="id_cabang" id="id_cabang" class="form-control">
                                <option value="">Pilih Cabang</option>
                                @foreach ($data_cabang as $cabang)
                                    <option value="{{ $cabang->getHalaqah->kode_halaqah }}">{{ $cabang->lokasi_rt }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Jenjang</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th colspan="3">Harap pilih cabang</th>
                                        </tr>
                                    </tbody>
                                </table>
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
            $("#id_cabang").on('change', function() {
                $('tbody').empty()
                let kode_halaqah = $(this).val()
                $.ajax({
                    url: "{{ url('app/sistem/penilaian/jenjang/' . Request::segment(4)) }}/" +
                        kode_halaqah,
                    type: 'GET',
                    success: function(response) {
                        $('tbody').html(response);
                    }
                });
            })
        })
    </script>

@endsection
