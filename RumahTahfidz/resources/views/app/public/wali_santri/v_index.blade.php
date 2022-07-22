@extends('.app.layouts.template')

@section('app_title', 'Wali Santri')

@section('app_content')

    <style>
        th.dt-center,
        td.dt-center {
            text-align: center;
        }
    </style>

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

    @if ($data_halaqah->count() < 1)
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 m-0">
                <div class="x_content bs-example-popovers">
                    <div class="alert alert-danger alert-dismissible " role="alert">
                        <strong>Oops!</strong> Data Halaqah Masih Kosong.
                        Silahkan Klik <a target="_blank" href="{{ url('/app/sistem/halaqah') }}"
                            style="color: white;">Disini</a>
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
                            <i class="fa fa-users"></i> Data @yield('app_title')
                        </h2>
                        @if (Auth::user()->getAkses->getRole->id == 1)
                        @else
                            <div class="pull-right">
                                <a href="{{ url('/app/sistem/wali_santri/create') }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus"></i> Tambah
                                </a>
                            </div>
                        @endif
                        <div class="pull-right">
                            {{-- <a href="{{ url('app/sistem/wali_santri/export') }}" class="btn btn-success btn-sm"><i --}}
                            {{-- class="fa fa-download"></i> Download</a> --}}
                            @if (!Auth::user()->getAkses->id == 1)
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalExcel"><i
                                        class="fa fa-upload"></i> Upload</button>
                            @endif
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable-walisantri" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>No. KK</th>
                                                <th>Nama</th>
                                                <th>Jenis Kelamin</th>
                                                <th>No. HP</th>
                                                <th>Jumlah Anak</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

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

    <!-- Edit Data -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modalEdit" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa fa-edit"></i> Edit Data
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/app/sistem/wali_santri/simpan') }}" method="POST" id="editWaliSantri"
                    enctype="multipart/form-data">
                    @method('PUT')
                    {{ csrf_field() }}
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

    <!-- Tambah Data Santri -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalTambahSantri">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa fa-plus"></i> Tambah Data
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/app/sistem/santri/tambah_santri_by_wali') }}" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body" id="modal-content-tambah-santri">

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
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

    <div class="modal fade" tabindex="-1" role="dialog" id="modalExcel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa fa-plus"></i> Tambah Data
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('app/sistem/wali_santri/import') }}" method="post" id="tambahWaliSantriExcel"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Import Excel</label>
                            <input type="file" class="form-control " name="importWaliSantri">
                        </div>
                        <div class="form-group" id="process" style="display: none">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar"
                                    aria-valuemin="0" aria-valuemax="100" style=""></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i
                                class="fa fa-times"></i>
                            Kembali</button>
                        <button type="submit" class="btn btn-primary btn-sm" id="btn-tambah-excel">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END -->

@endsection

