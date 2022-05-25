@extends('.app.layouts.template')

@section('app_title', 'Tentang Kami')

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

        <div class="section-body">
            <div class="mt-sm-4">
                @if (empty($profil))
                    <form action="{{ url('app/sistem/tentang_kami') }}" class="row" method="post"
                        enctype="multipart/form-data">
                    @else
                        <form action="{{ url('app/sistem/tentang_kami/' . $profil->id) }}" class="row"
                            method="post" enctype="multipart/form-data">
                            @method('PUT')
                            <input type="hidden" name="foto_lama" value="{{ $profil->foto }}">
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
                                    <img src="{{ url('/storage/' . $profil->foto) }}"
                                        class="rounded-circle profile-widget-picture gambar-preview img-fluid"
                                        id="tampilGambar">
                                @endif

                                <div class="profile-widget-description">
                                    <div class="m-3">
                                        <input type="file" onchange="previewImage()" name="foto" id="image"
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
                                @if (empty($profil))
                                    <h5>
                                        <i class="fa fa-plus"></i> Tambah @yield('app_title')
                                    </h5>
                                @else
                                    <h5>
                                        <i class="fa fa-edit"></i> Edit @yield('app_title')
                                    </h5>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td>
                                        <div class="row">
                                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5"
                                                placeholder="Masukkan Deskripsi">{{ empty($profil) ? '' : $profil->deskripsi }}</textarea>
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
