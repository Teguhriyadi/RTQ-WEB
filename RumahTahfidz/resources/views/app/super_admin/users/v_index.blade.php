@extends('.app.layouts.template')

@section('app_title', 'Users')

@section('app_content')

    <section class="section">
        <h3>
            @yield('app_title')
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('app/sistem/home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    @yield('app_title')
                </li>
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
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal"
                            data-target="#modalTambah">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </div>
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
                                                        -
                                                    @else
                                                        @if ($user->status == 1)
                                                            <form action="{{ url('/app/sistem/users/non_aktifkan/') }}"
                                                                method="POST" style="display: inline;">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="id"
                                                                    value="{{ $user->id }}">
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    <i class="fa fa-times"></i> Non - Aktifkan
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form action="{{ url('/app/sistem/users/aktifkan/') }}"
                                                                method="POST" style="display: inline;">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="id"
                                                                    value="{{ $user->id }}">
                                                                <button type="submit" class="btn btn-success btn-sm">
                                                                    <i class="fa fa-arrow-up"></i> Aktifkan
                                                                </button>
                                                            </form>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ url('app/sistem/users/hak_akses/' . $user->id) }}"
                                                        class="btn btn-secondary btn-sm">
                                                        <i class="fa fa-key"></i>
                                                        Kelola Hak Akses
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ url('app/sistem/users/' . $user->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa fa-search"></i> Detail
                                                    </a>
                                                    <a href="{{ url('app/sistem/users/' . $user->id . '/edit') }}"
                                                        class="btn btn-warning btn-sm text-white">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    @if (Auth::user()->id == $user->id)
                                                    @else
                                                        <button id="deleteUser" data-id="{{ $user->id }}"
                                                            class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i> Hapus
                                                        </button>
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
                <form action="{{ url('/app/sistem/users/') }}" method="POST" enctype="multipart/form-data"
                    id="tambahUser">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama"> Nama </label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                placeholder="Masukkan Nama">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email"> Email </label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Masukkan Email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_hp"> No. HP </label>
                                    <input type="number" class="form-control" name="no_hp" id="no_hp"
                                        placeholder="Masukkan No. HP">
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
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                        placeholder="Masukkan Tempat Lahir">
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
                            <textarea name="alamat" class="form-control" id="alamat" rows="5" placeholder="Masukkan Alamat"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="gambar"> Gambar </label>
                            <img class="gambar-preview img-fluid" id="tampilGambar">
                            <input type="file" class="form-control" name="gambar" id="gambar"
                                onchange="previewImage()">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                            <i class="fa fa-times"></i> Kembali
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm">
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
        (function($, W, D) {
            var JQUERY4U = {};
            JQUERY4U.UTIL = {
                setupFormValidation: function() {
                    $("#tambahUser").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            nama: {
                                required: true
                            },
                            email: {
                                required: true
                            },
                            no_hp: {
                                required: true
                            },
                            jenis_kelamin: {
                                required: true
                            },
                            tempat_lahir: {
                                required: true
                            },
                            tanggal_lahir: {
                                required: true
                            },
                            alamat: {
                                required: true
                            },
                            gambar: {
                                required: true,
                                accept: "image/*"
                            },
                        },
                        messages: {
                            nama: {
                                required: "Nama harap diisi!"
                            },
                            email: {
                                required: "Email harap diisi!"
                            },
                            no_hp: {
                                required: "No. HP harap diisi!"
                            },
                            jenis_kelamin: {
                                required: "Jenis Kelamin harap diisi!"
                            },
                            tempat_lahir: {
                                required: "Tempat Lahir harap diisi!"
                            },
                            tanggal_lahir: {
                                required: "Tanggal Lahir harap diisi!"
                            },
                            alamat: {
                                required: "Alamat harap diisi!"
                            },
                            gambar: {
                                required: "Gambar harap diisi!",
                                accept: "Gambar harus berformat .jpg/.jpeg/.png"
                            },
                        },
                        submitHandler: function(form) {
                            form.submit()
                        }
                    });
                }
            }
            $(D).ready(function($) {
                JQUERY4U.UTIL.setupFormValidation()
            })
        })(jQuery, window, document)

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

        $(document).ready(function() {
            $("#table-1").dataTable();
        })

        $(document).ready(function() {
            $('body').on('click', '#deleteUser', function() {
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
                        form_string =
                            "<form method=\"POST\" action=\"{{ url('/app/sistem/users/') }}/" +
                            id +
                            "\" accept-charset=\"UTF-8\"><input name=\"_method\" type=\"hidden\" value=\"DELETE\"><input name=\"_token\" type=\"hidden\" value=\"{{ csrf_token() }}\"></form>"

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
