@extends("app.layouts.template")

@section("app_title", "Input Kehadiran")

@section("app_content")

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
                @yield("app_title")
            </h3>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    <i class="fa fa-plus"></i> Tambah Kehadiran
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form id="main" name="main" method="POST" class="form-horizontal">
                    @method("PUT")
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal"> Tanggal </label>
                                <input type="date" name="tanggal" class="form-control" value="{{ date("Y-m-d") }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode_halaqah"> Lokasi RT </label>
                                <select onchange="formAction('main')" name="kode_halaqah" class="form-control" id="kode_halaqah">
                                    <option value="">- Pilih -</option>
                                    @foreach ($data_halaqah as $data)
                                    @if (empty($edit))
                                    <option value="{{ $data->kode_halaqah }}">
                                        {{ $data->nama_halaqah }}
                                    </option>
                                    @else
                                    <option value="{{ $data->kode_halaqah }}" {{ ($edit->kode_halaqah == $data->kode_halaqah) ? "selected" : "" }}>
                                        {{ $data->nama_halaqah }}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="{{ url('/app/sistem/tambah_absensi') }}" method="POST">
                    @csrf
                    <div class="card-box table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Status Absen</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (empty($get_data_santri))
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <b>
                                            <i>
                                                Maaf, Data Santri Saat Ini Kosong. Silahkan Pilih Menu Lokasi RT Terlebih Dahulu
                                            </i>
                                        </b>
                                    </td>
                                </tr>
                                @else
                                @forelse ($get_data_santri as $data)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id_santri[]" value="{{ $data->id }}">
                                    </td>
                                    <td>{{ $data->nis }}</td>
                                    <td>{{ $data->nama_lengkap }}</td>
                                    <td>
                                        <select name="status_absen[]" class="form-control" id="status_absen">
                                            <option value="">- Pilih -</option>
                                            @foreach ($data_status_absen as $status)
                                            <option value="{{ $status->id }}">
                                                {{ $status->keterangan_absen }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="keterangan[]" id="keterangan" placeholder="Masukkan Keterangan">
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <b>
                                            <i>
                                                Maaf, Data Santri Saat Ini Kosong.
                                            </i>
                                        </b>
                                    </td>
                                </tr>
                                @endforelse
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="ln_solid"></div>
                    <button type="reset" class="btn btn-danger">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section("app_scripts")

<script type="text/javascript">
    function formAction(idForm, action, target = '')
    {
        if (target != '')
        {
            $('#'+idForm).attr('target', target);
        }
        $('#'+idForm).attr('action', action);
        console.log();
        $('#'+idForm).submit();
    }
</script>

@endsection
