@extends('.app.layouts.template')

@section('app_title', 'Wali Santri')

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
                        data-target=".bs-example-modal-lg">
                        <i class="fa fa-plus"></i> Tambah Data
                    </button>
                    <div class="pull-right">
                        {{-- <a href="{{ url('app/sistem/wali_santri/export') }}" class="btn btn-success btn-sm"><i --}}
                        {{-- class="fa fa-download"></i> Download</a> --}}
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalExcel"><i
                                class="fa fa-upload"></i> Upload</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-walisantri" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th>No. KK</th>
                                            <th>Nama</th>
                                            <th class="text-center">Jenis Kelamin</th>
                                            <th class="text-center">No. HP</th>
                                            <th class="text-center">Jumlah Anak</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @php $no = 0 @endphp
                                        @foreach ($data_wali as $wali)
                                            <tr>
                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td>{{ $wali->no_kk }}</td>
                                                <td>{{ $wali->getUser->nama }}</td>
                                                <td class="text-center">
                                                    @if ($wali->getUser->jenis_kelamin == 'L')
                                                        Laki - Laki
                                                    @elseif($wali->getUser->jenis_kelamin == 'P')
                                                        Perempuan
                                                    @else
                                                        Tidak Ada
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $wali->getUser->no_hp }}</td>
                                                <td class="text-center">
                                                    @php
                                                        $count = $data_santri->where('id_wali', $wali->id)->count();
                                                        echo $count;
                                                    @endphp
                                                </td>
                                                <td class="text-center">
                                                    <button onclick="tambahDataSantri({{ $wali->id }})" type="button"
                                                        class="btn btn-success btn-sm" id="btnTambahSantri"
                                                        data-target="#modalTambahSantri" data-toggle="modal">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                    <button onclick="editDataWali({{ $wali->id }})" type="button"
                                                        class="btn btn-warning btn-sm text-white" id="btnEdit"
                                                        data-target="#modalEdit" data-toggle="modal">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <form action="{{ url('/app/sistem/wali_santri/' . $wali->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @method("DELETE")
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $wali->id }}">
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach --}}
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
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modalTambah" aria-hidden="true">
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
                <form action="{{ url('app/sistem/wali_santri') }}" method="post" id="wali_santri"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_ktp"> No. KTP </label>
                                    <input type="text" class="form-control" name="no_ktp" id="no_ktp"
                                        placeholder="Masukkan No. KTP">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama"> No. KK </label>
                                    <input type="text" class="form-control" name="no_kk" id="no_kk"
                                        placeholder="Masukkan No. KK">
                                </div>
                            </div>
                        </div>
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
                                    <label for="kode_halaqah">Halaqah</label>
                                    <select name="kode_halaqah" class="form-control" id="kode_halaqah">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_halaqah as $data)
                                            <option value="{{ $data->kode_halaqah }}">
                                                {{ $data->nama_halaqah }} - {{ $data->kode_rt }}
                                            </option>
                                        @endforeach
                                    </select>
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
                            <label for="pekerjaan"> Pekerjaan </label>
                            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan"
                                placeholder="Masukkan Pekerjaan">
                        </div>
                        <div class="form-group">
                            <label for="gambar"> Gambar </label>
                            <img class="gambar-preview" id="tampilGambar">
                            <input type="file" class="form-control" name="gambar" id="gambar" onchange="previewImage()">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                            <i class="fa fa-times"></i> Kembali
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm" id="btn-tambah">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END -->

    <!-- Edit Data -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modalEdit" aria-hidden="true">
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
                    @method('PUT')
                    {{ csrf_field() }}
                    <div class="modal-body" id="modal-content-edit">

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                            <i class="fa fa-times"></i> Kembali
                        </button>
                        <button type="submit" class="btn btn-success btn-sm" id="btn-edit">
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
                <form action="{{ url('/app/sistem/santri/tambah_santri_by_wali') }}" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body" id="modal-content-tambah-santri">

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
                <form action="{{ url('app/sistem/wali_santri/import') }}" method="post" id="tambahWaliSantriExcel"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Import Excel</label>
                            <input type="file" class="form-control " name="importWaliSantri">
                        </div>
                        <div class="form-group" id="process" style="display: none">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0"
                                    aria-valuemax="100" style=""></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i
                                class="fa fa-times"></i>
                            Kembali</button>
                        <button type="submit" class="btn btn-primary btn-sm" id="btn-tambah-excel">
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
    <script src="{{ url('') }}/vendors/jquery/dist/jquery.form.min.js"></script>
    <script type="text/javascript">
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

        function editDataWali(id) {
            $.ajax({
                url: "{{ url('/app/sistem/wali_santri/edit') }}",
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

        function tambahDataSantri(id) {
            $.ajax({
                url: "{{ url('/app/sistem/santri/tambah_data_santri') }}",
                type: "GET",
                data: {
                    id: id
                },
                success: function(data) {
                    $("#modal-content-tambah-santri").html(data)
                    return true;
                }
            });
        }

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            $("#datatable-walisantri").dataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('app/sistem/wali_santri/datatables') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'no_kk',
                        name: 'no_kk'
                    },
                    {
                        data: 'nama_lengkap',
                        name: 'nama_lengkap'
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'jenis_kelamin'
                    },
                    {
                        data: 'no_hp',
                        name: 'no_hp'
                    },
                    {
                        data: 'jumlah_anak',
                        name: 'jumlah_anak'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

            $("#btn-tambah-excel").click(function() {
                $("#tambahWaliSantriExcel").ajaxForm({
                    url: "{{ url('app/sistem/wali_santri/import') }}",
                    beforeSubmit: function() {
                        $("input[name='importWaliSantri']").css("display", "none");
                        $("#btn-tambah-excel").attr("disabled", "disabled");
                        $('#process').css('display', 'block');
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        var percentValue = percentComplete + '%';
                        $(".progress-bar").animate({
                            width: '' + percentValue + ''
                        }, {
                            duration: 5000,
                            easing: "linear",
                            step: function(x) {
                                percentText = Math.round(x * 100 / percentComplete);
                                if (percentText == "100") {
                                    $(".progress-bar").text("Harap tunggu!");
                                    setTimeout(function() {
                                        $('.progress-bar').html(
                                            'Proses validasi data sedang berlangsung!'
                                        );
                                    }, 15000);
                                }
                            }
                        });
                    },
                    error: function(response, status, e) {
                        Swal.fire("Ooops", "Data gagal diupload!", "error")
                    },
                    complete: function(xhr) {
                        if (xhr.status != 500) {
                            $("#modalExcel").modal('hide');
                            location.reload();
                        }
                        $('#tambahWaliSantriExcel')[0].reset();
                        $('#process').css('display', 'none');
                        $('.progress-bar').css('width', '0%');
                        $(".progress-bar").stop();
                        $('#btn-tambah-excel').attr('disabled', false);
                        $("input[name='importWaliSantri']").css("display", "block");
                    }
                });
            })
        })
    </script>

@endsection
