@php
use App\Models\Santri;
@endphp
@extends('.app.layouts.template')

@section('app_title', 'Santri Yang Mendaftar')

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

    @if ($data_jenjang->count() < 1)
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 m-0">
                <div class="x_content bs-example-popovers">
                    <div class="alert alert-danger alert-dismissible " role="alert">
                        <strong>Oops!</strong> Data Jenjang Masih Kosong. Silahkan Klik
                        <a target="_blank" href="{{ url('/app/sistem/jenjang') }}" style="color: white;">Disini</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                @php
                    $j_status_santri = Santri::where('status', 0)->count();
                    $j_jenjang_santri = Santri::where('id_jenjang', null)->count();
                @endphp
                @if (empty($j_status_santri))
                @else
                    @if (empty($j_jenjang_santri))
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            Ada <strong style="color: white;">{{ $j_status_santri }}</strong> Santri yang <strong
                                style="color: white;">BELUM
                                TERKONFIRMASI</strong>. Silahkan Konfirmasi
                            <a target="_blank" href="{{ url('/app/sistem/tes/data') }}" style="color: white;">
                                <b>
                                    Disini
                                </b>
                            </a>
                        </div>
                    @else
                    @endif
                @endif

                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            <i class="fa fa-users"></i> Data @yield('app_title')
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{ url('/app/sistem/tes/simpan') }}" method="POST" id="tambahTesSantri">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="card-box table-responsive">
                                        <table class="table table-striped table-bordered" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">NIS</th>
                                                    <th>Nama</th>
                                                    <th>Sekolah</th>
                                                    <th class="text-center">Kelas</th>
                                                    <th>Nama Wali</th>
                                                    <th class="text-center">Jenjang</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($data_santri as $data)
                                                    <tr>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="id_santri[]"
                                                                value="{{ $data->id }}">
                                                        </td>
                                                        <td class="text-center">{{ $data->nis }}</td>
                                                        <td>{{ $data->nama_lengkap }}</td>
                                                        <td>{{ $data->sekolah }}</td>
                                                        <td class="text-center">{{ $data->getKelas->nama_kelas }}</td>
                                                        <td>{{ $data->getWali->getUser->nama }}</td>
                                                        <td class="text-center">
                                                            <select name="id_jenjang[]" class="form-control"
                                                                id="id_jenjang">
                                                                <option value="">- Pilih -</option>
                                                                @foreach ($data_jenjang as $data)
                                                                    <option value="{{ $data->id }}">
                                                                        {{ $data->jenjang }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7" class="text-center">
                                                            <b>
                                                                <i>Maaf, Data Santri Yang Mendaftar Saat Ini Kosong</i>
                                                            </b>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @if ($jumlah_santri > 0)
                                <div class="form-group">
                                    <input type="checkbox" onchange="checkAll(this)" name="chk[]"> Check All |
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-plus"></i> Tambah
                                    </button>
                                </div>
                            @else
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

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
                    @method('PUT')
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
                <form action="{{ url('app/sistem/siswa/import') }}" method="post" id="tambahSiswa"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Import Excel</label>
                            <input type="file" class="form-control" name="importSantri">
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                            Kembali</button>
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
        function checkAll(ele) {
            var checkboxes = document.getElementsByTagName("input");
            if (ele.checked) {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = true;
                    }
                }
            } else {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == "checkbox") {
                        checkboxes[i].checked = false;
                    }
                }
            }
        }

        function editDataSantri(id) {
            $.ajax({
                url: "{{ url('/app/sistem/santri/edit') }}",
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

        (function($, W, D) {
            var JQUERY4U = {};
            JQUERY4U.UTIL = {
                setupFormValidation: function() {
                    $("#tambahTesSantri").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            id_jenjang[]: {
                                required: true
                            }
                        },
                        messages: {
                            id_jenjang[]: {
                                required: "Kolom Jenjang Harap di Isi!"
                            }
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
    </script>

@endsection
