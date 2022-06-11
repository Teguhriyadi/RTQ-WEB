@extends('.app.layouts.template')

@section('app_title', 'Dokumentasi')

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
                    Data @yield('app_title')
                </li>
            </ol>
        </nav>
    </section>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        @yield('app_title')
                    </h2>
                    <div class="pull-right">
                        <button class="btn btn-primary btn-sm" data-target="#modalTambah" data-toggle="modal">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        @foreach ($data_dokumentasi as $data)
                            <div class="col-md-55">
                                <div class="thumbnail">
                                    <div class="image view view-first">
                                        <img style="width: 100%; display: block;"
                                            src="{{ url('/storage/' . $data->gambar) }}" alt="image" />
                                        <div class="mask">
                                            <p>Your Text</p>
                                            <div class="tools tools-bottom">
                                                <a href="#">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <p>
                                            {{ $data->judul }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambah Data -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalTambah">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa fa-plus"></i>
                        <span>Tambah Data</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/app/sistem/dokumentasi/') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="judul"> Judul </label>
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul">
                        </div>
                        <div class="form-group">
                            <label for="gambar"> Foto </label>
                            <img class="gambar-preview img-fluid">
                            <input type="file" class="form-control" name="gambar" id="gambar" onchange="imagePreview()">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                            <i class="fa fa-times"></i> Kembali
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-save"></i> Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END -->

@endsection