@section('app_scripts')
    <script src="{{ url('') }}/vendors/jquery/dist/jquery.form.min.js"></script>
    <script type="text/javascript">
        function previewImage() {
            const image = document.querySelector("#gambar");
            const imgPreview = document.querySelector(".gambar-preview");

            imgPreview.style.display = "block";

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
                $("#tampilGambar").addClass('mb-3');
                $("#tampilGambar").width("100%");
                $("#tampilGambar").height("300");
            }
        }

        function editDataWali(id) {
            $.ajax({
                url: "{{ url('/app/sistem/wali_santri/edit') }}",
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

        function tambahDataSantri(id) {
            $.ajax({
                url: "{{ url('/app/sistem/santri/tambah_data_santri') }}",
                type: "GET",
                data: {
                    id: id
                },
                success: function(data) {
                    $("#modal-content-tambah-santri").html(data)
                    return true;
                }
            });
        }

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            $("#datatable-walisantri").dataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('app/sistem/wali_santri/datatables') }}",
                columnDefs: [{
                    "className": "dt-center",
                    "targets": [0, 1, 3, 5, 6]
                }],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'no_kk',
                        name: 'no_kk'
                    },
                    {
                        data: 'nama_lengkap',
                        name: 'nama_lengkap'
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'jenis_kelamin'
                    },
                    {
                        data: 'no_hp',
                        name: 'no_hp'
                    },
                    {
                        data: 'jumlah_anak',
                        name: 'jumlah_anak'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

            $("#btn-tambah-excel").click(function() {
                $("#tambahWaliSantriExcel").ajaxForm({
                    url: "{{ url('app/sistem/wali_santri/import') }}",
                    beforeSubmit: function() {
                        $("input[name='importWaliSantri']").css("display", "none");
                        $("#btn-tambah-excel").attr("disabled", "disabled");
                        $('#process').css('display', 'block');
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        var percentValue = percentComplete + '%';
                        $(".progress-bar").animate({
                            width: '' + percentValue + ''
                        }, {
                            duration: 5000,
                            easing: "linear",
                            step: function(x) {
                                percentText = Math.round(x * 100 / percentComplete);
                                if (percentText == "100") {
                                    $(".progress-bar").text("Harap tunggu!");
                                    setTimeout(function() {
                                        $('.progress-bar').html(
                                            'Proses validasi data sedang berlangsung!'
                                        );
                                    }, 15000);
                                }
                            }
                        });
                    },
                    error: function(response, status, e) {
                        Swal.fire("Ooops", "Data gagal diupload!", "error")
                    },
                    complete: function(xhr) {
                        if (xhr.status != 500) {
                            $("#modalExcel").modal('hide');
                            location.reload();
                        }
                        $('#tambahWaliSantriExcel')[0].reset();
                        $('#process').css('display', 'none');
                        $('.progress-bar').css('width', '0%');
                        $(".progress-bar").stop();
                        $('#btn-tambah-excel').attr('disabled', false);
                        $("input[name='importWaliSantri']").css("display", "block");
                    }
                });
            })
        })
    </script>

    <script>
        (function($, W, D) {
            var JQUERY4U = {};
            JQUERY4U.UTIL = {
                setupFormValidation: function() {
                    $("#tambahWaliSantri").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            no_ktp: {
                                required: true
                            },
                            no_kk: {
                                required: true
                            },
                            nama: {
                                required: true
                            },
                            email: {
                                required: true
                            },
                            kode_halaqah: {
                                required: true
                            },
                            no_hp: {
                                required: true
                            },
                            jenis_kelamin: {
                                required: true
                            },
                            tempat_lahir: {
                                required: true
                            },
                            tanggal_lahir: {
                                required: true
                            },
                            alamat: {
                                required: true
                            },
                        },
                        messages: {
                            no_ktp: {
                                required: "Nomor KTP Harap di Isi!"
                            },
                            no_kk: {
                                required: "Nomor KK Harap di Isi!"
                            },
                            nama: {
                                required: "Nama Harus di Isi!"
                            },
                            email: {
                                required: "Email Harus di Isi!"
                            },
                            kode_halaqah: {
                                required: "Kode Halaqah Harap di Isi!"
                            },
                            no_hp: {
                                required: "Nomor HP Harap di Isi!"
                            },
                            jenis_kelamin: {
                                required: "Jenis Kelamin Harap di Isi!"
                            },
                            tempat_lahir: {
                                required: "Tempat Lahir Harap di Isi!"
                            },
                            tanggal_lahir: {
                                required: "Tanggal Lahir Harap di Isi!"
                            },
                            alamat: {
                                required: "Alamat Harap di Isi!"
                            }
                        },
                        submitHandler: function(form) {
                            form.submit()
                        }
                    });

                    $("#editWaliSantri").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            no_ktp: {
                                required: true
                            },
                            no_kk: {
                                required: true
                            },
                            nama: {
                                required: true
                            },
                            email: {
                                required: true
                            },
                            kode_halaqah: {
                                required: true
                            },
                            no_hp: {
                                required: true
                            },
                            jenis_kelamin: {
                                required: true
                            },
                            tempat_lahir: {
                                required: true
                            },
                            tanggal_lahir: {
                                required: true
                            },
                            alamat: {
                                required: true
                            },
                        },
                        messages: {
                            no_ktp: {
                                required: "Nomor KTP Harap di Isi!"
                            },
                            no_kk: {
                                required: "Nomor KK Harap di Isi!"
                            },
                            nama: {
                                required: "Nama Harus di Isi!"
                            },
                            email: {
                                required: "Email Harus di Isi!"
                            },
                            kode_halaqah: {
                                required: "Kode Halaqah Harap di Isi!"
                            },
                            no_hp: {
                                required: "Nomor HP Harap di Isi!"
                            },
                            jenis_kelamin: {
                                required: "Jenis Kelamin Harap di Isi!"
                            },
                            tempat_lahir: {
                                required: "Tempat Lahir Harap di Isi!"
                            },
                            tanggal_lahir: {
                                required: "Tanggal Lahir Harap di Isi!"
                            },
                            alamat: {
                                required: "Alamat Harap di Isi!"
                            }
                        },
                        submitHandler: function(form) {
                            form.submit()
                        }
                    });
                }
            }
            $(D).ready(function($) {
                JQUERY4U.UTIL.setupFormValidation()
            })
        })(jQuery, window, document)
    </script>

@endsection
