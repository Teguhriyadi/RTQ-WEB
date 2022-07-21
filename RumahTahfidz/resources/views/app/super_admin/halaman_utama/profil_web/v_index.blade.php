@extends('.app.layouts.template')

@section('app_title', 'Profil Web')

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
                    @if (empty($profil))
                        Tambah @yield('app_title')
                    @else
                        Edit @yield('app_title')
                    @endif
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

    @if (empty($profil))
        <form action="{{ url('/app/sistem/profil/web') }}" method="POST" enctype="multipart/form-data"
            id="tambahProfilWeb">
        @else
            <form action="{{ url('/app/sistem/profil/web/' . $profil->id) }}" method="POST" enctype="multipart/form-data"
                id="editProfilWeb">
                @method('PUT')
                <input type="hidden" name="logo_lama" value="{{ $profil->logo }}">
    @endif
    {{ csrf_field() }}
    <div class="row">
        <div class="col-12 col-md-12 col-lg-4 mb-3">
            <div class="x_panel">
                <div class="x_content">
                    <center class="mt-3">
                        @if (empty($profil))
                            <img src="{{ url('gambar/gambar_user.png') }}"
                                class="rounded-circle profile-widget-picture gambar-preview img-fluid"
                                style="height: 300px; width: 100%" id="tampilGambar">
                        @else
                            <img src="{{ $profil->logo }}"
                                class="rounded-circle profile-widget-picture gambar-preview img-fluid"
                                style="height: 250px; width: 100%" id="tampilGambar">
                        @endif
                    </center>
                    <input type="file" onchange="previewImage()" name="logo" id="image" class="form-control mt-3">
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-8 mb-3">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        @if (empty($profil))
                            <i class="fa fa-plus"></i> Tambah Data
                        @else
                            <i class="fa fa-edit"></i> Edit Data
                        @endif
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-hover">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>
                                <div class="row">
                                    <input type="text" class="form-control input-sm"
                                        value="{{ empty($profil) ? old('nama') : $profil->nama }}" name="nama"
                                        placeholder="Masukkan Nama">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Singkatan</td>
                            <td>:</td>
                            <td>
                                <div class="row">
                                    <input type="text" class="form-control"
                                        value="{{ empty($profil) ? old('singkatan') : $profil->singkatan }}"
                                        name="singkatan" placeholder="Masukkan Singkatan Profil">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <div class="row">
                                    <input type="email" class="form-control"
                                        value="{{ empty($profil) ? old('email') : $profil->email }}" name="email"
                                        placeholder="Masukkan Email">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>No. HP</td>
                            <td>:</td>
                            <td>
                                <div class="row">
                                    <input type="number" class="form-control"
                                        value="{{ empty($profil) ? old('no_hp') : $profil->no_hp }}" name="no_hp"
                                        placeholder="0" min="1">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>
                                <div class="row">
                                    <textarea name="alamat" id="alamat" class="form-control" rows="5" placeholder="Masukkan Alamat">{{ empty($profil) ? old('alamat') : $profil->alamat }}</textarea>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="ln_solid"></div>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    @if (empty($profil))
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    @else
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    @endif
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
                    $("#tambahProfilWeb").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            logo: {
                                required: true,
                                accept: true
                            },
                            nama: {
                                required: true
                            },
                            singkatan: {
                                required: true
                            },
                            no_hp: {
                                required: true
                            },
                            email: {
                                required: true
                            },
                            alamat: {
                                required: true
                            },
                        },
                        messages: {
                            logo: {
                                required: "Kolom Foto harap di isi!",
                                accept: "Masukan format gambar yang sesuai!"
                            },
                            nama: {
                                required: "Kolom Nama harap di isi!"
                            },
                            singkatan: {
                                required: "Kolom Singkatan harap di isi!"
                            },
                            no_hp: {
                                required: "Kolom Telepon harap di isi!"
                            },
                            email: {
                                required: "Kolom Email harap di isi!"
                            },
                            alamat: {
                                required: "Kolom Alamat harap di isi!"
                            },
                        },
                        submitHandler: function(form) {
                            form.submit()
                        }
                    });

                    $("#editProfilWeb").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            logo: {
                                accept: true
                            },
                            nama: {
                                required: true
                            },
                            singkatan: {
                                required: true
                            },
                            no_hp: {
                                required: true
                            },
                            email: {
                                required: true
                            },
                            alamat: {
                                required: true
                            },
                        },
                        messages: {
                            logo: {
                                accept: "Masukan format gambar yang sesuai!"
                            },
                            nama: {
                                required: "Kolom Nama harap di isi!"
                            },
                            singkatan: {
                                required: "Kolom Singkatan harap di isi!"
                            },
                            no_hp: {
                                required: "Kolom Telepon harap di isi!"
                            },
                            email: {
                                required: "Kolom Email harap di isi!"
                            },
                            alamat: {
                                required: "Kolom Alamat harap di isi!"
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
            const image = document.querySelector("#image");
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

@endsection
