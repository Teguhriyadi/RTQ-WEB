@php
use App\Models\KelasHalaqah;
use App\Models\Asatidz;
@endphp
@extends('.app.layouts.template')

@section('app_title', 'Wali Halaqah')

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
                <li class="breadcrumb-item active" aria-current="page">
                    Data @yield('app_title')
                </li>
            </ol>
        </nav>
    </section>

    <div class="clearfix"></div>

    @if (count($data_halaqah) < 1)
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 m-0">
                <div class="x_content bs-example-popovers">
                    <div class="alert alert-danger alert-dismissible " role="alert">
                        <strong>Oops!</strong> Data Halaqah Masih Kosong. Silahkan Klik
                        <a target="_blank" href="{{ url('/app/sistem/halaqah') }}" style="color: white;">
                            Disini
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        @if (count($data_asatidz) < 1)
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 m-0">
                    <div class="x_content bs-example-popovers">
                        <div class="alert alert-danger alert-dismissible " role="alert">
                            <strong>Oops!</strong> Data Asatidz Masih Kosong. Silahkan Klik
                            <a target="_blank" href="{{ url('/app/sistem/asatidz') }}" style="color: white;">
                                Disini
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else
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
                <div class="col-md-12 col-xs-12 co-lg-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                <i class="fa fa-bars"></i> Data @yield('app_title')
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
                                <div class="col-md-12">
                                    <div class="card-box table-responsive">
                                        <table id="table-1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-center">Kode Halaqah</th>
                                                    <th>Asatidz</th>
                                                    <th>Halaqah</th>
                                                    <th class="text-center">Kelas Halaqah</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 0;
                                                @endphp
                                                @foreach ($data_kelas_halaqah as $data)
                                                    <tr>
                                                        <td class="text-center">{{ ++$no }}.</td>
                                                        <td class="text-center">{{ $data->getHalaqah->kode_halaqah }}</td>
                                                        <td>{{ $data->getAsatidz->getUser->nama }}</td>
                                                        <td>{{ $data->getHalaqah->nama_halaqah }}</td>
                                                        <td class="text-center">{{ $data->kelas_halaqah }}</td>
                                                        <td class="text-center">
                                                            <button onclick="editKelasHalaqah({{ $data->id }})"
                                                                class="btn btn-warning text-white btn-sm"
                                                                data-target="#modalEdit" data-toggle="modal">
                                                                <i class="fa fa-edit"></i> Edit
                                                            </button>
                                                            <button id="deleteWaliHalaqah" data-id="{{ $data->id }}"
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
                <form action="{{ url('/app/sistem/kelas_halaqah/') }}" method="POST" id="tambahWaliHalaqah">
                    @csrf
                    @php
                        $j_kelas = KelasHalaqah::count();
                    @endphp
                    @if ($data_asatidz->count() == $j_kelas)
                        <div class="modal-body">
                            <div class="alert alert-danger alert-dismissible " role="alert">
                                <strong>Oops!</strong> Data Asatidz Masih Kosong.
                            </div>
                        </div>
                    @else
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="id_asatidz"> Asatidz </label>
                                <select name="id_asatidz" class="form-control" id="id_asatidz">
                                    <option value="">- Pilih -</option>
                                    @foreach ($data_asatidz as $data)
                                        @php
                                            $sudah_ada = KelasHalaqah::where('id_asatidz', $data->id)->first();
                                        @endphp
                                        @if ($sudah_ada)
                                        @else
                                            <option value="{{ $data->getUser->id }}">
                                                {{ $data->getUser->nama }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kode_halaqah"> Halaqah </label>
                                <select name="kode_halaqah" class="form-control" id="kode_halaqah">
                                    <option value="">- Pilih -</option>
                                    @foreach ($data_halaqah as $data)
                                        <option value="{{ $data->kode_halaqah }}">
                                            {{ $data->kode_halaqah }} - {{ $data->nama_halaqah }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kelas_halaqah"> Kelas Halaqah </label>
                                <input type="text" class="form-control" name="kelas_halaqah" id="kelas_halaqah"
                                    placeholder="Masukkan Kelas Halaqah">
                            </div>
                        </div>
                        <div class="modal-footer">
                            @include("app.layouts.partials.button.btn")
                        </div>
                    @endif
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
                        <i class="fa fa-edit"></i>
                        <span>Edit Data</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/app/sistem/kelas_halaqah/simpan') }}" method="POST" id="editWaliHalaqah">
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
                    $("#tambahWaliHalaqah").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            id_asatidz: {
                                required: true
                            },
                            kode_halaqah: {
                                required: true
                            },
                            kelas_halaqah: {
                                required: true
                            },
                        },
                        messages: {
                            id_asatidz: {
                                required: "Asatidz harap diisi!"
                            },
                            kode_halaqah: {
                                required: "Halaqah harap diisi!"
                            },
                            kelas_halaqah: {
                                required: "Kelas harap diisi!"
                            },
                        },
                        submitHandler: function(form) {
                            form.submit()
                        }
                    });

                    $("#editWaliHalaqah").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            id_asatidz: {
                                required: true
                            },
                            kode_halaqah: {
                                required: true
                            },
                            kelas_halaqah: {
                                required: true
                            },
                        },
                        messages: {
                            id_asatidz: {
                                required: "Asatidz harap diisi!"
                            },
                            kode_halaqah: {
                                required: "Halaqah harap diisi!"
                            },
                            kelas_halaqah: {
                                required: "Kelas harap diisi!"
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

        function editKelasHalaqah(id) {
            $.ajax({
                url: "{{ url('/app/sistem/kelas_halaqah/edit') }}",
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
        });

        $('body').on('click', '#deleteWaliHalaqah', function() {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form_string =
                        "<form method=\"POST\" action=\"{{ url('/app/sistem/kelas_halaqah/') }}/" +
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
