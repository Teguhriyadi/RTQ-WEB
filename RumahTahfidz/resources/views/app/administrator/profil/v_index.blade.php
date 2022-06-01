@extends('.app.layouts.template')

@section('app_title', 'Profil')

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

    <form action="{{ url('/app/sistem/profil/') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-12 col-md-12 col-lg-4 mb-3">
                <div class="x_panel">
                    <div class="x_content">
                        <center class="m-3">
                            <img src="{{ url('gambar/gambar_user.png') }}"
                                class="rounded-circle profile-widget-picture gambar-preview img-fluid" id="tampilGambar">

                        </center>
                        <input type="file" onchange="previewImage()" name="logo" id="image" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-8 mb-3">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            <i class="fa fa-plus"></i> Tambah @yield('app_title')
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
                                        <input type="text" class="form-control"
                                            value="{{ empty($profil) ? '' : $profil->nama }}" name="nama"
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
                                            value="{{ empty($profil) ? '' : $profil->singkatan }}" name="singkatan"
                                            placeholder="Masukkan Singkatan Profil">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>
                                    <div class="row">
                                        <input type="email" class="form-control"
                                            value="{{ empty($profil) ? '' : $profil->email }}" name="email"
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
                                            value="{{ empty($profil) ? '' : $profil->no_hp }}" name="no_hp"
                                            placeholder="0" min="1">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>
                                    <div class="row">
                                        <textarea name="alamat" id="alamat" class="form-control" rows="5"
                                            placeholder="Masukkan Alamat">{{ empty($profil) ? '' : $profil->alamat }}</textarea>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="ln_solid"></div>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('app_scripts')

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
