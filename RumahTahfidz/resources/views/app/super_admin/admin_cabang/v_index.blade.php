@extends(".app.layouts.template")

@section("app_title", "Admin Cabang")

@section("app_content")

<section class="section">
    <div class="section-header">
        <h1>
            @yield("app_title")
        </h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{ url('/app/sistem/home') }}">Home</a>
            </div>
            <div class="breadcrumb-item">
                @yield("app_title")
            </div>
        </div>
    </div>

    @if ($data_cabang)
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" data-target="#modalTambah" data-toggle="modal" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Nama</th>
                                    <th>Cabang</th>
                                    <th>No. HP</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 0 @endphp
                                @foreach($data_admin_cabang as $admin_cabang)
                                <tr>
                                    <td class="text-center">{{ ++$no }}.</td>
                                    <td>{{ $admin_cabang->getUser->nama }}</td>
                                    <td>{{ $admin_cabang->getCabang->nama_cabang }}</td>
                                    <td>{{ $admin_cabang->getUser->no_hp }}</td>
                                    <td class="text-center">
                                        <button onclick="editAdminCabang({{ $admin_cabang->id }})" type="button" class="btn btn-warning btn-sm" data-target="#modalEdit" data-toggle="modal">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <form action="{{ url('/app/sistem/admin_cabang/'.$admin_cabang->id) }}" method="POST" style="display: inline;">
                                            @method("DELETE")
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-danger alert-has-icon">
                        <div class="alert-icon">
                            <i class="fa fa-times"></i>
                        </div>
                        <div class="alert-body">
                            <div class="alert-title">
                                Maaf, Data <b>Cabang</b> Kosong
                            </div>
                            Silahkan klik <a href="{{ url('/app/sistem/cabang') }}">ini</a> untuk beralih ke halaman Cabang
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Tambah Data -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-plus"></i>
                    <span>Tambah Data</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/app/sistem/admin_cabang') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama"> Nama </label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="email"> Email </label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pendidikan_terakhir"> Pendidikan Terakhir </label>
                                <input type="text" class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" placeholder="Masukkan Pendidikan Terakhir">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_kelamin"> Jenis Kelamin </label>
                                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                    <option value="">- Pilih -</option>
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat_lahir"> Tempat Lahir </label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_lahir"> Tanggal Lahir </label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_hp"> No. HP </label>
                                <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan No. HP">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_cabang"> Cabang </label>
                                <select name="id_cabang" class="form-control" id="id_cabang">
                                    <option value="">- Pilih -</option>
                                    @foreach ($cabang as $data)
                                    <option value="{{ $data->id }}">
                                        {{ $data->nama_cabang }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat"> Alamat </label>
                        <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="10" placeholder="Masukkan Alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar"> Gambar </label>
                        <img class="gambar-preview img-fluid">
                        <input onchange="previewImage()" type="file" class="form-control" name="gambar" id="gambar">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- Edit Data -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalEdit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-edit"></i>
                    <span>Edit Data</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/app/sistem/admin_cabang/simpan') }}" method="POST">
                @method("PUT")
                @csrf
                <div class="modal-body" id="modal-content-edit">

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

@endsection

@section("app_scripts")

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

    function editAdminCabang(id) {
        $.ajax({
            url : "{{ url('/app/sistem/admin_cabang/edit') }}",
            type : "GET",
            data : { id : id },
            success : function(data) {
                $("#modal-content-edit").html(data);
                return true;
            }
        });
    }

    $(document).ready(function() {
        $("#table-1").dataTable();
    })

</script>

@endsection
