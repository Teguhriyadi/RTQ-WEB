@extends('.app.layouts.template')

@section('app_title', 'Admin Cabang')

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
            <li class="breadcrumb-item"><a href="{{ url('app/sistem/home') }}">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">@yield('app_title')</li>
            <li class="breadcrumb-item active" aria-current="page">Tambah @yield('app_title')</li>
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

<form action="{{ url('/app/sistem/admin_lokasi_rt') }}" method="POST" enctype="multipart/form-data"
    id="tambahAdminCabang">
    <div class="row">
        {{ csrf_field() }}
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <center>
                        <img src="{{ url('gambar/gambar_user.png') }}" class="gambar-preview img-fluid mb-3">
                    </center>
                    <input onchange="previewImage()" type="file" class="form-control" name="gambar" id="gambar">
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-plus"></i> Tambah @yield('app_title')
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="form-group">
                        <label for="nama"> Nama </label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="email"> Email </label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Masukkan Email">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pendidikan_terakhir"> Pendidikan Terakhir </label>
                                <input type="text" class="form-control" name="pendidikan_terakhir"
                                    id="pendidikan_terakhir" placeholder="Masukkan Pendidikan Terakhir">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_kelamin"> Jenis Kelamin </label>
                                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                    <option value="">- Pilih -</option>
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat_lahir"> Tempat Lahir </label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                    placeholder="Masukkan Tempat Lahir">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_lahir"> Tanggal Lahir </label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_hp"> No. HP </label>
                                <input type="number" class="form-control" name="no_hp" id="no_hp"
                                    placeholder="Masukkan No. HP">
                            </div>
                        </div>
                        <div class="col-md-6" id="optionNyala">
                            <div class="form-group">
                                <label for="kode_rt"> Lokasi RT </label>
                                @if ($data_lokasi_rt->count() < 1)
                                    <input type="text" name="kode_input" class="form-control" id="input_kode_rt"
                                        placeholder="Masukkan Lokasi RT">
                                @else
                                    <select name="kode_rt" class="form-control" id="kode_rt">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_lokasi_rt as $data)
                                            <option value="{{ $data->kode_rt }}">
                                                {{ $data->kode_rt }}
                                            </option>
                                        @endforeach
                                        <option value="L">Lainnya</option>
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6" id="optionMati" style="display: none;">
                            <div class="form-group">
                                <label for="kode_rt"> Lokasi RT </label>
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="input_kode_rt"
                                            id="kode_rt" placeholder="Masukkan Lokasi RT">
                                    </div>
                                    <div class="col-md-2">
                                        <a class="btn btn-danger btn-sm" id="btn-nyalakan-pilihan"
                                            style="color: white;">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat"> Alamat </label>
                        <textarea name="alamat" class="form-control" id="alamat" rows="5" placeholder="Masukkan Alamat"></textarea>
                    </div>
                    <div class="ln_solid"></div>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                    <a href="{{ url('/app/sistem/admin_lokasi_rt') }}" class="btn btn-warning btn-sm pull-right">
                        <i class="fa fa-sign-out"></i> Kembali ke Halaman Sebelumnya
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@section('app_scripts')

<script>
    (function($, W, D) {
        var JQUERY4U = {};
        JQUERY4U.UTIL = {
            setupFormValidation: function() {
                $("#tambahAdminCabang").validate({
                    lang: "id",
                    ignore: "",
                    rules: {
                        nama: {
                            required: true
                        },
                        email: {
                            required: true
                        },
                        pendidikan_terakhir: {
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
                        no_hp: {
                            required: true
                        },
                        kode_rt: {
                            required: true
                        },
                        alamat: {
                            required: true
                        },
                        gambar: {
                            required: true,
                            accept: "image/*"
                        },
                    },
                    messages: {
                        nama: {
                            required: "Nama harap diisi!"
                        },
                        email: {
                            required: "Email harap diisi!"
                        },
                        pendidikan_terakhir: {
                            required: "Pendidikan harap diisi!"
                        },
                        jenis_kelamin: {
                            required: "Jenis kelamin harap diisi!"
                        },
                        tempat_lahir: {
                            required: "Tempat lahir harap diisi!"
                        },
                        tanggal_lahir: {
                            required: "Tanggal lahir harap diisi!"
                        },
                        no_hp: {
                            required: "No hp harap diisi!"
                        },
                        kode_rt: {
                            required: "Lokasi cabang harap diisi!"
                        },
                        alamat: {
                            required: "Alamat harap diisi!"
                        },
                        gambar: {
                            required: "Gambar harap diisi!",
                            accept: "Gambar harus berformat jpg/jpeg/png"
                        },
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

    $("#kode_rt").change(function() {
        if ($(this).val() == "L") {
            $("#optionNyala").hide();
            $("#optionMati").show();
        }
    });

    $("#btn-nyalakan-pilihan").click(function() {
        $("#optionNyala").show();
        $("#optionMati").hide();
        $("#kode_rt").show();
    });

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
</script>

@endsection
