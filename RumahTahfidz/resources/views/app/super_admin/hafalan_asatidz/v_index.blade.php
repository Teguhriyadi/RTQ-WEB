@extends('.app.layouts.template')

@section('app_title', 'Hafalan Asatidz')

@section('app_content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                        <div class="col-md-12">
                            <div class="card-box table-responsive">
                                <table id="table-1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Nomor Induk</th>
                                            <th class="text-center">No. KTP</th>
                                            <th>Nama</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($data_asatidz as $data)
                                            <tr>
                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $data->nomor_induk }}</td>
                                                <td class="text-center">{{ $data->no_ktp }}</td>
                                                <td>{{ $data->getUser->nama }}</td>
                                                <td class="text-center">
                                                    <a href="" class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
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

    <!-- Tambah Data -->
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modalTambah">
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
                <form action="{{ url('/app/sistem/blog/') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quran_awal">Quran Awal</label>
                                    <select name="quran_awal" class="form-control" id="quran_awal" style="width: 100%">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quran_akhir">Quran Akhir</label>
                                    <select name="quran_akhir" class="form-control" id="quran_akhir" style="width: 100%">
                                        <option value="">- Pilih -</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="keterangan"> Keterangan </label>
                                    <textarea name="keterangan" class="form-control" id="keterangan" placeholder="Masukkan Keterangan"
                                        rows="5"></textarea>
                                </div>
                            </div>
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

@section('app_scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"
        integrity="sha512-RtZU3AyMVArmHLiW0suEZ9McadTdegwbgtiQl5Qqo9kunkVg1ofwueXD8/8wv3Af8jkME3DDe3yLfR8HSJfT2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            quranAwal();
            $('#quran_awal').select2();
            $('#quran_akhir').select2();
        })

        function quranAwal() {
            // $('.penduduk').select2({
            //     minimumInputLength: 3,
            //     allowClear: true,
            //     placeholder: 'Cari Penduduk',
            //     ajax: {
            //         dataType: 'json',
            //         url: 'http://arahan-lor.my.id/penduduk/json',
            //         delay: 800,
            //         data: function(params) {
            //             return {
            //                 search: params.term
            //             }
            //         },
            //         processResults: function(data, page) {
            //             return {
            //                 results: data
            //             };
            //         },
            //     }
            // });
            $.ajax({
                url: 'https://api.quran.sutanlab.id/surah',
                success: function(response) {
                    let optionSurat = '';
                    optionSurat += '<option>- Pilih -</option>'
                    response.data.forEach(surat => {
                        optionSurat += '<option value="' + surat.number + '">' + surat.name
                            .transliteration.id + '</option>'
                    });

                    $('#quran_awal').html(optionSurat);
                }
            })
        }
    </script>
@endsection
