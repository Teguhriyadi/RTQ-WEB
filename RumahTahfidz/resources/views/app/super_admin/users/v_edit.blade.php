@extends('app.layouts.template')

@section('app_title', 'Edit User')

@section('app_content')
    <section class="section">
        <h3>
            @yield('app_title') {{ $user->nama }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('app/sistem/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('app/sistem/users') }}">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">@yield('app_title')</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $user->nama }}</li>
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
    <form action="{{ url('app/sistem/users/' . $user->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-md-4 col-sm-4  profile_left">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="form-group">
                            <label for="gambar"> Gambar </label>
                            <img src="{{ $user->gambar }}" class="gambar-preview img-fluid" id="tampilGambar"
                                style="width: 100%">
                            <input type="file" class="form-control mt-3" name="gambar" id="gambar"
                                onchange="previewImage()">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-8 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            <i class="fa fa-edit"></i> Edit
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="form-group">
                            <label for="nama"> Nama </label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                placeholder="Masukkan Nama" value="{{ $user->nama }}">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email"> Email </label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Masukkan Email" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_kelamin"> Jenis Kelamin </label>
                                    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                        <option value="">- Pilih -</option>
                                        <option value="L" {{ $user->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki -
                                            Laki
                                        </option>
                                        <option value="P" {{ $user->jenis_kelamin == 'P' ? 'selected' : '' }}>
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
                                        placeholder="Masukkan Tempat Lahir" value="{{ $user->tempat_lahir }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir"> Tanggal Lahir </label>
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                        value="{{ $user->tanggal_lahir }}">
                                </div>
                            </div>
                        </div>
                        @if ($user->getAdminLokasiRt->kode_rt == 'NULL')
                        @else
                            @if ($user->getAdminLokasiRt)
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pendidikan_terakhir"> Pendidikan Terakhir </label>
                                            <input type="text" class="form-control" name="pendidikan_terakhir"
                                                id="pendidikan_terakhir" placeholder="Masukkan Tempat Lahir"
                                                value="{{ $user->getAdminLokasiRt->pendidikan_terakhir }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kode_rt"> Rumah Tahfidz Cabang </label>
                                            <select class="form-control" name="kode_rt" id="kode_rt">
                                                <option value="">- Pilih Cabang -</option>
                                                @foreach ($lokasi_rt as $rt)
                                                    <option value="{{ $rt->kode_rt }}"
                                                        {{ $rt->kode_rt == $user->getAdminLokasiRt->kode_rt ? 'selected' : '' }}>
                                                        {{ $rt->lokasi_rt }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($user->getAsatidz)
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nomor_induk"> No. NIP </label>
                                            <input type="text" class="form-control" name="nomor_induk"
                                                id="nomor_induk" placeholder="Masukkan Tempat Lahir"
                                                value="{{ $user->getAsatidz->nomor_induk }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_ktp"> No. KTP </label>
                                            <input type="text" class="form-control" name="no_ktp" id="no_ktp"
                                                placeholder="Masukkan Tempat Lahir"
                                                value="{{ $user->getAsatidz->no_ktp }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="aktivitas_utama"> Aktivitas Utama </label>
                                            <input type="text" class="form-control" name="aktivitas_utama"
                                                id="aktivitas_utama" placeholder="Masukkan Tempat Lahir"
                                                value="{{ $user->getAsatidz->aktivitas_utama }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="motivasi_mengajar"> Motivasi Mengajar </label>
                                            <input type="text" class="form-control" name="motivasi_mengajar"
                                                id="motivasi_mengajar" placeholder="Masukkan Tempat Lahir"
                                                value="{{ $user->getAsatidz->motivasi_mengajar }}">
                                        </div>
                                    </div>
                                </div>
                            @elseif ($user->getWaliSantri)
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_ktp"> No. KTP </label>
                                            <input type="text" class="form-control" name="no_ktp" id="no_ktp"
                                                placeholder="Masukkan Tempat Lahir"
                                                value="{{ $user->getWaliSantri->no_ktp }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_kk"> No. KK </label>
                                            <input type="text" class="form-control" name="no_kk" id="no_kk"
                                                placeholder="Masukkan Tempat Lahir"
                                                value="{{ $user->getWaliSantri->no_kk }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pekerjaan"> Pekerjaan </label>
                                            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan"
                                                placeholder="Masukkan Tempat Lahir"
                                                value="{{ $user->getWaliSantri->pekerjaan }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_kk"> Rumah Tahfidz Cabang </label>
                                            <input type="text" class="form-control" disabled
                                                placeholder="Masukkan Tempat Lahir"
                                                value="{{ $user->getWaliSantri->getHalaqah->getLokasiRt->lokasi_rt }}">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif

                        <div class="form-group">
                            <label for="alamat"> Alamat </label>
                            <textarea name="alamat" class="form-control" id="alamat" rows="5" placeholder="Masukkan Alamat">{{ $user->alamat }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_hp"> No. HP </label>
                            <input type="number" class="form-control" disabled value="{{ $user->no_hp }}">
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a href="{{ url('app/sistem/users') }}" class="btn btn-sm btn-warning"><i
                                            class="fa fa-sign-out"></i> Kembali</a>
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-refresh"></i> Batal</button>
                                    <button class="btn btn-sm btn-success"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
                    $("#tambahUser").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            nama: {
                                required: true
                            },
                            email: {
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
                            gambar: {
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
                            no_hp: {
                                required: "No. HP harap diisi!"
                            },
                            jenis_kelamin: {
                                required: "Jenis Kelamin harap diisi!"
                            },
                            tempat_lahir: {
                                required: "Tempat Lahir harap diisi!"
                            },
                            tanggal_lahir: {
                                required: "Tanggal Lahir harap diisi!"
                            },
                            alamat: {
                                required: "Alamat harap diisi!"
                            },
                            gambar: {
                                accept: "Gambar harus berformat .jpg/.jpeg/.png"
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
    </script>
@endsection
