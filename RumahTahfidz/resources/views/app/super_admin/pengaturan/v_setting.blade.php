@extends('.app.layouts.template')

@section('app_title', 'Setting Konfigurasi')

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
        <div class="col-md-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-gears"></i> Setting Kriteria Penilaian
                    </h2>
                    <button class="btn btn-success btn-sm pull-right" data-target="#modalSettingNilai" data-toggle="modal">
                        <i class="fa fa-search"></i> Lihat Pengaturan
                    </button>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="{{ url('/app/sistem/pengaturan/setting_laporan_nilai') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="setting_nama"> Setting Nama Penilaian </label>
                                    <input type="text" name="setting_nama" id="setting_nama" class="form-control"
                                        placeholder="Masukkan Settingan Nama">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="setting_nilai"> Setting Persen Nilai (%)</label>
                                    <input type="number" name="setting_nilai" id="setting_nilai" class="form-control"
                                        placeholder="0" min="10">
                                </div>
                            </div>
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

    <!-- Setting Nilai -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalSettingNilai">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa fa-edit"></i>
                        <span>Data @yield('app_title')</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th class="text-center">Persen %</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0;
                            @endphp
                            @forelse ($data_setting_laporan_nilai as $data)
                                <form
                                    action="{{ url('/app/sistem/pengaturan/setting_laporan_nilai/' . encrypt($data->id)) }}"
                                    method="POST">
                                    @method('PUT')
                                    @csrf
                                    <tr>
                                        <td class="text-center">{{ ++$no }}.</td>
                                        <td>
                                            <input type="text" class="form-control" name="setting_nama" id="setting_nama"
                                                placeholder="Masukkan Setting Nama Nilai" value="{{ $data->setting_nama }}">
                                        </td>
                                        <td>
                                            <select name="setting_status" class="form-control" id="setting_status">
                                                <option value="">- Pilih -</option>
                                                <option value="1" {{ $data->setting_status == 1 ? 'selected' : '' }}>
                                                    Aktif</option>
                                                <option value="0" {{ $data->setting_status == 0 ? 'selected' : '' }}>
                                                    Non-Aktif
                                                </option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <input type="number" name="setting_nilai" class="form-control" min="10"
                                                placeholder="0" value="{{ $data->setting_nilai }}">
                                        </td>
                                        <td class="text-center">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                Simpan
                                            </button>
                                        </td>
                                    </tr>
                                </form>
                            @empty
                                <tr>
                                    <td></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END -->

@endsection
