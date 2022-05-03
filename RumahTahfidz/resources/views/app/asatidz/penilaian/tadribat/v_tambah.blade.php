@extends("app.layouts.template")

@section("app_title", "Penilaian Tadribat")

@section("app_content")

<div class="">
    <div class="panel-title">
        <div class="title_left">
            <h3>
                @yield("app_title")
            </h3>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<form id="main" name="main" method="POST">
    @method("PUT")
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_content">
                    <div class="form-group">
                        <input type="date" class="form-control" value="{{ date("Y-m-d") }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_content">
                    <div class="form-group">
                        <select name="id_jenjang" class="form-control" id="id_jenjang">
                            <option value="">- Pilih -</option>
                            @foreach ($data_jenjang as $jenjang)
                            <option value="{{ $jenjang->id }}">
                                {{ $jenjang->id }} - {{ $jenjang->jenjang }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_content">
                    <div class="form-group">
                        <select onchange="formAction('main')" name="kode_halaqah" class="form-control" id="kode_halaqah">
                            <option value="">- Pilih -</option>
                            @foreach ($data_halaqah as $halaqah)
                            <option value="{{ $halaqah->kode_halaqah }}">
                                {{ $halaqah->kode_halaqah }} - {{ $halaqah->nama_halaqah }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    <i class="fa fa-book"></i> Data Penilaian Santri
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="{{ url('/app/sistem/nilai/tadribat/') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th class="text-center">NIS</th>
                                            <th class="text-center">Nama</th>
                                            <th>Halaman</th>
                                            <th>Bagian</th>
                                            <th class="text-center">Nilai</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (empty($data_santri))
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                <i>
                                                    <b>
                                                        Maaf, Data Santri Kosong
                                                    </b>
                                                </i>
                                            </td>
                                        </tr>
                                        @else
                                        @forelse ($data_santri as $data)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="id_santri[]" value="{{ $data->id }}">
                                            </td>
                                            <td class="text-center">{{ $data->nis }}</td>
                                            <td>{{ $data->nama_lengkap }}</td>
                                            <td width="150">
                                                <input type="text" class="form-control" name="halaman[]">
                                            </td>
                                            <td width="200">
                                                <input type="text" class="form-control" name="bagian[]">
                                            </td>
                                            <td width="100">
                                                <input type="number" class="form-control" name="nilai[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="keterangan[]">
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                <i>
                                                    <b>Maaf, Data Santri Saat Ini Kosong</b>
                                                </i>
                                            </td>
                                        </tr>
                                        @endforelse
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
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
