@extends("app/administrator/layouts/template")

@section("app_title", "Data Pengajar")

@section("app_content")

<section class="section">
    <div class="section-header">
        <h1>Pengajar</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{ url('/app/admin/home') }}">Home</a>
            </div>
            <div class="breadcrumb-item">Data Pengajar</div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-6 col-12">
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
            <div class="modal-body">
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
                            <input type="text" class="form-control" id="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggal_lahir"> Tanggal Lahir </label>
                            <input type="date" class="form-control" id="tanggal_lahir">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat"> Alamat </label>
                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control" placeholder="Masukkan Alamat"></textarea>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Kembali</button>
                <button type="button" class="btn btn-primary" id="btn-tambah">
                    <i class="fa fa-plus"></i> Tambah
                </button>
            </div>
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
            <div class="modal-body">
                <input type="hidden" id="id">
                <input type="hidden" id="oldNoHp">
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
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Kembali</button>
                <button type="button" class="btn btn-success" id="btn-edit">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </div>
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
                console.log(response.data.nama);
                $("#id").val(id)
                $("#nm").val(response.data.nama)
                $("#jk").val(response.data.jenis_kelamin)
                // $("#address").val(alamat)
                $("#tlp").val(response.data.telepon)
                // $("#oldNoHp").val(response.data.telepon)
            })
            // let nama = $(this).data('nama');
            // let jenis_kelamin = $(this).data('jenis_kelamin');
            // let alamat = $(this).data('alamat');
            // let telepon = $(this).data('telepon');


        });

        $("#btn-tambah").on('click', function() {
            let nama = $("#nama").val().trim();
            let jenis_kelamin = $("#jenis_kelamin").val().trim();
            let alamat = $("#alamat").val().trim();
            let telepon = $("#telepon").val().trim();
            let tempat_lahir = $("#tempat_lahir").val().trim();
            let tanggal_lahir = $("#tanggal_lahir").val().trim();

            if (nama == "" || jenis_kelamin == "" || alamat == "" || telepon == "" || tempat_lahir == "" || tanggal_lahir == "") {
                Swal.fire({
                    title : "Oops",
                    text : "Data Tidak Boleh Kosong",
                    icon : "error"
                })
            } else {
                $.ajax({
                    url : "{{ url('/api/pengajar') }}",
                    type : "POST",
                    data : { nama : nama, jenis_kelamin : jenis_kelamin, tempat_lahir : tempat_lahir, tanggal_lahir : tanggal_lahir ,alamat : alamat, telepon : telepon, _token: "{{ csrf_token() }}" },
                    success : function(response) {
                        if (response.status == true) {
                            $("#nama").val('');
                            $("#jenis_kelamin").val('');
                            $("#alamat").val('');
                            $("#telepon").val('');
                            $("#tempat_lahir").val('');
                            $("#tanggal_lahir").val('');
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

        $("#btn-edit").on('click', function() {
            let id = $("#id").val().trim();
            let nama = $("#nm").val().trim();
            let jenis_kelamin = $("#jk").val().trim();
            let alamat = $("#address").val().trim();
            let telepon = $("#tlp").val().trim();
            let oldNoHp = $("#oldNoHp").val().trim();

            if (nama == "" || jenis_kelamin == "" || alamat == "" || telepon == "") {
                Swal.fire({
                    title : "Oops",
                    text : "Data tidak boleh kosong",
                    icon : "error"
                })
            } else {
                $.ajax({
                    url : "{{ url('/api/pengajar/') }}/" + id,
                    type : "POST",
                    data : { id : id, nama : nama, jenis_kelamin : jenis_kelamin, alamat : alamat, telepon : telepon, oldNoHp : oldNoHp , _token: "{{ csrf_token() }}", _method : "PUT" },
                    success : function(response) {
                        console.log(response)
                        if (response.status == true) {
                            $("#id").val('')
                            $("#nm").val('')
                            $("#jk").val()
                            $("#address").val()
                            $("#tlp").val()
                            $("#oldNoHp").val()
                            tampilData()
                            $("#modalEdit").modal('hide')
                            Swal.fire({
                                title : "Berhasil",
                                text : "Berhasil di Simpan",
                                icon : "success"
                            })
                        } else {
                            Swal.fire({
                                title : "Oops",
                                text : "Data Gagal di Simpan",
                                icon : "error"
                            })
                        }
                    }
                })
            }
        })
    })

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
                        console.log(response)
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
