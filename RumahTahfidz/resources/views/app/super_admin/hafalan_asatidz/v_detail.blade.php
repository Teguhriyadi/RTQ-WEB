@extends('.app.layouts.template')

@section('app_title', 'Hafalan Asatidz')

@section('app_content')

    <section class="section">
        <h3>
            @yield('app_title')
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('app/sistem/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data @yield('app_title')</li>
            </ol>
        </nav>
    </section>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-plus"></i> @yield('app_title')
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="quran_awal"> Quran Awal </label>
                            <select name="quran_awal" class="form-control" id="quran_awal">
                                <option value="">- Pilih -</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quran_awal"> Quran Awal </label>
                            <select name="quran_awal" class="form-control" id="quran_awal">
                                <option value="">- Pilih -</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quran_awal"> Quran Awal </label>
                            <select name="quran_awal" class="form-control" id="quran_awal">
                                <option value="">- Pilih -</option>
                            </select>
                        </div>
                        <div class="ln_solid"></div>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i> Batal
                        </button>
                        <button type="reset" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-book"></i>
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th>Quran Awal</th>
                                            <th>Quran Akhir</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($data_hafalan_asatidz as $data)
                                            <tr>
                                                <td class="text-center">{{ ++$no }}</td>
                                                <td>{{ $data->quran_awal }}</td>
                                                <td>{{ $data->quran_awal }}</td>
                                                <td>{{ $data->keterangan }}</td>
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

@endsection
