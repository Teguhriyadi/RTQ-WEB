@extends(".app.layouts.template")

@section("app_title", "Data Pengajar")

@section("app_content")

<section class="section">
    <div class="section-header">
        <h1>
            @yield("app_title")
        </h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{ url('/app/admin/home') }}">Home</a>
            </div>
            <div class="breadcrumb-item">
                @yield("app_title")
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" id="btnTambah" data-target="#modalTambah" data-toggle="modal">
                        <i class="fa fa-plus"></i> Tambah Data
                    </button>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-bordered table-hover" id="tampilData">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Nama</th>
                                    <th class="text-center">No. HP</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tambah Data -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalTambah">
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
            <form action="{{ url('/api/pengajar') }}" method="post" id="tambahPengajar" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf

                    <div class="form-group">
                        <label for="nama"> Nama </label>
                        <input type="text" name="nama" id="nama" class="form-control input-sm" placeholder="Masukkan Nama">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_kelamin"> Jenis Kelamin </label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="">- Pilih -</option>
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_hp"> No. HP </label>
                                <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukkan No. HP">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat_lahir"> Tempat Lahir </label>
                                <input type="text" class="form-control" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" name="tempat_lahir">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_lahir"> Tanggal Lahir </label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat"> Alamat </label>
                        <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control" placeholder="Masukkan Alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar" name="gambar">
                            <label class="custom-file-label" for="gambar">Upload Gambar</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Kembali</button>
                    <button type="submit" class="btn btn-primary" id="btn-tambah">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- Edit Data -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalEdit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-pencil"></i> Edit Data
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data" id="editPengajar">
                <div class="modal-body">
                    @csrf
                    @method('put')
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="oldNoHp" name="oldNoHp">
                    <div class="form-group">
                        <label for="nama"> Nama </label>
                        <input type="text" name="nama" id="nm" class="form-control input-sm" placeholder="Masukkan Nama">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_kelamin"> Jenis Kelamin </label>
                                <select name="jenis_kelamin" id="jk" class="form-control">
                                    <option value="">- Pilih -</option>
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_hp"> No. HP </label>
                                <input type="text" name="telepon" id="tlp" class="form-control" placeholder="Masukkan No. HP">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="alamat"> Alamat </label>
                        <textarea name="alamat" id="address" cols="30" rows="10" class="form-control" placeholder="Masukkan Alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar" name="gambar">
                            <label class="custom-file-label" for="gambar">Upload Gambar</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Kembali</button>
                    <button type="button" class="btn btn-success" id="btn-edit">
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

