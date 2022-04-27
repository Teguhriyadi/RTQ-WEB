@php
    use Carbon\Carbon;
@endphp
@extends(".app.layouts.template")

@section("app_title", "Edit Santri " . $santri->nama_lengkap)

@section("app_content")

<section class="section">
    <h3>
        @yield("app_title")
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('app/sistem/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('app/sistem/profil_santri') }}">Profil Santri</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('app_title')</li>
        </ol>
    </nav>

    <div class="section-body">
        <div class="mt-sm-4">
            <form action="{{ url('app/sistem/profil_santri/'.$santri->id) }}" class="row" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="col-12 col-md-12 col-lg-4 mb-3">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <center class="m-3">
                                <img src="{{ url('gambar/gambar_user.png') }}" class="rounded-circle profile-widget-picture gambar-preview " id="tampilGambar">
                                <div class="profile-widget-description">
                                    <div class="m-3">
                                        <input type="file" onchange="previewImage()" name="image" id="image" class="form-control">
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
                                <h5>Edit Profil</h5>

                                <a href="{{ url('app/sistem/profil_santri') }}" class="btn btn-warning d-sm-inline d-none">Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <tr>
                                    <td>NIS</td>
                                    <td>:</td>
                                    <td>
                                        <div class="row">
                                            <input type="text" class="form-control" value="{{ $santri->nis }}" name="nis">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Panggilan</td>
                                    <td>:</td>
                                    <td>
                                        <div class="row">
                                            <input type="text" class="form-control" value="{{ $santri->nama_panggilan }}" name="nama_panggilan">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>:</td>
                                    <td>
                                        <div class="row">
                                            <input type="text" class="form-control" value="{{ $santri->nama_lengkap }}" name="nama_lengkap">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tempat, Tanggal Lahir</td>
                                    <td>:</td>
                                    <td>
                                        <div class="row">
                                            <input type="text" class="form-control col-lg-6 mb-3" value="{{ $santri->tempat_lahir }}" name="tempat_lahir">
                                            <input type="date" class="form-control col-lg-6" value="{{ $santri->tanggal_lahir }}" name="tanggal_lahir">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Asal Sekolah</td>
                                    <td>:</td>
                                    <td>
                                        <div class="row">
                                            <input type="text" value="{{ $santri->sekolah }}" name="sekolah" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>:</td>
                                    <td>
                                        <div class="row">
                                            <select name="id_kelas" class="form-control">
                                                @foreach ($data_kelas as $kelas)
                                                <option value="{{ $kelas->id }}" {{ $kelas->id == $santri->id_kelas ? 'selected' : '' }}>{{ $kelas->nama_kelas }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>
                                        <div class="row">
                                            <textarea name="alamat" id="alamat" class="form-control">{{ $santri->alamat }}</textarea>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@section("app_scripts")

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
