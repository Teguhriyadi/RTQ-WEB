@extends('.app.layouts.template')

@section('app_title', 'Rekap Iuran')

@section('app_content')

    @php
    use App\Models\Iuran;
    @endphp

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

    <form action="{{ url('/app/sistem/generate/iuran/') }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12">
                <input type="date" class="form-control" name="tanggal_awal"
                    value="{{ empty($tanggal_awal) ? '' : $tanggal_awal }}">
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12">
                <input type="date" class="form-control" name="tanggal_akhir"
                    value="{{ empty($tanggal_akhir) ? '' : $tanggal_akhir }}">
            </div>
            <div class="col-md-2 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fa fa-search"></i> Cari
                </button>
            </div>
        </div>
    </form>

    <br>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        Data @yield('app_title') | <b>{{ empty($tanggal_awal) ? '' : $tanggal_awal }}</b> -
                        <b>{{ empty($tanggal_akhir) ? '' : $tanggal_akhir }}</b>
                    </h2>
                    <div class="pull-right">
                        <button class="btn btn-danger btn-sm">
                            <i class="fa fa-download"></i> PDF
                        </button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="card-box table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">NIS</th>
                                    <th>Nama Santri</th>
                                    <th class="text-center">Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @if (empty($data_asatidz))
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            <i>
                                                <b>Data Kosong</b>
                                            </i>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($data_asatidz as $data)
                                        @php
                                            $count = Asatidz::get();
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{ ++$no }}.</td>
                                            <td class="text-center">{{ $nis }}</td>
                                            <td>{{ $nama_lengkap }}</td>
                                            <td class="text-center"></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-center">
                                        <b>
                                            Total
                                        </b>
                                    </td>
                                    <td colspan="1" class="text-center">
                                        <b>
                                            @if (empty($total))
                                                Rp. 0
                                            @else
                                                Rp. {{ number_format($total) }}
                                            @endif

                                        </b>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
