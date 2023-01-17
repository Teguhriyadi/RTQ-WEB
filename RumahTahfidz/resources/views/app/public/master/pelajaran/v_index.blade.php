@extends('.app.layouts.template')

@section('app_title', 'Pelajaran')

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
                    <form method="POST" action="{{ url('/app/sistem/pelajaran') }}" id="tambahPelajaran">
                        @csrf
                        <div class="form-group">
                            <label for="nama_pelajaran"> Nama Pelajaran </label>
                            <input type="text" class="form-control" name="nama_pelajaran" id="nama_pelajaran"
                                placeholder="Masukkan Nama Pelajaran" value="{{ old('nama_pelajaran') }}">
                        </div>
                        <div class="ln_solid"></div>
                        @include("app.layouts.partials.button.btn")
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
                                            <th class="text-center">Pelajaran</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($pelajaran as $data)
                                            <tr>
                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td>{{ $data->nama_pelajaran }}</td>
                                                <td class="text-center">
                                                    <button onclick="editPelajaran({{ $data->id }})"
                                                        class="btn btn-warning btn-sm text-white" data-target="#modalEdit"
                                                        data-toggle="modal">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <button id="deletePelajaran" data-id="{{ $data->id }}"
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
                <form action="{{ url('/app/sistem/pelajaran/simpan') }}" method="POST" id="editPelajaran">
                    @method('PUT')
                    @csrf
                    <div class="modal-body" id="modal-content-edit">

                    </div>
                    <div class="modal-footer">
                        @include("app.layouts.partials.button.btn")
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
                    $("#tambahPelajaran").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            nama_pelajaran: {
                                required: true
                            },
                        },
                        messages: {
                            nama_pelajaran: {
                                required: "Kolom Nama Pelajaran harap diisi!"
                            },
                        },
                        submitHandler: function(form) {
                            form.submit()
                        }
                    });

                    $("#editPelajaran").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            nama_pelajaran: {
                                required: true
                            },
                        },
                        messages: {
                            nama_pelajaran: {
                                required: "Kolom Nama Pelajaran harap diisi!"
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

        function editPelajaran(id) {
            $.ajax({
                url: "{{ url('/app/sistem/pelajaran/edit') }}",
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

        $('body').on('click', '#deletePelajaran', function() {
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
                        "<form method=\"POST\" action=\"{{ url('/app/sistem/pelajaran/') }}/" +
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
