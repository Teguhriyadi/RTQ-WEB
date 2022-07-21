@extends('.app.layouts.template')

@section('app_title', 'Tambah Asatidz')

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
                    <a href="{{ url('/app/sistem/asatidz') }}">Asatidz</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">@yield('app_title')</li>
            </ol>
        </nav>
    </section>

    <div class="clearfix"></div>

    <div class="row">
        <form action="{{ url('/app/sistem/asatidz') }}" method="POST" enctype="multipart/form-data" id="tambahAsatidz">
            {{ csrf_field() }}
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <center>
                            <img src="{{ url('/gambar/gambar_user.png') }}" class="gambar-preview mb-3 img-fluid"
                                id="tampilGambar">
                        </center>
                        <input onchange="previewImage()" type="file" class="form-control" name="gambar" id="gambar">
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            <i class="fa fa-plus"></i> Tambah
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nomor_induk"> Nomor Induk </label>
                                    <input type="text" class="form-control" name="nomor_induk" id="nomor_induk"
                                        placeholder="Masukkan Nomor Induk">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="no_ktp"> No. KTP <small class="text-danger"><i>Tidak Wajib di
                                                Isi!</i></small> </label>
                                    <input type="text" class="form-control" name="no_ktp" id="no_ktp"
                                        placeholder="Masukkan No. KTP">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pendidikan_terakhir"> Pendidikan Terakhir <small
                                            class="text-danger"><i>Tidak Wajib di Isi!</i></small> </label>
                                    <input type="text" class="form-control" name="pendidikan_terakhir"
                                        id="pendidikan_terakhir" placeholder="Masukkan Pendidikan Terakhir">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama"> Nama </label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        placeholder="Masukkan Nama">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email"> Email <small class="text-danger"><i>Tidak Wajib di
                                                Isi!</i></small> </label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Masukkan Email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tempat_lahir"> Tempat Lahir </label>
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                        placeholder="Masukkan Tempat Lahir">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tanggal_lahir"> Tanggal Lahir </label>
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="jenis_kelamin"> Jenis Kelamin </label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option value="">- Pilih -</option>
                                        <option value="L">Laki - Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="no_hp"> No. Handphone </label>
                                    <input type="number" class="form-control" name="no_hp" id="no_hp"
                                        placeholder="0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="aktivitas_utama"> Aktivitas Utama <small class="text-danger"><i>Tidak
                                                Wajib di Isi!</i></small> </label>
                                    <input type="text" class="form-control" name="aktivitas_utama"
                                        id="aktivitas_utama" placeholder="Masukkan Aktivitas Utama">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="motivasi_mengajar"> Motivasi Mengajar <small class="text-danger"><i>Tidak
                                                Wajib di Isi!</i></small> </label>
                                    <input type="text" class="form-control" name="motivasi_mengajar"
                                        id="motivasi_mengajar" placeholder="Masukkan Motivasi Mengajar">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="alamat"> Alamat </label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="5" placeholder="Masukkan Alamat"></textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-times"></i> Batal
                            </button>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i> Tambah
                            </button>
                            <div class="pull-right">
                                <a href="{{ url('/app/sistem/asatidz') }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-sign-in"></i> Kembali ke Halaman Sebelumnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('app_scripts')

    <script>
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
                    $("#tambahAsatidz").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            nomor_induk: {
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
                                required: true
                            },
                            alamat: {
                                required: true
                            },
                            gambar: {
                                required: true
                            }
                        },
                        messages: {
                            nomor_induk: {
                                required: "Nomor Induk Harap di Isi!"
                            },
                            nama: {
                                required: "Nama Harus di Isi!"
                            },
                            tempat_lahir: {
                                required: "Tempat Lahir Harap di Isi!"
                            },
                            tanggal_lahir: {
                                required: "Tanggal Lahir Harap di Isi!"
                            },
                            jenis_kelamin: {
                                required: "Jenis Kelamin Harap di Pilih!"
                            },
                            no_hp: {
                                required: "No HP Harap di Isi!"
                            },
                            alamat: {
                                required: "Alamat Harap di Isi!"
                            },
                            gambar: {
                                required: "Gambar Harap di Isi!"
                            }
                        },
                        submitHandler: function(form) {
                            form.submit()
                        }
                    });

                    $("#editKelas").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            nama_kelas: {
                                required: true
                            },
                        },
                        messages: {
                            nama_kelas: {
                                required: "Kelas harap di isi!"
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

@endsection
