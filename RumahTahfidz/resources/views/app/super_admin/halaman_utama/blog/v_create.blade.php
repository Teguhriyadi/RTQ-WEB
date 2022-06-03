@extends('.app.layouts.template')

@section('app_title', 'Tambah Blog')

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
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-plus"></i> @yield('app_title')
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-4">

                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id_kategori">Kategori</label>
                                                    <select name="id_kategori" class="form-control" id="id_kategori">
                                                        <option value="">- Pilih -</option>
                                                        @foreach ($data_kategori as $data)
                                                            <option value="">
                                                                {{ $data->kategori }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="judul"> Judul </label>
                                                    <input type="text" class="form-control" name="judul" id="judul"
                                                        placeholder="Masukkan Judul">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi"> Deskripsi </label>
                                            <div id="editor-one" class="editor-wrapper"></div>

                                            <textarea name="descr" id="descr" style="display:none;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
