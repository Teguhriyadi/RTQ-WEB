@php
use Carbon\Carbon;
use App\Models\Iuran;
@endphp
@extends(".app.layouts.template")

@section('app_title', 'Validasi Iuran')

@section('app_content')

    <section class="section">
        <h3>
            @yield("app_title")
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
                    <h2>
                        <i class="fa fa-money"></i> Data @yield("app_title")
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box table-responsive">
                                <form action="{{ url('/app/sistem/iuran') }}" method="POST">
                                    @method("PUT")
                                    @csrf
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">NIS</th>
                                                <th>Nama</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Status Validasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_santri as $data)
                                                <?php
                                                $a = Iuran::get();
                                                $b = date('d-m-Y H:i', strtotime($a->created_at));
                                                echo $b->;
                                                ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <input type="checkbox" name="id_santri[]"
                                                            value="{{ $data->id_santri }}">
                                                    </td>
                                                    <td class="text-center">{{ $data->nis }}</td>
                                                    <td>{{ $data->nama_lengkap }}</td>
                                                    <td class="text-center">{{ $validasi->created_at }} |
                                                        {{ $ambil }}</td>
                                                    <td class="text-center">d</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="ln_solid"></div>
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
