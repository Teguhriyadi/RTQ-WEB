@extends('.app.layouts.template')

@section('app_title', 'Nilai Kategori')

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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <div class="clearfix"></div>
    @endif

    <div class="row">
        <div class="col-md-4 col-xs-4 col-lg-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-plus"></i> Tambah @yield('app_title')
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="{{ url('/app/sistem/setting/nilai/kategori/') }}" method="POST" id="tambahNilai">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nilai_awal"> Nilai Awal </label>
                            <input type="number" class="form-control" name="nilai_awal" id="nilai_awal" placeholder="0"
                                value="{{ old('nilai_awal') }}">
                        </div>
                        <div class="form-group">
                            <label for="nilai_akhir"> Nilai Akhir </label>
                            <input type="number" class="form-control" name="nilai_akhir" id="nilai_akhir" placeholder="0"
                                value="{{ old('nilai_akhir') }}">
                        </div>
                        <div class="form-group">
                            <label for="nilai_kategori"> Nilai Kategori </label>
                            <input type="text" class="form-control" name="nilai_kategori" id="nilai_kategori"
                                placeholder="Masukkan Nilai Kategori" value="{{ old('nilai_kategori') }}">
                        </div>
                        <div class="ln_solid"></div>
                        <button class="btn btn-danger btn-sm" type="reset">
                            <i class="fa fa-times"></i> Kembali
                        </button>
                        <button class="btn btn-primary btn-sm" type="submit">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-xs-8 col-lg-8">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-book"></i> Data @yield('app_title')
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="card-box table-responsive">
                        <table id="table-1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nilai Awal</th>
                                    <th class="text-center">Nilai Akhir</th>
                                    <th class="text-center">Nilai Kategori</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($data_nilai_kategori as $data)
                                    <tr>
                                        <td class="text-center">{{ ++$no }}.</td>
                                        <td class="text-center">{{ $data->nilai_awal }}</td>
                                        <td class="text-center">{{ $data->nilai_akhir }}</td>
                                        <td class="text-center">{{ $data->nilai_kategori }}</td>
                                        <td class="text-center">
                                            <button onclick="editNilaiKategori({{ $data->id }})"
                                                class="btn btn-warning btn-sm" data-target="#modalEdit" data-toggle="modal">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                            <form action="{{ url('/app/sistem/setting/nilai/kategori/' . $data->id) }}"
                                                method="POST" style="display: inline;">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </button>
                                            </form>
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

    <!-- Edit Data -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalEdit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa fa-edit"></i>
                        <span>Edit Data</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/app/sistem/setting/nilai/kategori/simpan') }}" method="POST" id="editNilai">
                    @method('PUT')
                    @csrf
                    <div class="modal-body" id="modal-content-edit">

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">
                            <i class="fa fa-times"></i> Kembali
                        </button>
                        <button type="submit" class="btn btn-success" id="btn-edit">
                            <i class="fa fa-save"></i> Simpan
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
        (function($, W, D) {
            var JQUERY4U = {};
            JQUERY4U.UTIL = {
                setupFormValidation: function() {
                    $("#tambahNilai").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            nilai_awal: {
                                required: true
                            },
                            nilai_akhir: {
                                required: true
                            },
                            nilai_kategori: {
                                required: true
                            },
                        },
                        messages: {
                            nilai_awal: {
                                required: "Nilai awal harap diisi!"
                            },
                            nilai_akhir: {
                                required: "Nilai akhir harap diisi!"
                            },
                            nilai_kategori: {
                                required: "Nilai kategori harap diisi!"
                            },
                        },
                        submitHandler: function(form) {
                            form.submit()
                        }
                    });

                    $("#editNilai").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            nilai_awal: {
                                required: true
                            },
                            nilai_akhir: {
                                required: true
                            },
                            nilai_kategori: {
                                required: true
                            },
                        },
                        messages: {
                            nilai_awal: {
                                required: "Kategori penilaian harap diisi!"
                            },
                            nilai_akhir: {
                                required: "Nilai akhir harap diisi!"
                            },
                            nilai_kategori: {
                                required: "Nilai kategori harap diisi!"
                            },
                        },
                        submitHandler: function(form) {
                            form.submit()
                        }
                    })
                }
            }
            $(D).ready(function($) {
                JQUERY4U.UTIL.setupFormValidation()
            })
        })(jQuery, window, document)
    </script>

    <script type="text/javascript">
        function editNilaiKategori(id) {
            $.ajax({
                url: "{{ url('/app/sistem/setting/nilai/kategori/edit') }}",
                type: "GET",
                data: {
                    id: id
                },
                success: function(data) {
                    $("#modal-content-edit").html(data);
                    return true;
                }
            });
        }

        $("#table-1").dataTable();
    </script>

@endsection
