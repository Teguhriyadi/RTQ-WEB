@extends(".app.layouts.template")

@section("app_title", "Data Kelas")

@section("app_content")

<section class="section">
    <div class="section-header">
        <h1>
            @yield("app_title")
        </h1>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <i class="fa fa-plus"></i>
                        <span>Tambah Form Kelas</span>
                    </h4>
                </div>
                <form method="POST" action="{{ url('/app/sistem/kelas') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_kelas"> Nama Kelas </label>
                            <input type="text" name="nama_kelas" class="form-control input-sm" id="nama_kelas" placeholder="Masukkan Nama Kelas">
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
                                @foreach($data_kelas as $kelas)
                                <tr>
                                    <td class="text-center">{{ ++$no }}.</td>
                                    <td>{{ $kelas->nama_kelas }}</td>
                                    <td class="text-center">
                                        <button onclick="editDataKelas({{ $kelas->id }})" class="btn btn-warning" data-target="#modalEdit" data-toggle="modal">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        {{-- <form id="delete-{{ $kelas->id }}" action="{{ url('/app/sistem/kelas/'.$kelas->id) }}" method="POST" style="display: inline;"> --}}
                                        {{-- <form id="delete-kelas" action="{{ url('/app/sistem/kelas/'.$kelas->id) }}" method="POST" style="display: inline;">
                                            @method("DELETE")
                                            {{ csrf_field() }} --}}
                                            {{-- <button onclick="deleteKelas('data-{{ $kelas->id }}')" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button> --}}
                                            <button id="deleteKelas" data-id="{{ $kelas->id }}" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        {{-- </form> --}}
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
            <form action="{{ url('/app/sistem/kelas/simpan') }}" method="POST">
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
    function editDataKelas(id) {
        $.ajax({
            url : "{{ url('/app/sistem/kelas/edit') }}",
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

        $('body').on('click', '#deleteKelas', function () {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form_string = "<form method=\"POST\" action=\"{{ url('/app/sistem/kelas/') }}/"+id+"\" accept-charset=\"UTF-8\"><input name=\"_method\" type=\"hidden\" value=\"DELETE\"><input name=\"_token\" type=\"hidden\" value=\"{{ csrf_token() }}\"></form>"

                    form = $(form_string)
                    form.appendTo('body');
                    form.submit();
                } else {
                    Swal.fire('Selamat!', 'Data anda tidak jadi dihapus', 'error');
                }
            })
        })
    })
</script>

@endsection
