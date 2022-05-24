@extends('.app.layouts.template')

@section('app_title', 'Profil Web')

@section('app_content')

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

        <div class="section-body">
            <div class="mt-sm-4">
                @if (empty($profil))
                    <form action="{{ url('app/sistem/setting/web') }}" class="row" method="post"
                        enctype="multipart/form-data">
                    @else
                        <form action="{{ url('app/sistem/setting/web/' . $profil->id) }}" class="row"
                            method="post" enctype="multipart/form-data">
                            @method('PUT')
                            <input type="hidden" name="logo_lama" value="{{ empty($profil) ? '' : $profil->logo }}">
                @endif
                @csrf
                <div class="col-12 col-md-12 col-lg-4 mb-3">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <center class="m-3">
                                @if (empty($profil))
                                    <img src="{{ url('gambar/gambar_user.png') }}"
                                        class="rounded-circle profile-widget-picture gambar-preview " id="tampilGambar">
                                @else
                                    <img src="{{ url('storage/' . $profil->logo) }}"
                                        class="rounded-circle profile-widget-picture gambar-preview img-fluid"
                                        id="tampilGambar">
                                @endif
                                <div class="profile-widget-description">
                                    <div class="m-3">
                                        <input type="file" onchange="previewImage()" name="logo" id="image"
                                            class="form-control">
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>
                                    @if (empty($profil))
                                        <i class="fa fa-plus"></i> Tambah Profil WEB
                                    @else
                                        <i class="fa fa-edit"></i> Edit Profil WEB
                                    @endif
                                </h5>
                            </div>
                        </div>
                        <div class="card-body">
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
                        </div>
                        <div class="card-footer">
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
                </form>
            </div>
        </div>
    </section>

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
