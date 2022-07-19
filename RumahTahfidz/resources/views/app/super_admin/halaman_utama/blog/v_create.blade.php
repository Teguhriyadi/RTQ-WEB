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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <div class="clearfix"></div>
    @endif

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
                            <form action="{{ url('/app/sistem/blog') }}" method="POST" enctype="multipart/form-data"
                                id="formTambahBerita">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-4">
                                        <center class="m-3">
                                            <img src="{{ url('gambar/gambar_user.png') }}"
                                                class="rounded-circle profile-widget-picture gambar-preview img-fluid"
                                                id="tampilGambar">

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
                                                            <option value="{{ $data->id }}">
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

                                            <textarea name="deskripsi" id="deskripsi"></textarea>
                                        </div>

                                        <div class="ln_solid"></div>

                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-times"></i> Batal
                                        </button>
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fa fa-plus"></i> Tambah
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
    <script>
        (function($, W, D) {
            var JQUERY4U = {};
            JQUERY4U.UTIL = {
                setupFormValidation: function() {
                    $("#formTambahBerita").validate({
                        ignore: "",
                        rules: {
                            logo: {
                                required: true,
                                accept: true
                            },
                            id_kategori: {
                                required: true
                            },
                            judul: {
                                required: true
                            },
                            deskripsi: {
                                required: true
                            }
                        },
                        messages: {
                            logo: {
                                required: "Foto harap di isi!",
                                accept: "Masukan format gambar yang sesuai!"
                            },
                            id_kategori: {
                                required: "Kategori harap di isi!"
                            },
                            judul: {
                                required: "Judul harap di isi!"
                            },
                            deskripsi: {
                                required: "Deskripsi harap di isi!"
                            }
                        },
                        submitHandler: function(form) {
                            form.submit()
                        }
                    });
                }
            }
            $(D).ready(function($) {
                JQUERY4U.UTIL.setupFormValidation()
            })
        })(jQuery, window, document)
    </script>
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
