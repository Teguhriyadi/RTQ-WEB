@extends('.app.layouts.template')

@section('app_title', 'Tambah Data Santri')

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
                <li class="breadcrumb-item">
                    <a href="{{ url('app/sistem/home') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/app/sistem/wali_santri') }}">Wali Santri</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    @yield('app_title')
                </li>
            </ol>
        </nav>
    </section>

    <div class="clearfix"></div>

    @if (empty($data_nominal_iuran))
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 m-0">
                <div class="x_content bs-example-popovers">
                    <div class="alert alert-danger alert-dismissible " role="alert">
                        <strong>Oops!</strong> Data Nominal Iuran Masih Kosong. Silahkan Klik
                        <a target="_blank" href="{{ url('/app/sistem/setting/nominal/iuran') }}"
                            style="color: white;">Disini</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        @if ($data_kelas->count() < 1)
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 m-0">
                    <div class="x_content bs-example-popovers">
                        <div class="alert alert-danger alert-dismissible " role="alert">
                            <strong>Oops!</strong> Data Kelas Masih Kosong. Silahkan Klik
                            <a target="_blank" href="{{ url('/app/sistem/kelas') }}" style="color: white;">Disini</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            @if ($data_besaran->count() < 1)
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 m-0">
                        <div class="x_content bs-example-popovers">
                            <div class="alert alert-danger alert-dismissible " role="alert">
                                <strong>Oops!</strong> Data Besaran Iuran Masih Kosong. Silahkan Klik
                                <a target="_blank" href="{{ url('/app/sistem/besaran_iuran') }}"
                                    style="color: white;">Disini</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <form action="{{ url('/app/sistem/wali_santri/create/anak/') }}" method="POST"
                    enctype="multipart/form-data" id="tambahSantri">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_wali" value="{{ $data_wali->id }}">
                    <input type="hidden" name="id_nominal_iuran" value="{{ $data_nominal_iuran->id }}">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    <center>
                                        <img src="{{ url('/gambar/gambar_user.png') }}"
                                            class="w-100 gambar-lihat img-fluid" id="tampilGambar">
                                    </center>
                                    <img class="gambar-lihat img-fluid" id="tampilGambar">
                                    <input type="file" class="form-control" name="foto" id="foto"
                                        onchange="imagePreview()">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
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
                                                <label for="nis"> NIS </label>
                                                <input type="text" class="form-control" name="nis" id="nis"
                                                    placeholder="Masukkan NIS" value="{{ old('nis') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kode_halaqah"> Halaqah </label>
                                                <select name="kode_halaqah" id="kode_halaqah" class="form-control">
                                                    <option value="">- Pilih Halaqah -</option>
                                                    @foreach ($data_halaqah as $halaqah)
                                                        <option value="{{ $halaqah->kode_halaqah }}">
                                                            {{ $halaqah->nama_halaqah }} - {{ $halaqah->getLokasiRt->lokasi_rt }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_lengkap"> Nama Lengkap </label>
                                                <input type="text" class="form-control" name="nama_lengkap"
                                                    id="nama_lengkap"
                                                    placeholder="Masukkan Nama Lengkap"value="{{ old('nama_lengkap') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_panggilan"> Nama Panggilan </label>
                                                <input type="text" class="form-control" name="nama_panggilan"
                                                    id="nama_panggilan" placeholder="Masukkan Nama Panggilan"
                                                    value="{{ old('nama_panggilan') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tempat_lahir"> Tempat Lahir </label>
                                                <input type="text" class="form-control" name="tempat_lahir"
                                                    id="tempat_lahir" placeholder="Masukkan Tempat Lahir"
                                                    value="{{ old('tempat_lahir') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tanggal_lahir"> Tanggal Lahir </label>
                                                <input type="date" class="form-control" name="tanggal_lahir"
                                                    id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sekolah"> Sekolah </label>
                                        <input type="text" class="form-control" name="sekolah" id="sekolah"
                                            placeholder="Masukkan Nama Sekolah" value="{{ old('sekolah') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="prestasi_anak"> Prestasi Anak <small class="text-danger"><i>Tidak
                                                    Wajib di Isi!</i></small> </label>
                                        <input type="text" class="form-control" name="prestasi_anak"
                                            id="prestasi_anak" placeholder="Masukkan Data Prestasi"
                                            value="{{ old('prestasi_anak') }}">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jenis_kelamin"> Jenis Kelamin </label>
                                                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                                    <option value="">- Pilih -</option>
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="id_kelas"> Kelas <small class="text-danger"><i>Tidak Wajib di
                                                            Isi!</i></small> </label>
                                                <select class="form-control" name="id_kelas" id="id_kelas">
                                                    <option value="">- Pilih -</option>
                                                    @foreach ($data_kelas as $kelas)
                                                        <option value="{{ $kelas->id }}">
                                                            {{ $kelas->nama_kelas }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat"> Alamat </label>
                                        <textarea name="alamat" class="form-control" id="alamat" rows="5" placeholder="Masukkan Data Alamat"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="id_besaran"> Besaran Iuran </label>
                                                <select name="id_besaran" class="form-control" id="id_besaran">
                                                    <option value="">- Pilih -</option>
                                                    @foreach ($data_besaran as $data)
                                                        <option value="{{ $data->id }}">
                                                            Rp. {{ number_format($data->besaran) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nominal"> Nominal </label>
                                                <input type="number" class="form-control" name="nominal" id="nominal"
                                                    placeholder="Masukkan Nominal" min="1000"
                                                    max="{{ $data_nominal_iuran->nominal }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-times"></i> Batal
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-plus"></i> Tambah
                                    </button>
                                    <a href="{{ url('/app/sistem/wali_santri') }}"
                                        class="btn btn-warning btn-sm pull-right">
                                        <i class="fa fa-sign-out"></i> Kembali Ke Halaman Sebelumnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
        @endif
    @endif

@endsection

@section('app_scripts')
    <script>
        function imagePreview() {
            const image = document.querySelector("#foto");
            const imgPreview = document.querySelector(".gambar-lihat");
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
                    $("#tambahSantri").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            nis: {
                                required: true
                            },
                            kode_halaqah: {
                                required: true
                            },
                            nama_lengkap: {
                                required: true
                            },
                            nama_panggilan: {
                                required: true
                            },
                            tempat_lahir: {
                                required: true
                            },
                            tanggal_lahir: {
                                required: true
                            },
                            sekolah: {
                                required: true
                            },
                            jenis_kelamin: {
                                required: true
                            },
                            alamat: {
                                required: true
                            },
                            foto: {
                                required: true
                            },
                            id_besaran: {
                                required: true
                            },
                            nominal: {
                                required: true
                            }
                        },
                        messages: {
                            nis: {
                                required: "Kolom NIS Harap di Isi!"
                            },
                            kode_halaqah: {
                                required: "Kolom Kode Halaqah Harap di Isi!"
                            },
                            nama_lengkap: {
                                required: "Kolom Nama Lengkap Harap di Isi!"
                            },
                            nama_panggilan: {
                                required: "Kolom Nama Panggilan Harap di Isi!"
                            },
                            tempat_lahir: {
                                required: "Kolom Tempat Lahir Harap di Isi!"
                            },
                            tanggal_lahir: {
                                required: "Kolom Tanggal Lahir Harap di Isi!"
                            },
                            sekolah: {
                                required: "Kolom Sekolah Harap di Isi!"
                            },
                            jenis_kelamin: {
                                required: "Kolom Jenis Kelamin Harap di Isi!"
                            },
                            alamat: {
                                required: "Kolom Alamat Harap di Isi!"
                            },
                            foto: {
                                required: "Kolom Foto Harap di Isi!"
                            },
                            id_besaran: {
                                required: "Kolom Besaran Iuran Harap di Isi!"
                            },
                            nominal: {
                                required: "Kolom Nominal Harap di Isi!"
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
