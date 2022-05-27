@php
use App\Models\Nilai;
use App\Models\Jenjang;
@endphp
@extends('app.layouts.template')

@section('app_title', 'Rekap Nilai ')

@section('app_content')

    <h3>
        @yield('app_title')
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('app/sistem/home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('app_title')</li>
        </ol>
    </nav>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        @yield('app_title')
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-4">
                            <form action="{{ url('/app/sistem/rekap_nilai/' . $detail->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for=""> Jenjang </label>
                                    <select name="id_jenjang" class="form-control" id="id_jenjang" onchange="cek_db()">
                                        <option value="">- Pilih -</option>
                                        @foreach ($getNilaiId as $item)
                                            <option value="{{ $item->getKategoriPelajaran->getJenjang->id }}">
                                                {{ $item->getKategoriPelajaran->getJenjang->jenjang }}
                                            </option>
                                        @endforeach
                                        <input type="hidden" name="coba" id="coba">

                                        {{-- @foreach ($data_jenjang as $item)
                                            <option value="">
                                                {{ $item->jenjang }}
                                            </option>
                                        @endforeach --}}
                                        {{-- @foreach ($data_nilai_jenjang as $data)
                                            @if (empty($getId))
                                                <option value="{{ $data->getKategoriPelajaran->getJenjang->id }}">
                                                    {{ $data->getKategoriPelajaran->getJenjang->jenjang }}
                                                @else
                                                <option value="{{ $data->getKategoriPelajaran->getJenjang->id }}"
                                                    {{ $getId == $data->getKategoriPelajaran->getJenjang->id ? 'selected' : '' }}>
                                                    {{ $data->getKategoriPelajaran->getJenjang->jenjang }}
                                                </option>
                                            @endif
                                        @endforeach --}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <div class="card-box table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">NIS</th>
                                            <th>Nama</th>
                                            <th>Pelajaran</th>
                                            <th class="text-center">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                            // $ambil_data_nilai = Nilai::where('')->get();
                                        @endphp
                                        @if (empty($getNilaiId))
                                            <tr>
                                                <td colspan="5">
                                                    <i>
                                                        <b>
                                                            Pilih Jenjang Terlebih Dahulu
                                                        </b>
                                                    </i>
                                                </td>
                                            </tr>
                                        @else
                                            @forelse ($getNilaiId as $data)
                                                <tr>
                                                    <td class="text-center">{{ ++$no }}.</td>
                                                    <td class="text-center">{{ $data->getSantri->nis }}</td>
                                                    <td>{{ $data->getSantri->nama_lengkap }}</td>
                                                    <td>{{ $data->getKategoriPelajaran->getPelajaran->nama_pelajaran }}
                                                    </td>
                                                    <td class="text-center">{{ $data->nilai }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5">
                                                        <i>
                                                            <b>
                                                                Data Tidak Ada
                                                            </b>
                                                        </i>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        @endif
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#id_jenjang').change(function() {
                $('#coba').val($(this).val());
            })
        })

        function cek_db(id) {
            // var id_jenjang = $("#id_jenjang").val();
            // $.ajax({
            //     url: "{{ url('/app/sistem/ambil_data') }}",
            //     data: {
            //         id: id
            //     },
            // }).success(function(data) {
            //     var json = data,
            //         obj = JSON.parse(json);
            //     $("#coba").val(obj.id);
            // });
        }
    </script>

    <script type="text/javascript">
        function formAction(idForm, action, target = '') {
            if (target != '') {
                $('#' + idForm).attr('target', target);
            }
            $('#' + idForm).attr('action', action);
            console.log();
            $('#' + idForm).submit();
        }
    </script>

@endsection
