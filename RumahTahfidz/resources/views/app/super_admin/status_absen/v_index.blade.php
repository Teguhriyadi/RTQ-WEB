@extends(".app.layouts.template")

@section("app_title", "Status Absen")

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

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <i class="fa fa-plus"></i>
                        <span>Tambah Form Status Absen</span>
                    </h4>
                </div>
                <form method="POST" action="{{ url('/app/sistem/status_absen') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="keterangan"> Keterangan </label>
                            <input type="text" name="keterangan" class="form-control input-sm" id="keterangan" placeholder="Masukkan Keterangan">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button name="btn-tambah" class="btn btn-primary" type="submit">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                        <button name="btn-reset" class="btn btn-danger" type="reset">
                            <i class="fa fa-times"></i> Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-8 col-md-6 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <i class="fa fa-bars"></i>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Keterangan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 0 @endphp
                                @foreach($data_status as $status)
                                <tr>
                                    <td class="text-center">{{ ++$no }}.</td>
                                    <td>{{ $status->keterangan }}</td>
                                    <td class="text-center">
                                        <button onclick="editStatusAbsen({{ $status->id }})" class="btn btn-warning btn-sm" data-target="#modalEdit" data-toggle="modal">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <form action="{{ url('/app/sistem/status_absen/'.$status->id) }}" method="POST" style="display: inline;">
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
</div>

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
            <form action="{{ url('/app/sistem/status_absen/simpan') }}" method="POST">
                @method("PUT")
                @csrf
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

@endsection

@section("app_scripts")

<script>
    function editStatusAbsen(id) {
        $.ajax({
            url : "{{ url('/app/sistem/status_absen/edit') }}",
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
