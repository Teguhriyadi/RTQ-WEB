@extends('.app.layouts.template')

@section('app_title', 'Santri')

@section('app_content')

    <style>
        th.dt-center,
        td.dt-center {
            text-align: center;
        }
    </style>

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

    @if ($belum_terkonfimasi == 0)
    @else
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="alert alert-warning" role="alert">
                    Ada {{ $belum_terkonfimasi }} Santri yang <a class="alert-link">belum
                        terkonfirmasi</a>. Silahkan Klik <a target="_blank" href="{{ url('/app/sistem/tes/input') }}"
                        class="alert-link">disini</a> untuk ke halaman tujuan.
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-users"></i> Data @yield('app_title')
                    </h2>
                    <div class="pull-right">
                        @if (empty($belum_terkonfimasi))
                        @else
                            <a href="{{ url('app/sistem/santri/export') }}" class="btn btn-success btn-sm">
                                <i class="fa fa-download"></i> Download
                            </a>
                        @endif

                        @if (Auth::user()->getAkses->id_role == 1)
                        @else
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalExcel">
                                <i class="fa fa-upload"></i> Upload
                            </button>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-santri" class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Jenjang</th>
                                            <th>Nama Wali</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
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
                        <i class="fa fa-edit"></i> Edit Data
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/app/sistem/santri/simpan') }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    {{ csrf_field() }}
                    <div class="modal-body" id="modal-content-edit">

                    </div>
                    <div class="modal-footer bg-whitesmoke br">
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
                <form action="{{ url('app/sistem/santri/import') }}" method="post" id="tambahSiswaExcel"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Import Excel</label>
                            <input type="file" class="form-control" name="importSantri">
                        </div>
                        <div class="form-group" id="process" style="display: none">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0"
                                    aria-valuemax="100" style=""></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <a href="{{ url('dokumen/CONTOH_FORMAT_SANTRI.xlsx') }}" class="btn btn-sm btn-dark"><i
                                class="fa fa-download"></i> Unduh Format</a>
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
    <script>
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            $("#datatable-santri").dataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('app/sistem/santri/datatables') }}",
                columnDefs: [{
                    "className": "dt-center",
                    "targets": [0, 1, 3, 5]
                }],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                    },
                    {
                        data: 'nis',
                        name: 'nis'
                    },
                    {
                        data: 'nama_lengkap',
                        name: 'nama_lengkap'
                    },
                    {
                        data: 'jenjang',
                        name: 'jenjang'
                    },
                    {
                        data: 'nama_wali',
                        name: 'nama_wali'
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
                $("#tambahSiswaExcel").ajaxForm({
                    url: "{{ url('app/sistem/santri/import') }}",
                    beforeSubmit: function() {
                        $("input[name='importSantri']").css("display", "none");
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
                                console.log(x);
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
                        $('#tambahSiswaExcel')[0].reset();
                        $('#process').css('display', 'none');
                        $('.progress-bar').css('width', '0%');
                        $(".progress-bar").stop();
                        $('#btn-tambah-excel').attr('disabled', false);
                        $("input[name='imporSantri']").css("display", "block");
                    }
                });
            })
        })
    </script>

@endsection
