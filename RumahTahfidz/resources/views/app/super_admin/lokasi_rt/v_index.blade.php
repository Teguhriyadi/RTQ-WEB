@extends(".app.layouts.template")

@section("app_title", "Lokasi RT")

@section("app_content")

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>@yield("app_title")</h3>
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
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 0 @endphp
                                    @foreach($data_lokasi_rt as $data)
                                    <tr>
                                        <td class="text-center">{{ ++$no }}.</td>
                                        <td class="text-center">{{ $data->kode_rt }}</td>
                                        <td>{{ $data->lokasi_rt }}</td>
                                        <td class="text-center">
                                            <button onclick="editLokasiRt('{{ $data->kode_rt }}')" class="btn btn-warning" data-target="#modalEdit" data-toggle="modal">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <form action="{{ url('/app/sistem/lokasi_rt/'.$data->kode_rt) }}" method="POST" style="display: inline;">
                                                @method("DELETE")
                                                @csrf
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
    </div>
</div>

<!-- Tambah Data -->
<div class="modal fade bs-example-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalTambah">
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
            <form action="{{ url('/app/sistem/lokasi_rt/') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode_rt"> Kode RT </label>
                        <input type="text" class="form-control" name="kode_rt" id="kode_rt" placeholder="Masukkan Kode RT">
                    </div>
                    <div class="form-group">
                        <label for="lokasi_rt"> Lokasi RT </label>
                        <input type="text" class="form-control" name="lokasi_rt" id="lokasi_rt" placeholder="Masukkan Lokasi RT">
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
<div class="modal fade bs-example-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalEdit">
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
            <form action="{{ url('/app/sistem/lokasi_rt/simpan') }}" method="POST">
                @method("PUT")
                @csrf
                <div class="modal-body" id="modal-content-edit">

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

<script>
    function editLokasiRt(kode_rt) {
        $.ajax({
            url : "{{ url('/app/sistem/lokasi_rt/edit') }}",
            type : "GET",
            data : { kode_rt : kode_rt },
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
