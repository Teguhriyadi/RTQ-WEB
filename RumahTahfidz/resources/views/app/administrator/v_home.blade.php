@extends("app.layouts.template")

@section("app_title", "Home")

@section("app_content")

<section class="section">
    <div class="section-header">
        <h1>
            @yield("app_title")
        </h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Home</div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Admin</h4>
                    </div>
                    <div class="card-body">
                        10
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>News</h4>
                    </div>
                    <div class="card-body">
                        42
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Reports</h4>
                    </div>
                    <div class="card-body">
                        1,201
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Online Users</h4>
                    </div>
                    <div class="card-body">
                        47
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Statistics</h4>
                    <div class="card-header-action">
                        <div class="btn-group">
                            <a href="#" class="btn btn-primary">Week</a>
                            <a href="#" class="btn">Month</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="myChart" height="158"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Informasi Login</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                        @php
                        use Carbon\Carbon;
                        @endphp
                        @foreach ($user_login as $login)
                        @php
                        $dataTime = Carbon::createFromFormat('Y-m-d H:i:s', $login->created_at);
                        @endphp
                        <li class="media">
                            <img class="mr-3 rounded-circle" width="50" src="{{ url('/template') }}/dist/assets/img/avatar/avatar-1.png" alt="avatar">
                            <div class="media-body">
                                <div class="float-right text-primary">{{ $dataTime->diffForHumans() }}</div>
                                <div class="media-title">{{ $login->nama }}</div>
                                <span class="text-small text-muted"></span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="text-center pt-1 pb-1">
                        <a href="{{ url('/app/sistem/informasi_login') }}" class="btn btn-primary btn-lg btn-round">
                            Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
