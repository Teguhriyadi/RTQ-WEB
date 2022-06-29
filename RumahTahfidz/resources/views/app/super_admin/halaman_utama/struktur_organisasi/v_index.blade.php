@extends('.app.layouts.template')

@section('app_title', 'Struktur Organisasi')

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
                    @yield('app_title')
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

    @if ($data_jabatan->count() < 1)
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="alert alert-danger" role="alert">
                    <strong>Oops!</strong> Data Jabatan Masih Kosong. Silahkan klik
                    <a href="{{ url('/app/sistem/jabatan') }}" style="color: white;">Disini</a>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
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
                            <div class="col-md-12 col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th>Nama</th>
                                                <th class="text-center">Jabatan</th>
                                                <th>Deskripsi</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 0;
                                            @endphp
                                            @foreach ($data_struktur_organisasi as $data)
                                                <tr>
                                                    <td class="text-center">{{ ++$no }}.</td>
                                                    <td>{{ $data->nama }}</td>
                                                    <td class="text-center">{{ $data->getJabatan->nama_jabatan }}</td>
                                                    <td>{{ $data->deskripsi }}</td>
                                                    <td class="text-center">
                                                        <button onclick="editStrukturOrganisasi({{ $data->id }})"
                                                            class="btn btn-warning btn-sm text-white"
                                                            data-target="#modalEdit" data-toggle="modal">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </button>
                                                        <form
                                                            action="{{ url('/app/sistem/struktur_organisasi/' . $data->id) }}"
                                                            method="POST" style="display: inline;">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ $data->id }}">
                                                            <input type="hidden" name="foto"
                                                                value="{{ $data->foto }}">
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
                <form action="{{ url('/app/sistem/struktur_organisasi/') }}" method="POST" enctype="multipart/form-data"
                    id="tambahStrukturOrganisasi">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama"> Nama </label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group">
                            <label for="id_jabatan"> Jabatan </label>
                            <select name="id_jabatan" class="form-control" id="id_jabatan">
                                <option value="">- Pilih -</option>
                                @foreach ($data_jabatan as $data)
                                    <option value="{{ $data->id }}">
                                        {{ $data->nama_jabatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto"> Foto </label>
                            <img class="gambar-preview " id="tampilGambar">
                            <input type="file" onchange="previewImage()" name="foto" id="foto"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi"> Deskripsi </label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5" placeholder="Masukkan Deskripsi"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                            <i class="fa fa-times"></i> Kembali
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-save"></i> Tambah
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
                        <i class="fa fa-edit"></i>
                        <span>Edit Data</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/app/sistem/struktur_organisasi/simpan') }}" method="POST"
                    id="editStrukturOrganisasi">
                    @method('PUT')
                    @csrf
                    <div class="modal-body" id="modal-content-edit">

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
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
                    $("#tambahStrukturOrganisasi").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            foto: {
                                required: true,
                                accept: true
                            },
                            nama: {
                                required: true
                            },
                            id_jabatan: {
                                required: true
                            },
                            deskripsi: {
                                required: true
                            },
                        },
                        messages: {
                            foto: {
                                required: "Foto harap di isi!",
                                accept: "Masukan format gambar yang sesuai!"
                            },
                            nama: {
                                required: "Nama harap di isi!"
                            },
                            id_jabatan: {
                                required: "Jabatan harap di isi!"
                            },
                            deskripsi: {
                                required: "Deskripsi harap di isi!"
                            },
                        },
                        submitHandler: function(form) {
                            form.submit()
                        }
                    });

                    $("#editStrukturOrganisasi").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            foto: {
                                accept: true
                            },
                            nama: {
                                required: true
                            },
                            id_jabatan: {
                                required: true
                            },
                            deskripsi: {
                                required: true
                            },
                        },
                        messages: {
                            foto: {
                                accept: "Masukan format gambar yang sesuai!"
                            },
                            nama: {
                                required: "Nama harap di isi!"
                            },
                            id_jabatan: {
                                required: "Jabatan harap di isi!"
                            },
                            deskripsi: {
                                required: "Deskripsi harap di isi!"
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
        function previewImage() {
            const image = document.querySelector("#foto");
            const imgPreview = document.querySelector(".gambar-preview");

            imgPreview.style.display = "block";

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
                $("#tampilGambar").addClass('mb-3');
                $("#tampilGambar").height("250");
            }
        }
    </script>

    <script>
        function editStrukturOrganisasi(id) {
            $.ajax({
                url: "{{ url('/app/sistem/struktur_organisasi/edit') }}",
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
    </script>

@endsection
