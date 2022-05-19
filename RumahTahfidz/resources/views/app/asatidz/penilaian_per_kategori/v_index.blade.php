@extends('app.layouts.template')

@section('app_title', 'Penilaian Tadribat')

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
                                            <th style="width: 50px">No.</th>
                                            <th>Jenjang</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambah Nilai Tadribat -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalEdit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa fa-plus"></i>
                        <span>Tambah Nilai Tadribat</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/app/sistem/kategori/tadribat') }}" method="POST">
                    @csrf
                    <div class="modal-body" id="modal-content">

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">
                            <i class="fa fa-times"></i> Kembali
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END -->

@endsection

@section('app_scripts')

    <script>
        $(document).ready(function() {
            $("#id_cabang").on('change', function() {
                console.log($(this).val());
                $.ajax({
                    url: "{{ url('app/sistem/penilaian/jenjang/' . Request::segment(4)) }}",
                    type: 'GET',
                    success: function(response) {
                        $('tbody').html(response);
                    }
                });
            })
        })
    </script>

@endsection
