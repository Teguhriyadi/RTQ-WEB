@extends('.app.layouts.template')

@section('app_title', 'Tambah Wali Santri')

@section('app_css')

    <style>
        th.dt-center,
        td.dt-center {
            text-align: center;
        }
    </style>

@endsection

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
                <li class="breadcrumb-item">
                    <a href="{{ url('/app/sstw') }}">Wali Santri</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    @yield('app_title')
                </li>
            </ol>
        </nav>
    </section>
    <div class="clearfix"></div>

    <form action="{{ url('/app/sistem/wali_santri') }}" method="POST" enctype="multipart/form-data" id="tambahWaliSantri">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <center>
                            <img src="{{ url('/gambar/gambar_user.png') }}" class="img-fluid gambar-preview"
                                id="tampilGambar">
                        </center>
                        <input onchange="previewImage()" type="file" class="form-control mt-3" name="gambar"
                            id="gambar">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            <i class="fa fa-plus"></i> @yield('app_title')
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_ktp"> No. KTP
                                        <small class="text-danger">
                                            <i>Tidak Wajib di Isi!</i>
                                        </small>
                                    </label>
                                    <input type="text" class="form-control" name="no_ktp" id="no_ktp"
                                        placeholder="Masukkan No. KTP">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama"> No. KK
                                        <small class="text-danger">
                                            <i>Tidak Wajib di Isi!</i>
                                        </small>
                                    </label>
                                    <input type="text" class="form-control" name="no_kk" id="no_kk"
                                        placeholder="Masukkan No. KK">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nama"> Nama </label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    placeholder="Masukkan Nama" value="{{ old('nama') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="pekerjaan"> Pekerjaan </label>
                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan"
                                    placeholder="Masukkan Pekerjaan" value="{{ old('pekerjaan') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email"> Email <small class="text-danger"><i>Tidak Wajib di
                                                Isi!</i></small> </label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Masukkan Email" value="{{ old('email') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_hp"> No. HP </label>
                                    <input type="number" class="form-control" name="no_hp" id="no_hp"
                                        placeholder="Masukkan No. HP" value="{{ old('no_hp') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_kelamin"> Jenis Kelamin </label>
                                    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                        <option value="">- Pilih -</option>
                                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki
                                            - Laki</option>
                                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tempat_lahir"> Tempat Lahir </label>
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                        placeholder="Masukkan Tempat Lahir" value="{{ old('tempat_lahir') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir"> Tanggal Lahir </label>
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                        value="{{ old('tanggal_lahir') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat"> Alamat </label>
                            <textarea name="alamat" class="form-control" id="alamat" rows="5" placeholder="Masukkan Alamat">{{ old('alamat') }}</textarea>
                        </div>
                        <div class="ln_solid"></div>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Simpan
                        </button>
                        <a href="{{ url('/app/sistem/wali_santri') }}" class="btn btn-warning btn-sm pull-right">
                            <i class="fa fa-sign-out"></i> Kembali ke Halaman Sebelumnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('app_scripts')

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

        (function($, W, D) {
            var JQUERY4U = {};
            JQUERY4U.UTIL = {
                setupFormValidation: function() {
                    $("#tambahWaliSantri").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            no_ktp: {
                                number: true,
                                minlength: 16
                            },
                            no_kk: {
                                number: true,
                                minlength: 16
                            },
                            pekerjaan: {
                                required: true
                            },
                            nama: {
                                required: true
                            },
                            tempat_lahir: {
                                required: true
                            },
                            tanggal_lahir: {
                                required: true
                            },
                            jenis_kelamin: {
                                required: true
                            },
                            no_hp: {
                                required: true,
                                number: true,
                                minlength: 12
                            },
                            alamat: {
                                required: true
                            },
                            gambar: {
                                required: true
                            }
                        },
                        messages: {
                            no_ktp: {
                                number: "No. KTP Harus Angka",
                                minlength: "No. KTP Minimal Harus 16 Angka"
                            },
                            no_kk: {
                                number: "No. KK Harus Angka",
                                minlength: "No. KK Minimal Harus 16 Angka"
                            },
                            pekerjaan: {
                                required: "Kolom Pekerjaan Harap di Isi!"
                            },
                            nama: {
                                required: "Kolom Nama Harus di Isi!"
                            },
                            tempat_lahir: {
                                required: "Kolom Tempat Lahir Harap di Isi!"
                            },
                            tanggal_lahir: {
                                required: "Kolom Tanggal Lahir Harap di Isi!"
                            },
                            jenis_kelamin: {
                                required: "Kolom Jenis Kelamin Harap di Pilih!"
                            },
                            no_hp: {
                                required: "Kolom No HP Harap di Isi!",
                                number: "No. HP Harus Angka"
                            },
                            alamat: {
                                required: "Kolom Alamat Harap di Isi!"
                            },
                            gambar: {
                                required: "Kolom Gambar Harap di Isi!"
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
