@extends('.app.layouts.template')

@section('app_title', 'Edit Blog')

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
                            <form action="{{ url('/app/sistem/blog/simpan') }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $edit->id }}">
                                <input type="hidden" name="oldGambar" value="{{ $edit->foto }}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <center class="m-3">
                                            @if (empty($edit->foto))
                                                <img src="{{ url('gambar/gambar_user.png') }}"
                                                    class="rounded-circle profile-widget-picture gambar-preview img-fluid"
                                                    id="tampilGambar">
                                            @else
                                                <img src="{{ url('/storage/' . $edit->foto) }}"
                                                    class="rounded-circle profile-widget-picture gambar-preview img-fluid"
                                                    id="tampilGambar">
                                            @endif

                                        </center>
                                        <input type="file" onchange="previewImage()" name="foto" id="foto"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id_kategori">Kategori</label>
                                                    <select name="id_kategori" class="form-control" id="id_kategori">
                                                        <option value="">- Pilih -</option>
                                                        @foreach ($data_kategori as $data)
                                                            <option value="{{ $data->id }}"
                                                                {{ $data->id == $edit->id ? 'selected' : '' }}>
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
                                                        placeholder="Masukkan Judul" value="{{ $edit->judul }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi"> Deskripsi </label>

                                            <textarea name="deskripsi" id="deskripsi">{{ $edit->deskripsi }}</textarea>
                                        </div>

                                        <div class="ln_solid"></div>

                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-times"></i> Batal
                                        </button>
                                        <button class="btn btn-success btn-sm">
                                            <i class="fa fa-save"></i> Simpan
                                        </button>

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

@section('app_scripts')
    <script src="{{ url('vendors/tinymce/tinymce.min.js') }}"></script>
    <script>
        var editor_config = {
            path_absolute: '/',
            selector: 'textarea#deskripsi',
            relative_urls: false,
            height: 500,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
        }

        tinymce.init(editor_config);
    </script>
    <script type="text/javascript">
        function previewImage() {
            const image = document.querySelector("#foto");
            const imgPreview = document.querySelector(".gambar-preview");

            imgPreview.style.display = "block";

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
                $("#tampilGambar").addClass('mb-3');
                $("#tampilGambar").height("250");
            }
        }
    </script>
@endsection
