@extends(".app.layouts.template")

@section("app_title", "Edit Asatidz")

@section("app_content")

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
                @yield("app_title")
            </h3>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    <i class="fa fa-pencil"></i> Edit
                </h2>
                <div class="clearfix"></div>
            </div>
            <form action="{{ url('/app/sistem/asatidz/simpan') }}" method="POST">
                <div class="x_content">
                    @method("PUT")
                    @csrf
                    <input type="hidden" name="id" value="{{ $edit->id }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nomor_induk"> Nomor Induk </label>
                                <input type="text" class="form-control" name="nomor_induk" id="nomor_induk" placeholder="Masukkan Nomor Induk" value="{{ $edit->nomor_induk }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_ktp"> No. KTP </label>
                                <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="Masukkan No. KTP" value="{{ $edit->no_ktp }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama"> Nama </label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="{{ $edit->getUser->nama }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email"> Email </label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" value="{{ $edit->getUser->email }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pendidikan_terakhir"> Pendidikan Terakhir </label>
                                <input type="text" class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" placeholder="Masukkan Pendidikan Terakhir" value="{{ $edit->pendidikan_terakhir }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tempat_lahir"> Tempat Lahir </label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="{{ $edit->getUser->tempat_lahir }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tanggal_lahir"> Tanggal Lahir </label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ $edit->getUser->tanggal_lahir }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="jenis_kelamin"> Jenis Kelamin </label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="">- Pilih -</option>
                                    <option value="L" {{ $edit->getUser->jenis_kelamin == "L" ? "selected" : "" }} >Laki - Laki</option>
                                    <option value="P" {{ $edit->getUser->jenis_kelamin == "P" ? "selected" : "" }} >Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="no_hp"> No. Handphone </label>
                                <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="0" value="{{ $edit->getUser->no_hp }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="aktivitas_utama"> Aktivitas Utama </label>
                                <textarea name="aktivitas_utama" id="aktivitas_utama" class="form-control" rows="5" placeholder="Masukkan Aktivitas Utama">{{ $edit->aktivitas_utama }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="motivasi_mengajar"> Motivasi Mengajar </label>
                                <textarea name="motivasi_mengajar" id="motivasi_mengajar" class="form-control" rows="5" placeholder="Masukkan Motivasi Mengajar">{{ $edit->motivasi_mengajar }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alamat"> Alamat </label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="5" placeholder="Masukkan Alamat">{{ $edit->getUser->alamat }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger">
                            <i class="fa fa-times"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <div class="pull-right">
                            <a href="{{ url('/app/sistem/asatidz') }}" class="btn btn-warning">
                                <i class="fa fa-sign-in"></i> Kembali ke Halaman Sebelumnya
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
