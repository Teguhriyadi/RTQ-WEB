@extends(".app.layouts.template")

@section("app_title", "Data Pengajar")

@section("app_content")

<section class="section">
    <div class="section-header">
        <h1>
            @yield("app_title")
        </h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{ url('/app/admin/home') }}">Home</a>
            </div>
            <div class="breadcrumb-item">
                @yield("app_title")
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" id="btnTambah" data-target="#modalTambah" data-toggle="modal">
                        <i class="fa fa-plus"></i> Tambah Data
                    </button>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-bordered table-hover" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Nama</th>
                                    <th class="text-center">No. HP</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 0 @endphp
                                @foreach ($data_asatidz as $asatidz)
                                <tr>
                                    <td class="text-center">{{ ++$no }}.</td>
                                    <td>{{ $asatidz->nama }}</td>
                                    <td class="text-center">{{ $asatidz->telepon }}</td>
                                    <td class="text-center">
                                        <button onclick="editDataAsatidz({{ $asatidz->id }})" type="button" class="btn btn-warning" data-target="#modalEdit" data-toggle="modal">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <form action="{{ url('/app/sistem/pengajar/'.$asatidz->id) }}" method="POST" style="display: inline;">
                                            @method("DELETE")
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">
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
</section>

<!-- Tambah Data -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-plus"></i> Tambah Data
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/app/sistem/pengajar') }}" method="post" id="tambahPengajar" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="nama"> Nama </label>
                        <input type="text" name="nama" id="nama" class="form-control input-sm" placeholder="Masukkan Nama">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_kelamin"> Jenis Kelamin </label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="">- Pilih -</option>
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_hp"> No. HP </label>
                                <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukkan No. HP">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat_lahir"> Tempat Lahir </label>
                                <input type="text" class="form-control" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" name="tempat_lahir">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_lahir"> Tanggal Lahir </label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat"> Alamat </label>
                        <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control" placeholder="Masukkan Alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <img class="gambar-preview img-fluid" id="tampilGambar">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar" name="gambar" onchange="previewImage()">
                            <label class="custom-file-label" for="gambar">Upload Gambar</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Kembali</button>
                    <button type="submit" class="btn btn-primary" id="btn-tambah">
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
                    <i class="fa fa-edit"></i> Edit Data
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/app/sistem/pengajar/simpan') }}" method="post" enctype="multipart/form-data" id="editPengajar">
                @method("PUT")
                @csrf
                <div class="modal-body" id="modal-content-edit">

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Kembali</button>
                    <button type="submit" class="btn btn-success" id="btn-edit">
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

    function editDataAsatidz(id)
    {
        $.ajax({
            url : "{{ url('/app/sistem/pengajar/edit') }}",
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
