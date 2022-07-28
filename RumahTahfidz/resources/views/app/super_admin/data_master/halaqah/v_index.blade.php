@extends('.app.layouts.template')

@section('app_title', 'Halaqah')

@section('app_content')

@section('app_css')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endsection

<section class="section">
    <h3>
        @yield('app_title')
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('app/sistem/home') }}">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Data @yield('app_title')
            </li>
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

@if ($data_lokasi_rt->count() < 1)
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 m-0">
            <div class="x_content bs-example-popovers">
                <div class="alert alert-danger alert-dismissible " role="alert">
                    <strong>Oops!</strong> Data Lokasi RT Masih Kosong. Silahkan Klik
                    <a target="_blank" href="{{ url('/app/sistem/lokasi_cabang') }}" style="color: white;">Disini</a>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-tags"></i> Data Halaqah
                    </h2>
                    <div class="pull-right">
                        <button class="btn btn-primary btn-sm" data-target="#modalTambah" data-toggle="modal">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </div>
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
                                            <th>Nama</th>
                                            <th>Lokasi</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 0 @endphp
                                        @foreach ($data_halaqah as $halaqah)
                                            <tr>
                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td>{{ $halaqah->nama_halaqah }}</td>
                                                <td>{{ $halaqah->getLokasiRt->lokasi_rt }}</td>
                                                <td class="text-center">
                                                    <button onclick="editDataHalaqah('{{ $halaqah->kode_halaqah }}')"
                                                        class="btn btn-warning btn-sm text-white"
                                                        data-target="#modalEdit" data-toggle="modal">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <button id="deleteHalaqah" data-id="{{ $halaqah->kode_halaqah }}"
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
@endif

<!-- Tambah Data -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-plus"></i>
                    <span>Tambah Data</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/app/sistem/halaqah/') }}" method="POST" id="tambahHalaqah">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_halaqah"> Nama Halaqah </label>
                        <input type="text" class="form-control" name="nama_halaqah" id="nama_halaqah"
                            placeholder="Masukkan Nama Halaqah" value="{{ old('nama_halaqah') }}">
                    </div>
                    <div class="form-group">
                        <label for="kode_rt"> Lokasi RT </label>
                        <select name="kode_rt" class="form-control" id="kode_rt" style="width: 100%">
                            <option value="">- Pilih -</option>
                            @foreach ($data_lokasi_rt as $data)
                                <option value="{{ $data->kode_rt }}"
                                    {{ old('kode_rt') == $data->kode_rt ? 'selected' : '' }}>
                                    {{ $data->lokasi_rt }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- Edit Data -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalEdit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-pencil"></i>
                    <span>Edit Data</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/app/sistem/halaqah/simpan') }}" method="POST" id="editHalaqah">
                @method('PUT')
                @csrf
                <div class="modal-body" id="modal-content">

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-success btn-sm">
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
                $("#tambahHalaqah").validate({
                    lang: "id",
                    ignore: "",
                    rules: {
                        nama_halaqah: {
                            required: true
                        },
                        kode_rt: {
                            required: true
                        },
                    },
                    messages: {
                        nama_halaqah: {
                            required: "Kolom Nama Halaqah harap di isi!"
                        },
                        kode_rt: {
                            required: "Kolom Lokasi Cabang harap di isi!"
                        },
                    },
                    submitHandler: function(form) {
                        form.submit()
                    }
                });

                $("#editHalaqah").validate({
                    lang: "id",
                    ignore: "",
                    rules: {
                        nama_halaqah: {
                            required: true
                        },
                        kode_rt: {
                            required: true
                        },
                    },
                    messages: {
                        nama_halaqah: {
                            required: "Kolom Nama Halaqah harap di isi!"
                        },
                        kode_rt: {
                            required: "Kolom Kode Cabang harap di isi!"
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    function editDataHalaqah(kode_halaqah) {
        $.ajax({
            url: "{{ url('/app/sistem/halaqah/edit') }}",
            type: "GET",
            data: {
                kode_halaqah: kode_halaqah
            },
            success: function(data) {
                $("#modal-content").html(data);
                return true;
            }
        });
    }

    $(document).ready(function() {
        $("#table-1").dataTable();
    })

    $(document).ready(function() {
        $('body').on('click', '#deleteHalaqah', function() {
            let kode_halaqah = $(this).data('kode_halaqah');

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
                        "<form method=\"POST\" action=\"{{ url('/app/sistem/halaqah/') }}/" +
                        kode_halaqah +
                        "\" accept-charset=\"UTF-8\"><input name=\"_method\" type=\"hidden\" value=\"DELETE\"><input name=\"_token\" type=\"hidden\" value=\"{{ csrf_token() }}\"></form>"

                    form = $(form_string)
                    form.appendTo('body');
                    form.submit();
                } else {
                    Swal.fire('Konfirmasi Diterima!', 'Data Anda Masih Terdata', 'success');
                }
            })
        })
    })
</script>

@endsection
