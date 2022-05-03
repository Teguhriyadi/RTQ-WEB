@php
use Illuminate\Support\Str;
@endphp
@extends("app.layouts.template")

@section("app_title", "Rekap Absensi")

@section("app_content")


<h3>
    @yield("app_title")
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
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card-box table-responsive">
                            <table class="table table-hover table-bordered" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Jenjang</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($santri as $s)
                                    <tr>
                                        <th class="text-center">{{ $loop->iteration }}</th>
                                        <td>{{ $s->nis }}</td>
                                        <td>{{ $s->nama_lengkap }}</td>
                                        <td>{{ $s->getJenjang->jenjang }}</td>
                                        <th class="text-center">
                                            <a href="{{ url('app/sistem/rekap_absensi/'.$s->id) }}" class="btn btn-info text-white" title="Detail"><i class="fa fa-eye"></i></a>
                                        </th>
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

@section("app_scripts")

<script>

</script>

@endsection
