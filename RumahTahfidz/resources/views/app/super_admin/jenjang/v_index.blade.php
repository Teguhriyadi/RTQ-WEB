@extends(".app.layouts.template")

@section("app_title", "Jenjang")

@section("app_content")

<section class="section">
    <h3>
        @yield("app_title")
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('app/sistem/home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('app_title')</li>
        </ol>
    </nav>
</section>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-4 col-sm-8 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    <i class="fa fa-plus"></i> Tambah Data Jenjang
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form method="POST" action="{{ url('/app/sistem/jenjang') }}">
                    @csrf
                    <div class="form-group">
                        <label for="jenjang"> Jenjang </label>
                        <input type="text" class="form-control" name="jenjang" id="jenjang" placeholder="Masukkan Jenjang">
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <button class="btn btn-danger" type="reset">
                            <i class="fa fa-times"></i> Kembali
                        </button>
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-sm-4 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    <i class="fa fa-bars"></i> Data Jenjang
                </h2>
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
                                        <th class="text-center">Jenjang</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 0 @endphp
                                @foreach($data_jenjang as $jenjang)
                                <tr>
                                    <td class="text-center">{{ ++$no }}.</td>
                                    <td>{{ $jenjang->jenjang }}</td>
                                    <td class="text-center">
                                        <button onclick="editJenjang({{ $jenjang->id }})" class="btn btn-warning" data-target="#modalEdit" data-toggle="modal">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <form action="{{ url('/app/sistem/jenjang/'.$jenjang->id) }}" method="POST" style="display: inline;">
                                            @method("DELETE")
                                            {{ csrf_field() }}
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

<!-- Edit Data -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalEdit">
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
            <form action="{{ url('/app/sistem/jenjang/simpan') }}" method="POST">
                @method("PUT")
                {{ csrf_field() }}
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
    function editJenjang(id) {
        $.ajax({
            url : "{{ url('/app/sistem/jenjang/edit') }}",
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