<script type="text/javascript">

    function tampilData() {
        let empTable = document.getElementById("tampilData").getElementsByTagName("tbody")[0];
        empTable.innerHTML = "";
        $.ajax({
            url: "{{ url('') }}/api/pengajar",
            type: "GET",
            success: function (response) {
                let no = 1;
                for (let key in response.data) {
                    if (response.data.hasOwnProperty(key)) {
                        let val = response.data[key];
                        let newRow = empTable.insertRow(-1);
                        let nomer = newRow.insertCell(0);
                        let namaCell = newRow.insertCell(1);
                        let alamatCell = newRow.insertCell(2);
                        let aksiCell = newRow.insertCell(3);

                        nomer.innerHTML = no++;
                        namaCell.innerHTML = val['nama'];
                        alamatCell.innerHTML = val['telepon'];
                        // aksiCell.innerHTML = '<button class="btn btn-warning" id="btnEdit" data-target="#modalEdit" data-toggle="modal" data-id="'+val['id']+'" data-nama="'+val["nama"]+'" data-jenis_kelamin="'+val['jenis_kelamin']+'" data-alamat="'+val['alamat']+'" data-telepon="'+val["telepon"]+'" data-tempat_lahir="'+val['tempat_lahir']+'" data-tanggal_lahir="'+val['tanggal_lahir']+'"><i class="fa fa-edit"></i> Edit </button> &nbsp;'
                        aksiCell.innerHTML += '<button class="btn btn-warning" id="btnEdit" data-target="#modalEdit" data-toggle="modal" data-id="'+val['id']+'"><i class="fa fa-edit"></i> Edit</button>'
                        aksiCell.innerHTML += '<button class="btn btn-danger" onclick="hapusData('+val['id']+')"><i class="fa fa-trash"></i> Hapus</button>'
                    }
                }
            }
        });
    }

    $(document).ready(function() {
        $("body").on('click', '#btnEdit', function() {
            let id = $(this).data('id');

            $.get('{{ url("app/admin/pengajar/") }}/' + id, function (response) {
                console.log(response);

                $("#id").val(id)
                $("#nm").val(response.data.nama)
                $("#jk").val(response.data.jenis_kelamin)
                // $("#address").val(alamat)
                $("#tlp").val(response.data.telepon)
                // $("#oldNoHp").val(response.data.telepon)
            })


        });
    });

    ! function(a, i, r) {
        var e = {};
        e.UTIL = {
            setupFormValidation: function() {
                a("#tambahPengajar").validate({
                    ignore: "",
                    rules: {
                        nama: {
                            required: !0
                        },
                        jenis_kelamin: {
                            required: !0
                        },
                        telepon: {
                            required: !0
                        },
                        tempat_lahir: {
                            required: !0
                        },
                        tanggal_lahir: {
                            required: !0
                        },
                        alamat: {
                            required: !0
                        },
                        gambar: {
                            required: !0,
                            accept: "image/*"
                        },
                    },
                    messages: {
                        nama: {
                            required: "Nama harap diisi!"
                        },
                        jenis_kelamin: {
                            required: "Jenis kelamin harap diisi!"
                        },
                        telepon: {
                            required: "No hp harap diisi!"
                        },
                        tempat_lahir: {
                            required: "Tempat lahir harap diisi!"
                        },
                        tanggal_lahir: {
                            required: "Tanggal lahir harap diisi!"
                        },
                        alamat: {
                            required: "Alamat harap diisi!"
                        },
                        gambar: {
                            required: "Gambar harap diisi!",
                            accept: "Masukan file tipe gambar!"
                        },
                    },
                    submitHandler: function(a) {
                        // a.submit()

                        $.ajax({
                            url: a.action,
                            type: a.method,
                            data: $(a).serialize(),
                            success: function (response) {
                                if (response.status == true) {
                                    $("#nama, #jenis_kelamin, #alamat, #telepon, #tempat_lahir, #tanggal_lahir").val('');
                                    $("#gambar").next('.custom-file-label').removeClass("selected").html("Upload Gambar");
                                    tampilData()
                                    $("#modalTambah").modal('hide')
                                    Swal.fire({
                                        title : "Berhasil",
                                        text : "Berhasil di Tambahkan",
                                        icon : "success"
                                    })
                                } else {
                                    Swal.fire({
                                        title : "Oops",
                                        text : "Data Gagal di Inputkan",
                                        icon : "error"
                                    })
                                }
                            }
                        })
                    }
                })
            }
        }, a(r).ready(function(a) {
            e.UTIL.setupFormValidation()
        })
    }(jQuery, window, document);

    ! function(a, i, r) {
        var e = {};
        e.UTIL = {
            setupFormValidation: function() {
                a("#editPengajar").validate({
                    ignore: "",
                    rules: {
                        nama: {
                            required: !0
                        },
                        jenis_kelamin: {
                            required: !0
                        },
                        telepon: {
                            required: !0
                        },
                        tempat_lahir: {
                            required: !0
                        },
                        tanggal_lahir: {
                            required: !0
                        },
                        alamat: {
                            required: !0
                        },
                        gambar: {
                            accept: "image/*"
                        },
                    },
                    messages: {
                        nama: {
                            required: "Nama harap diisi!"
                        },
                        jenis_kelamin: {
                            required: "Jenis kelamin harap diisi!"
                        },
                        telepon: {
                            required: "No hp harap diisi!"
                        },
                        tempat_lahir: {
                            required: "Tempat lahir harap diisi!"
                        },
                        tanggal_lahir: {
                            required: "Tanggal lahir harap diisi!"
                        },
                        alamat: {
                            required: "Alamat harap diisi!"
                        },
                        gambar: {
                            accept: "Masukan file tipe gambar!"
                        },
                    },
                    submitHandler: function(a) {
                        // a.submit()

                        $.ajax({
                            url: a.action,
                            type: a.method,
                            data: $(a).serialize(),
                            success: function (response) {
                                if (response.status == true) {
                                    $("#nama, #jenis_kelamin, #alamat, #telepon, #tempat_lahir, #tanggal_lahir").val('');
                                    $("#gambar").next('.custom-file-label').removeClass("selected").html("Upload Gambar");
                                    tampilData()
                                    $("#modalTambah").modal('hide')
                                    Swal.fire({
                                        title : "Berhasil",
                                        text : "Berhasil di Tambahkan",
                                        icon : "success"
                                    })
                                } else {
                                    Swal.fire({
                                        title : "Oops",
                                        text : "Data Gagal di Inputkan",
                                        icon : "error"
                                    })
                                }
                            }
                        })
                    }
                })
            }
        }, a(r).ready(function(a) {
            e.UTIL.setupFormValidation()
        })
    }(jQuery, window, document);

    function hapusData(id)
    {
        Swal.fire({
            title : "Apakah Yakin ?",
            text : "Untuk Menghapus Data Ini",
            icon : "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url : "{{ url('/api/pengajar/') }}/" + id,
                    type : "POST",
                    data : { _token: "{{ csrf_token() }}", _method : "DELETE" },
                    success : function(response) {
                        if (response.status == true) {
                            tampilData()
                            Swal.fire(
                            'Berhasil!',
                            'Data Berhasil di Hapus',
                            'success'
                            )
                        } else {
                            Swal.fire(
                            'Gagal!',
                            'Data Gagal di Hapus',
                            'error'
                            )
                        }
                    }
                })
            } else {

            }
        })
    }


    tampilData();
</script>

@endsection
