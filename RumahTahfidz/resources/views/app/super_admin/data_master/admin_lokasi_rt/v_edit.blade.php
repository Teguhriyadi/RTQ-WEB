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
            <li class="breadcrumb-item"><a href="{{ url('/app/sistem/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/app/sistem/admin_lokasi_rt') }}">@yield('app_title')</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit @yield('app_title')</li>
        </ol>
    </nav>
</section>

<div class="clearfix"></div>

<form action="{{ url('/app/sistem/admin_lokasi_rt/' . encrypt($edit->getUser->id)) }}" method="POST"
    enctype="multipart/form-data" id="editAdminCabang">
    <div class="row">
        @method('PUT')
        {{ csrf_field() }}
        @php
            $str = $edit->getUser->gambar;
            $hasil = trim($str, url('/'));

            $print = substr($hasil, 8);
        @endphp
        <input type="hidden" name="gambarLama" value="{{ $print }}">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <center>
                        @if (empty($edit->getUser->gambar))
                            <img src="{{ url('gambar/gambar_user.png') }}" class="gambar-preview img-fluid mb-3">
                        @else
                            <img src="{{ $edit->getUser->gambar }}" class="gambar-preview img-fluid" id="tampilGambar"
                                width="100%" height="300px">
                        @endif
                    </center>
                    <input onchange="previewImage()" type="file" class="form-control mt-3" name="gambar"
                        id="gambar">
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-pencil"></i> Edit @yield('app_title')
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-group">
                        <label for="nama"> Nama </label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            placeholder="Masukkan Nama" value="{{ $edit->getUser->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="email"> Email <small class="text-danger"><i>Tidak Wajib di Isi</i></small>
                        </label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Masukkan Email" value="{{ $edit->getUser->email }}">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pendidikan_terakhir"> Pendidikan Terakhir <small
                                        class="text-danger"><i>Tidak Wajib di Isi</i></small> </label>
                                <input type="text" class="form-control" name="pendidikan_terakhir"
                                    id="pendidikan_terakhir" placeholder="Masukkan Pendidikan Terakhir"
                                    value="{{ $edit->pendidikan_terakhir }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_kelamin"> Jenis Kelamin </label>
                                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                    <option value="">- Pilih -</option>
                                    <option value="L"
                                        {{ $edit->getUser->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                        Laki - Laki
                                    </option>
                                    <option value="P"
                                        {{ $edit->getUser->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat_lahir"> Tempat Lahir </label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                    placeholder="Masukkan Tempat Lahir" value="{{ $edit->getUser->tempat_lahir }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_lahir"> Tanggal Lahir </label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                    value="{{ $edit->getUser->tanggal_lahir }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_hp"> No. HP </label>
                                <input type="number" class="form-control" name="no_hp" id="no_hp"
                                    placeholder="Masukkan No. HP" value="{{ $edit->getUser->no_hp }}">
                            </div>
                        </div>
                        <div class="col-md-6" id="optionNyala">
                            <div class="form-group">
                                <label for="kode_rt"> Lokasi RT </label>
                                @if ($lokasi_rt->count() < 1)
                                    <input type="text" name="input_kode_rt" class="form-control"
                                        id="input_kode_rt" placeholder="Masukkan Lokasi RT">
                                @else
                                    <select name="edit_pilihan" class="form-control" id="edit_pilihan">
                                        <option value="">- Pilih -</option>
                                        @foreach ($lokasi_rt as $data)
                                            <option value="{{ $data->kode_rt }}"
                                                {{ $edit->kode_rt == $data->kode_rt ? 'selected' : '' }}>
                                                {{ $data->kode_rt }} - {{ $data->lokasi_rt }}
                                            </option>
                                        @endforeach
                                        <option value="L">Lainnya</option>
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6" id="optionMati" style="display: none;">
                            <div class="form-group">
                                <label for="edit_lokasi_rt"> Lokasi RT </label>
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="edit_lokasi_rt"
                                            id="edit_lokasi_rt" placeholder="Masukkan Lokasi RT">
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
                        <textarea name="alamat" class="form-control" id="alamat" rows="5" placeholder="Masukkan Alamat">{{ $edit->getUser->alamat }}</textarea>
                    </div>
                    <div class="ln_solid"></div>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                    <a href="{{ url('/app/sistem/admin_lokasi_rt') }}" class="btn btn-warning btn-sm pull-right">
                        <i class="fa fa-sign-out"></i> Kembali ke halaman sebelumnya
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
                $("#editAdminCabang").validate({
                    lang: "id",
                    ignore: "",
                    rules: {
                        nama: {
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
                        kode_input: {
                            required: true
                        },
                        kode_rt: {
                            required: true
                        },
                        input_kode_rt: {
                            required: true
                        },
                        alamat: {
                            required: true
                        },
                    },
                    messages: {
                        nama: {
                            required: "Kolom Nama harap di isi!"
                        },
                        jenis_kelamin: {
                            required: "Kolom Jenis Kelamin harap di isi!"
                        },
                        tempat_lahir: {
                            required: "Kolom Tempat Lahir harap di isi!"
                        },
                        tanggal_lahir: {
                            required: "Kolom Tanggal Lahir harap di isi!"
                        },
                        no_hp: {
                            required: "Kolom No HP harap di isi!"
                        },
                        kode_input: {
                            required: "Kolom Lokasi Cabang harap di isi!"
                        },
                        kode_rt: {
                            required: "Kolom Lokasi Cabang harap di isi!"
                        },
                        input_kode_rt: {
                            required: "Kolom Lokasi Cabang harap di isi!"
                        },
                        alamat: {
                            required: "Kolom Alamat harap di isi!"
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

    $("#edit_pilihan").change(function() {
        if ($(this).val() == "L") {
            $("#optionNyala").hide();
            $("#optionMati").show();
        }
    });

    $("#btn-nyalakan-pilihan").click(function() {
        $("#optionNyala").show();
        $("#optionMati").hide();
        $("#input_kode_rt").show();
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
