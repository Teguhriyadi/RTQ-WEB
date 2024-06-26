@extends('.app.layouts.template')

@section('app_title', 'Profil User')

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

    <div class="row">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="x_panel">
                <div class="x_content">
                    <center>
                        <img src="{{ $user->gambar }}"
                            onerror="this.onerror=null; this.src='{{ url('gambar/no-images.png') }}'"
                            class="rounded-circle profile-widget-picture shadow-lg" height="250" width="250">
                        <h3>{{ $user->nama }}</h3>
                        <div class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div>
                            {{ $user->getAkses->getRole->keterangan }}
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-12 pb-2">
                                <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal"
                                    data-target="#modalGambarProfil">
                                    <i class="fa fa-edit"></i> Edit Gambar Profil
                                </button>
                            </div>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-success btn-sm btn-block" data-toggle="modal"
                                    data-target="#modalGantiPassword">
                                    <i class="fa fa-edit"></i> Edit Password
                                </button>
                            </div>
                        </div>
                    </center>

                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-edit"></i> Edit @yield('app_title')
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                value="{{ $user->nama }}" placeholder="Masukkan Nama">
                            <div class="invalid-feedback">
                                Please fill in the first name
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-7 col-12">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ $user->email }}" placeholder="Masukkan Email">
                            <div class="invalid-feedback">
                                Please fill in the email
                            </div>
                        </div>
                        <div class="form-group col-md-5 col-12">
                            <label for="no_hp"> No. Handphone </label>
                            <input type="number" class="form-control" name="no_hp" id="no_hp"
                                value="{{ $user->no_hp }}" placeholder="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label for="tempat_lahir"> Tempat Lahir </label>
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                value="{{ $user->tempat_lahir }}" placeholder="Masukkan Tempat Lahir">
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label for="tanggal_lahir"> Tanggal Lahir </label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                value="{{ $user->tanggal_lahir }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="alamat"> Alamat </label>
                            <textarea class="form-control" rows="5" placeholder="Masukkan Alamat">{{ $user->alamat }}</textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="pull-right">
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gambar Profil -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalGambarProfil">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa fa-edit"></i> Edit Data
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/app/sistem/profil/user/simpan_gambar_profil') }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <input type="hidden" name="oldGambarProfil" value="{{ $user->gambar }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="gambar_profil"> Gambar Profil </label>
                            <img class="gambar-preview img-fluid" id="tampilGambar">
                            <input onchange="previewImage()" type="file" class="form-control" name="gambar"
                                id="gambar">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                            <i class="fa fa-times"></i> Kembali
                        </button>
                        <button type="submit" class="btn btn-sm btn-primary" id="btn-tambah">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END -->

    <!-- Ganti Password -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalGantiPassword">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa fa-edit"></i> Edit Data
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/app/sistem/profil/user/ganti_password') }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="password_lama"> Password Lama </label>
                            <input type="password" class="form-control" name="password_lama" id="password_lama" placeholder="Masukkan Password Lama">
                        </div>
                        <div class="form-group">
                            <label for="password_baru"> Password Baru </label>
                            <input type="password" class="form-control" name="password_baru" id="password_baru" placeholder="Masukkan Password Baru">
                        </div>
                        <div class="form-group">
                            <label for="konfirmasi_password"> Konfirmasi Password </label>
                            <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password" placeholder="Masukkan Konfirmasi Password">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                            <i class="fa fa-times"></i> Kembali
                        </button>
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END -->

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
    </script>

@endsection
