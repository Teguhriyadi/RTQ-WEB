@php
use App\Models\Santri;
@endphp

@extends('.app.layouts.template')

@section('app_title', 'Data Konfirmasi Santri')

@section('app_content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    @yield('app_title')
                </h3>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-users"></i> Santri
                    </h2>
                    <div class="pull-right">
                        @php
                            $count_santri = Santri::where('status', 0)->count();
                        @endphp
                        @if (empty($count_santri))
                            <a target="_blank" href="{{ url('/app/sistem/santri') }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-sign-in"></i> Lihat Data Santri
                            </a>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NIS.</th>
                                            <th>Nama</th>
                                            <th>Sekolah</th>
                                            <th>Nama Wali</th>
                                            <th>Jenjang</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 0 @endphp
                                        @foreach ($data_santri as $data)
                                            <tr>
                                                <td class="text-center">{{ $data->nis }}.</td>
                                                <td>{{ $data->nama_lengkap }}</td>
                                                <td>{{ $data->sekolah }}</td>
                                                <td>{{ $data->getWali->getUser->nama }}</td>
                                                <td>{{ $data->getJenjang->jenjang }}</td>
                                                <td class="text-center">
                                                    <button onclick="editTesSantri({{ $data->id }})" type="button"
                                                        class="btn btn-warning btn-sm text-white" id="btnEdit"
                                                        data-target="#modalEdit" data-toggle="modal">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <form action="{{ url('/app/sistem/tes/data/' . $data->id) }}"
                                                        method="POST" style="display: inline">
                                                        @method('PUT')
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-success btn-sm">
                                                            <i class="fa fa-check"></i> Konfirmasi
                                                        </button>
                                                    </form>
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

    <!-- Edit Data -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalEdit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa fa-edit"></i> Edit Data
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/app/sistem/tes/simpan_data') }}" method="POST">
                    @method('PUT')
                    {{ csrf_field() }}
                    <div class="modal-body" id="modal-content-edit">

                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                            <i class="fa fa-times"></i> Kembali
                        </button>
                        <button type="submit" class="btn btn-success btn-sm" id="btn-edit">
                            <i class="fa fa-save"></i> Simpan
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
        function editTesSantri(id) {
            $.ajax({
                url: "{{ url('/app/sistem/tes/edit') }}",
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
