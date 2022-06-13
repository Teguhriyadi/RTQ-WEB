@extends('.app.layouts.template')

@section('app_title', 'Admin Lokasi RT')

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
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                        data-target=".bs-example-modal-lg" title="Tambah Data">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th>Nama</th>
                                            <th>Lokasi RT</th>
                                            <th class="text-center">No. HP</th>
                                            <th>Pendidikan Terakhir</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 0 @endphp
                                        @foreach ($data_admin_lokasi_rt as $data)
                                            <tr>
                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td>{{ $data->getUser->nama }}</td>
                                                <td>{{ $data->getLokasiRt->lokasi_rt }}</td>
                                                <td class="text-center">{{ $data->getUser->no_hp }}</td>
                                                <td>{{ $data->pendidikan_terakhir }}</td>
                                                <td class="text-center">
                                                    <button onclick="editAdminLokasiRt({{ $data->id }})" type="button"
                                                        class="btn btn-warning btn-sm text-white" data-target="#modalEdit"
                                                        data-toggle="modal">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <form action="{{ url('/app/sistem/admin_lokasi_rt/' . $data->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @method('DELETE')
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-sm">
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        <i class="fa fa-plus"></i>
                        <span>Tambah Data</span>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/app/sistem/admin_lokasi_rt') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
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
                                    <label for="pendidikan_terakhir"> Pendidikan Terakhir </label>
                                    <input type="text" class="form-control" name="pendidikan_terakhir"
                                        id="pendidikan_terakhir" placeholder="Masukkan Pendidikan Terakhir">
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_hp"> No. HP </label>
                                    <input type="number" class="form-control" name="no_hp" id="no_hp"
                                        placeholder="Masukkan No. HP">
                                </div>
                            </div>
                            <div class="col-md-6" id="optionNyala">
                                <div class="form-group">
                                    <label for="kode_rt"> Lokasi RT </label>
                                    @if ($lokasi_rt->count() < 1)
                                        <input type="text" name="kode_rt" class="form-control" id="kode_rt"
                                            placeholder="Masukkan Lokasi RT">
                                    @else
                                        <select name="kode_rt" class="form-control" id="kode_rt">
                                            <option value="">- Pilih -</option>
                                            @foreach ($lokasi_rt as $data)
                                                <option value="{{ $data->kode_rt }}">
                                                    {{ $data->kode_rt }}
                                                </option>
                                            @endforeach
                                            <option value="L">Lainnya</option>
                                        </select>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6" id="optionMati" style="display: none;">
                                <div class="form-group">
                                    <label for="kode_rt"> Lokasi RT </label>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="kode_rt" id="kode_rt"
                                                placeholder="Masukkan Lokasi RT">
                                        </div>
                                        <div class="col-md-2">
                                            <a class="btn btn-danger btn-sm" id="btn-nyalakan-pilihan"
                                                style="color: white;">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat"> Alamat </label>
                            <textarea name="alamat" class="form-control" id="alamat" rows="5" placeholder="Masukkan Alamat"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="gambar"> Gambar </label>
                            <img class="gambar-preview img-fluid mb-3">
                            <input onchange="previewImage()" type="file" class="form-control" name="gambar" id="gambar">
                        </div>
                    </div>
                    <div class="modal-footer">
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

    <!-- Edit Data -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalEdit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        <i class="fa fa-edit"></i>
                        <span>Edit Data</span>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/app/sistem/admin_lokasi_rt/simpan') }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="modal-body" id="modal-content-edit">

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                            <i class="fa fa-times"></i> Kembali
                        </button>
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-save"></i> Simpan
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
        $("#kode_rt").change(function() {
            if ($(this).val() == "L") {
                $("#optionNyala").hide();
                $("#optionMati").show();
            }
        });

        $("#btn-nyalakan-pilihan").click(function() {
            $("#optionNyala").show();
            $("#optionMati").hide();
            $("#kode_rt").show();
        });

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

        function editAdminLokasiRt(id) {
            $.ajax({
                url: "{{ url('/app/sistem/admin_lokasi_rt/edit') }}",
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
