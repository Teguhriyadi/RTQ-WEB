@extends('.app.layouts.template')

@section('app_title', 'Kategori Penilaian')

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
        <div class="col-md-4 col-sm-8 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-plus"></i> Tambah Data
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="POST" action="{{ url('/app/sistem/setting/kategori/nilai/') }}" id="tambahKategoriNilai">
                        @csrf
                        <div class="form-group">
                            <label for="kategori_penilaian"> Kategori Penilaian </label>
                            <input type="text" class="form-control" name="kategori_penilaian" id="kategori_penilaian"
                                placeholder="Masukkan Kategori Penilaian" value="{{ old('kategori_penilaian') }}">
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
        <div class="col-md-8 col-sm-4 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-bars"></i> Data @yield('app_title')
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th>Penilaian</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_penilaian as $status)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $status->kategori_penilaian }}</td>
                                                <td class="text-center">
                                                    <a href="#" onclick="editKategoriPelajaran('{{ $status->id }}')"
                                                        class="btn btn-warning btn-sm" data-target="#modalEdit"
                                                        data-toggle="modal">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    <button id="deleteKategoriPenilaian" data-id="{{ $status->id }}"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </button>
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
                <form action="{{ url('/app/sistem/setting/kategori/nilai/simpan') }}" method="POST" id="editKategoriNilai">
                    @method('PUT')
                    @csrf
                    <div class="modal-body" id="modal-content-edit">

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i> Kembali
                        </button>
                        <button type="submit" class="btn btn-success btn-sm" id="btn-edit">
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
                    $("#tambahKategoriNilai").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            kategori_penilaian: {
                                required: true
                            },
                        },
                        messages: {
                            kategori_penilaian: {
                                required: "Kolom Kategori Penilaian harap di isi!"
                            },
                        },
                        submitHandler: function(form) {
                            form.submit()
                        }
                    });

                    $("#editKategoriNilai").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            kategori_penilaian: {
                                required: true
                            },
                        },
                        messages: {
                            kategori_penilaian: {
                                required: "Kolom Kategori Penilaian harap di isi!"
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

        function editKategoriPelajaran(id) {
            $.ajax({
                url: "{{ url('/app/sistem/setting/kategori/nilai/edit') }}",
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

        $(document).ready(function() {
            $("#table-1").dataTable();
        })

        $('body').on('click', '#deleteKategoriPenilaian', function() {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iyaa, Saya Yakin'
            }).then((result) => {
                if (result.isConfirmed) {
                    form_string =
                        "<form method=\"POST\" action=\"{{ url('/app/sistem/setting/kategori/nilai/') }}/" +
                        id +
                        "\" accept-charset=\"UTF-8\"><input name=\"_method\" type=\"hidden\" value=\"DELETE\"><input name=\"_token\" type=\"hidden\" value=\"{{ csrf_token() }}\"></form>"

                    form = $(form_string)
                    form.appendTo('body');
                    form.submit();
                } else {
                    Swal.fire('Konfirmasi Diterima!', 'Data Anda Masih Terdata', 'success');
                }
            })
        })
    </script>

@endsection
