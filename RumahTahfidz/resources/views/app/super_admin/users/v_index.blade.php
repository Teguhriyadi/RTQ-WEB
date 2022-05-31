@extends('.app.layouts.template')

@section('app_title', 'Users')

@section('app_content')

    <section class="section">
        <h3>
            @yield('app_title')
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
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-users"></i> Data Users
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
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Hak Akses</th>
                                            <th class="text-center">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 0 @endphp
                                        @foreach ($data_users as $user)
                                            <tr>
                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td>{{ $user->nama }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td class="text-center">
                                                    @if (Auth::user()->id == $user->id)
                                                    @else
                                                        @if ($user->status == 1)
                                                            <form action="{{ url('/app/sistem/users/non_aktifkan/') }}"
                                                                method="POST" style="display: inline;">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    <i class="fa fa-times"></i> Non - Aktifkan
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form action="{{ url('/app/sistem/users/aktifkan/') }}"
                                                                method="POST" style="display: inline;">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                                <button type="submit" class="btn btn-success btn-sm">
                                                                    <i class="fa fa-arrow-up"></i> Aktifkan
                                                                </button>
                                                            </form>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (Auth::user()->id == $user->id)
                                                    @else
                                                        <a href="{{ url('app/sistem/users/hak_akses/' . $user->id) }}"
                                                            class="btn btn-secondary btn-sm"><i class="fa fa-key"></i>
                                                            Kelola Hak Akses</a>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-search"></i> Detail
                                                    </a>
                                                    <button class="btn btn-warning btn-sm text-white">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    @if (Auth::user()->id == $user->id)
                                                    @else
                                                        <form action="" method="POST" style="display: inline">
                                                            @method('DELETE')
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="fa fa-trash"></i> Hapus
                                                            </button>
                                                        </form>
                                                    @endif
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
                <form action="{{ url('/app/sistem/users/') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama"> Nama </label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email"> Email </label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Masukkan Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password"> Password </label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Masukkan Password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_hp"> No. HP </label>
                            <input type="number" class="form-control" name="no_hp" id="no_hp"
                                placeholder="Masukkan No. HP">
                        </div>
                        <div class="form-group">
                            <label for="alamat"> Alamat </label>
                            <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="10" placeholder="Masukkan Alamat"></textarea>
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

@endsection

@section('app_scripts')

    <script>
        function editRole(id) {
            $.ajax({
                url: "{{ url('/app/sistem/role/edit') }}",
                type: "GET",
                data: {
                    id: id
                },
                success: function(data) {
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
