@extends('.app.layouts.template')

@section('app_title', 'Detail Santri ' . $detail->nama_lengkap)

@section('app_content')

    <section class="section">
        <h3>
            @yield('app_title')
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('app/sistem/home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    @yield('app_title')
                </li>
            </ol>
        </nav>
    </section>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-search"></i> @yield('app_title')
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                        <div class="profile_img">
                            <div id="crop-avatar">
                                @if ($detail->foto == '')
                                    <img class="img-responsive avatar-view" src="{{ url('/gambar/gambar_user.png') }}"
                                        alt="">
                                @else
                                    <img class="img-responsive img-fluid avatar-view" src="{{ $detail->foto }}"
                                        width="100%">
                                @endif
                            </div>
                        </div>
                        <h3>
                            {{ $detail->nama_lengkap }}
                        </h3>

                        <ul class="list-unstyled user_data">
                            <li>
                                <i class="fa fa-map-marker user-profile-icon"></i>
                                {{ $detail->getKelas->nama_kelas }}
                            </li>

                            <li>
                                <i class="fa fa-briefcase user-profile-icon"></i>
                                {{ $detail->getJenjang->jenjang }}
                            </li>

                            <li class="m-top-xs">
                                <i class="fa fa-external-link user-profile-icon"></i>
                                {{ $detail->getHalaqah->nama_halaqah }}
                            </li>
                        </ul>

                        <h4>Skills</h4>
                        <ul class="list-unstyled user_data">
                            <li>
                                <p>Web Applications</p>
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                                </div>
                            </li>
                            <li>
                                <p>Website Design</p>
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                                </div>
                            </li>
                            <li>
                                <p>Automation & Testing</p>
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                                </div>
                            </li>
                            <li>
                                <p>UI / UX</p>
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                                </div>
                            </li>
                        </ul>

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="profile_title">
                            <div class="col-md-6">
                                <h2>
                                    Absensi Santri
                                </h2>
                            </div>
                        </div>

                        <div id="graph_bar" style="width: 100%; height: 280px"></div>
                        <div id="docPreview"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('app_scripts')
@endsection
