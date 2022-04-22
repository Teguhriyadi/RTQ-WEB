@extends(".app.layouts.template")

@section("app_title", "Halaqah")

@section("app_content")

@section("app_css")

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endsection

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
                <button class="btn btn-primary" data-target="#modalTambah" data-toggle="modal">
                    <i class="fa fa-plus"></i> Tambah
                </button>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Kode</th>
                                        <th>Nama</th>
                                        <th>Lokasi</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 0 @endphp
                                    @foreach($data_halaqah as $halaqah)
                                    <tr>
                                        <td class="text-center">{{ ++$no }}.</td>
                                        <td class="text-center">{{ $halaqah->kode_halaqah }}</td>
                                        <td>{{ $halaqah->nama_halaqah }}</td>
                                        <td>{{ $halaqah->getLokasiRt->lokasi_rt }}</td>
                                        <td class="text-center">
                                            <button onclick="editDataHalaqah('{{ $halaqah->kode_halaqah }}')" class="btn btn-warning" data-target="#modalEdit" data-toggle="modal">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                            <form action="{{ url('/app/sistem/halaqah/'.$halaqah->kode_halaqah) }}" method="POST" style="display: inline;">
                                                @method("DELETE")
                                                @csrf
                                                <input type="hidden" name="kode" value="{{ $halaqah->kode_halaqah }}">
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i> Hapus
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
    </div>
</div>

<!-- Tambah Data -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalTambah">
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
            <form action="{{ url('/app/sistem/halaqah/') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode_halaqah"> Kode Halaqah </label>
                        <input type="text" class="form-control" name="kode_halaqah" id="kode_halaqah" placeholder="Masukkan Kode Halaqah">
                    </div>
                    <div class="form-group">
                        <label for="nama_halaqah"> Nama Halaqah </label>
                        <input type="text" class="form-control" name="nama_halaqah" id="nama_halaqah" placeholder="Masukkan Nama Halaqah">
                    </div>
                    <div class="form-group">
                        <label for="kode_rt"> Lokasi RT </label>
                        <select name="kode_rt" class="form-control" id="kode_rt" style="width: 100%">
                            <option value="">- Pilih -</option>
                            @foreach ($data_lokasi_rt as $data)
                            <option value="{{ $data->kode_rt }}">
                                {{ $data->lokasi_rt }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
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
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalEdit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-pencil"></i>
                    <span>Edit Data</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/app/sistem/halaqah/simpan') }}" method="POST">
                @method("PUT")
                @csrf
                <div class="modal-body" id="modal-content">

                </div>
                <div class="modal-footer">
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">

    $(document).ready(function () {
        $("#kode_rt").select2({
            theme: 'bootstrap4',
            placeholder: "- Pilih -"
        });
    });

</script>

<script>
    function editDataHalaqah(kode_halaqah) {
        $.ajax({
            url : "{{ url('/app/sistem/halaqah/edit') }}",
            type : "GET",
            data : { kode_halaqah : kode_halaqah },
            success : function(data) {
                $("#modal-content").html(data);
                return true;
            }
        });
    }

    $(document).ready(function() {
        $("#table-1").dataTable();
    })

</script>

@endsection
