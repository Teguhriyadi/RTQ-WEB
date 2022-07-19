@php
use App\Models\Administrasi;
use App\Models\Santri;
@endphp

@extends('.app.layouts.template')

@section('app_title', 'Administrasi Belum Lunas')

@section('app_content')

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

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-book"></i> Data @yield('app_title')
                    </h2>
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
                                            <th class="text-center">NIS</th>
                                            <th>Nama</th>
                                            <th class="text-center">Sisa</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($data_santri as $data)
                                            @php
                                                $total = Administrasi::where('id_santri', $data->id_santri)->get();

                                                $data_total = 0;
                                                foreach ($total as $s) {
                                                    $data_total += $s->nominal;
                                                }

                                                $santri = Santri::where('id', $data->id_santri)
                                                    ->where('status', 1)
                                                    ->first();

                                                if ($santri) {
                                                    $nominal_sekarang = $santri->getNominalIuran->nominal - $data_total;
                                                } else {
                                                    $nominal_sekarang = 0;
                                                }

                                            @endphp
                                            @if ($nominal_sekarang != 0)
                                                <tr>
                                                    <td class="text-center">{{ ++$no }}.</td>
                                                    <td class="text-center">{{ $data->getSantri->nis }}</td>
                                                    <td>{{ $data->getSantri->nama_lengkap }}</td>
                                                    <td class="text-center">Rp. {{ number_format($nominal_sekarang) }}
                                                    </td>
                                                    <td class="text-center">
                                                        <button onclick="editAdministrasi({{ $data->getSantri->id }})"
                                                            type="button" class="btn btn-warning btn-sm" id="btnEdit"
                                                            data-target="#modalEdit" data-toggle="modal">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endif
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

    <!-- Edit Data -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalEdit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa fa-plus"></i> Tambah Administrasi
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/app/sistem/administrasi/belum_lunas/tambah') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body" id="modal-content-edit">

                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                            <i class="fa fa-times"></i> Kembali
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm" id="btn-edit">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END -->

@endsection

@section('app_scripts')

    <script>
        function editAdministrasi(id) {
            $.ajax({
                url: "{{ url('/app/sistem/administrasi/belum_lunas/edit') }}",
                type: "GET",
                data: {
                    id: id
                },
                success: function(data) {
                    $("#modal-content-edit").html(data);
                    return true;
                }
            });
        }

        $(document).ready(function() {
            $("#table-1").dataTable();
        })
    </script>

@endsection
