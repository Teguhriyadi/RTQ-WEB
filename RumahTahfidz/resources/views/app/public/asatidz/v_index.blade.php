@extends('.app.layouts.template')

@section('app_title', 'Asatidz')

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
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-users"></i> Data @yield('app_title')
                    </h2>
                    @if (Auth::user()->getAkses->id_role == 1)
                    @else
                        <div class="pull-right">
                            <a href="{{ url('/app/sistem/asatidz/create') }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i> Tambah
                            </a>
                        </div>
                    @endif

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">NIK</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th class="text-center">No. HP</th>
                                            <th class="text-center">Jenis Kelamin</th>
                                            @if (Auth::user()->getAkses->id_role == 1)
                                            @else
                                                <th class="text-center">Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 0 @endphp
                                        @foreach ($data_asatidz as $asatidz)
                                            <tr>
                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $asatidz->nomor_induk }}</td>
                                                <td>{{ $asatidz->getUser->nama }}</td>
                                                <td>
                                                    @if (empty($asatidz->getUser->email))
                                                        -
                                                    @else
                                                        {{ $asatidz->getUser->email }}
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $asatidz->getUser->no_hp }}</td>
                                                <td class="text-center">
                                                    @if ($asatidz->getUser->jenis_kelamin == 'L')
                                                        Laki - Laki
                                                    @elseif ($asatidz->getUser->jenis_kelamin == 'P')
                                                        Perempuan
                                                    @endif
                                                </td>
                                                @if (Auth::user()->getAkses->id_role == 1)
                                                @else
                                                    <td class="text-center">
                                                        <a href="{{ url('/app/sistem/asatidz/edit/' . $asatidz->id) }}"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                        <button id="deleteAsatidz" data-id="{{ $asatidz->id }}"
                                                            class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i> Hapus
                                                        </button>
                                                    </td>
                                                @endif
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

@endsection

@section('app_scripts')

    <script>
        $(document).ready(function() {
            $("#table-1").dataTable();
        })

        $('body').on('click', '#deleteAsatidz', function() {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form_string =
                        "<form method=\"POST\" action=\"{{ url('/app/sistem/asatidz/') }}/" +
                        id +
                        "\" accept-charset=\"UTF-8\"><input name=\"_method\" type=\"hidden\" value=\"DELETE\"><input name=\"_token\" type=\"hidden\" value=\"{{ csrf_token() }}\"></form>"

                    form = $(form_string)
                    form.appendTo('body');
                    form.submit();
                } else {
                    Swal.fire('Konfirmasi Diterima!', 'Data Anda Masih Terdata', 'success');
                }
            })
        })
    </script>

@endsection
