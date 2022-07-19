@php
use Illuminate\Support\Str;
@endphp
@extends(".app.layouts.template")

@section("app_title", "Profil Santri")

@section("app_content")

<h3>
    @yield("app_title")
</h3>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('app/sistem/home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Profil Santri</li>
    </ol>
</nav>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    <i class="fa fa-users"></i> @yield("app_title")
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <section>
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="{{ $wali_santri->gambar == null ? url('gambar/gambar_user.png') : $wali_santri->gambar }}" alt="" height="100">
                            <h3><strong>{{ $wali_santri->nama }}</strong></h3>
                        </div>
                        <div class="col-sm-6">
                            <table class="mt-4">
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{{ $wali_santri->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>No. Telepon</td>
                                    <td>:</td>
                                    <td>{{ $wali_santri->no_hp }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $wali_santri->email }}</td>
                                </tr>
                                <tr>
                                    <td>No. KTP</td>
                                    <td>:</td>
                                    <td>{{ Str::limit($wali_santri->getWaliSantri->no_ktp, 5, '***') }}</td>
                                </tr>
                                <tr>
                                    <td>No. KK</td>
                                    <td>:</td>
                                    <td>{{ Str::limit($wali_santri->getWaliSantri->no_kk, 5, '***') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </section>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card-box table-responsive">
                            <table class="table table-hover table-bordered" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Jenjang</th>
                                        <th>Status</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($santri as $s)
                                    <tr>
                                        <th class="text-center">{{ $loop->iteration }}</th>
                                        <td>{{ $s->nis }}</td>
                                        <td>{{ $s->nama_lengkap }}</td>
                                        <td>{{ $s->getJenjang->jenjang }}</td>
                                        <td>{{ $s->status == 1 ? 'Belum Lulus' : 'Lulus' }}</td>
                                        <th class="text-center">
                                            <a href="{{ url('app/sistem/profil_santri/'.$s->id) }}" class="btn btn-info text-white" title="Detail"><i class="fa fa-eye"></i></a>
                                            <a href="{{ url('app/sistem/profil_santri/'.$s->id.'/edit') }}" class="btn btn-warning text-white" title="Edit"><i class="fa fa-pencil"></i></a>
                                        </th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
            <form action="{{ url('/app/sistem/santri/simpan') }}" method="POST">
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

<!-- Excel Data -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalExcel">
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
            <form action="{{ url('app/sistem/siswa/import') }}" method="post" id="tambahSiswa" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Import Excel</label>
                        <input type="file" class="form-control" name="importSantri">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Kembali</button>
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

    function editDataSantri(id)
    {
        $.ajax({
            url : "{{ url('/app/sistem/santri/edit') }}",
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
