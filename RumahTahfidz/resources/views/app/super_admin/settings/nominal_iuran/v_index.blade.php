@extends('.app.layouts.template')

@section('app_title', 'Nominal Pendaftaran')

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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <div class="clearfix"></div>
    @endif

    <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-plus"></i> Tambah Data
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ url('/app/sistem/setting/nominal/iuran') }}" method="POST" id="tambahNominal">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="nominal"> Nominal </label>
                                    <input type="text" class="form-control" name="nominal" id="nominal"
                                        placeholder="Masukkan Nominal">
                                </div>
                                <div class="ln_solid"></div>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-times"></i> Batal
                                </button>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus"></i> Tambah
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-bars"></i> Data @yield('app_title')
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="table-1" class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Nominal</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($data_nominal_iuran as $data)
                                            <tr>
                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">
                                                    Rp. {{ number_format($data->nominal) }}
                                                </td>
                                                <td class="text-center">
                                                    @if ($data->status == 0)
                                                        <form
                                                            action="{{ url('/app/sistem/setting/nominal/iuran/aktifkan') }}"
                                                            method="POST">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="id"
                                                                value="{{ $data->id }}">
                                                            <button type="submit" class="btn btn-success btn-sm">
                                                                <i class="fa fa-check"></i> Aktifkan
                                                            </button>
                                                        </form>
                                                    @elseif($data->status == 1)
                                                        <form
                                                            action="{{ url('/app/sistem/setting/nominal/iuran/non_aktifkan') }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ $data->id }}">
                                                            <button class="btn btn-danger btn-sm">
                                                                <i class="fa fa-times"></i> Non - Aktifkan
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <button onclick="editNominalIuran({{ $data->id }})"
                                                        class="btn btn-warning text-white btn-sm" data-target="#modalEdit"
                                                        data-toggle="modal">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <button id="deleteNominalIuran" data-id="{{ $data->id }}"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </button>
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
                <form action="{{ url('/app/sistem/setting/nominal/iuran/simpan') }}" method="POST" id="editNominal">
                    @method('PUT')
                    @csrf
                    <div class="modal-body" id="modal-content-edit">

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger btn-sm">
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

@endsection

@section('app_scripts')
    <script>
        (function($, W, D) {
            var JQUERY4U = {};
            JQUERY4U.UTIL = {
                setupFormValidation: function() {
                    $("#tambahNominal").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            nominal: {
                                required: true
                            },
                        },
                        messages: {
                            nominal: {
                                required: "Kolom Nominal harap di isi!"
                            },
                        },
                        submitHandler: function(form) {
                            form.submit()
                        }
                    });

                    $("#editNominal").validate({
                        lang: "id",
                        ignore: "",
                        rules: {
                            nominal: {
                                required: true
                            },
                        },
                        messages: {
                            nominal: {
                                required: "Nominal harap di isi!"
                            },
                        },
                        submitHandler: function(form) {
                            form.submit()
                        }
                    })
                }
            }
            $(D).ready(function($) {
                JQUERY4U.UTIL.setupFormValidation()
            })
        })(jQuery, window, document)

        function editNominalIuran(id) {
            $.ajax({
                url: "{{ url('/app/sistem/setting/nominal/iuran/edit') }}",
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

        $('body').on('click', '#deleteNominalIuran', function() {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iyaa, Saya Yakin'
            }).then((result) => {
                if (result.isConfirmed) {
                    form_string =
                        "<form method=\"POST\" action=\"{{ url('/app/sistem/setting/nominal/iuran') }}/" +
                        id +
                        "\" accept-charset=\"UTF-8\"><input name=\"_method\" type=\"hidden\" value=\"DELETE\"><input name=\"_token\" type=\"hidden\" value=\"{{ csrf_token() }}\"></form>"

                    form = $(form_string)
                    form.appendTo('body');
                    form.submit();
                } else {
                    Swal.fire('Konfirmasi Diterima!', 'Data Anda Masih Terdata', 'success');
                }
            })
        })

        var rupiah = document.getElementById('nominal');
        rupiah.addEventListener('keyup', function(e) {
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        $(document).ready(function() {
            $("#table-1").dataTable();
        })
    </script>

@endsection
