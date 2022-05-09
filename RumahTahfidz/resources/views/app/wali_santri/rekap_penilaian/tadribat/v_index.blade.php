@php
use Illuminate\Support\Str;
@endphp
@extends("app.layouts.template")

@section("app_title", "Rekap Penilaian Tadribat")

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
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($santri as $s)
                                    <tr>
                                        <th class="text-center">{{ $loop->iteration }}</th>
                                        <td>{{ $s->nis }}</td>
                                        <td>{{ $s->nama_lengkap }}</td>
                                        <th class="text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                                    Jenjang
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @foreach ($jenjang as $j)
                                                    <a class="dropdown-item" href="#">{{ $j->jenjang }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
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
