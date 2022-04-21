@extends(".app.layouts.template")

@section("app_title", "Data Wali Santri")

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
        <div class="col">
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
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">No. HP</th>
                                    <th class="text-center">Jumlah Anak</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 0 @endphp
                                @foreach ($data_wali as $wali)
                                <tr>
                                    <td class="text-center">{{ ++$no }}.</td>
                                    <td>{{ $wali->nik }}</td>
                                    <td>{{ $wali->getUser->nama }}</td>
                                    <td class="text-center">
                                        @if ($wali->getUser->jenis_kelamin == "L")
                                            Laki - Laki
                                        @elseif($wali->getUser->jenis_kelamin == "P")
                                            Perempuan
                                        @else
                                            Tidak Ada
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $wali->getUser->no_hp }}</td>
                                    <td class="text-center">
                                        @php
                                            $count = $data_santri->where("id_wali", $wali->id)->count();
                                            echo $count;
                                        @endphp
                                    </td>
                                    <td class="text-center">
                                        <button onclick="tambahDataSantri({{ $wali->id }})" type="button" class="btn btn-success" id="btnTambahSantri" data-target="#modalTambahSantri" data-toggle="modal">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                        <button onclick="editDataWali({{ $wali->id }})" type="button" class="btn btn-warning" id="btnEdit" data-target="#modalEdit" data-toggle="modal">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <form action="{{ url('/app/sistem/wali_santri/'.$wali->id) }}" method="POST" style="display: inline;">
                                            @method("DELETE")
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $wali->id }}">
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
            <form action="{{ url('app/sistem/wali_santri') }}" method="post" id="wali_santri" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik"> NIK </label>
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama"> No. KK </label>
                                <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="Masukkan No. KK">
                            </div>
                        </div>
                    </div>
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
                                <labeinl for="no_hp"> No. HP </labeinl>
                                <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan No. HP">
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
                    <div class="form-group">
                        <label for="alamat"> Alamat </label>
                        <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="10" placeholder="Masukkan Alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar"> Gambar </label>
                        <input type="file" class="form-control" name="gambar" id="gambar">
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
            <form action="{{ url('/app/sistem/wali_santri/simpan') }}" method="POST">
                @method("PUT")
                {{ csrf_field() }}
                <div class="modal-body" id="modal-content-edit">

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-success" id="btn-edit">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- Tambah Data Santri -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalTambahSantri">
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
            <form action="{{ url('/app/sistem/santri/tambah_santri_by_wali') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body" id="modal-content-tambah-santri">

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

    function editDataWali(id)
    {
        $.ajax({
            url : "{{ url('/app/sistem/wali_santri/edit') }}",
            type : "GET",
            data : { id : id },
            success : function(data) {
                $("#modal-content-edit").html(data);
                return true;
            }
        });
    }

    function tambahDataSantri(id)
    {
        $.ajax({
            url : "{{ url('/app/sistem/santri/tambah_data_santri') }}",
            type : "GET",
            data : { id : id },
            success : function(data) {
                $("#modal-content-tambah-santri").html(data)
                return true;
            }
        });
    }

    $(document).ready(function() {
        $("#table-1").dataTable();
    })
</script>

@endsection
