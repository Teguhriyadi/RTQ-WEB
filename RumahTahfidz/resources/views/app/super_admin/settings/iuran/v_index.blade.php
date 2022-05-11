@extends(".app.layouts.template")

@section('app_title', 'Settings Iuran')

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
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    <i class="fa fa-calendar"></i> Data @yield("app_title")
                </h2>
                <div class="clearfix"></div>
            </div>
            @if (empty($data))
            <form action="{{ url('/app/sistem/setting/iuran/') }}" method="POST">
                @else
                <form action="{{ url('/app/sistem/setting/iuran/'.$data->id) }}" method="POST">
                    @method("PUT")
                    @endif
                    @csrf
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mulai"> Mulai </label>
                                    <input type="text" class="form-control" name="mulai" id="mulai" placeholder="Masukkan Tanggal Mulai" value="{{ (empty($data->mulai)) ? "" : $data->mulai }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="akhir"> Akhir </label>
                                    <input type="text" class="form-control" name="akhir" id="akhir" placeholder="Masukkan Tanggal Akhir" value="{{ (empty($data->akhir)) ? "" : $data->akhir }}">
                                </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i> Batal
                        </button>
                        @if (empty($data))
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                        @else
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection
