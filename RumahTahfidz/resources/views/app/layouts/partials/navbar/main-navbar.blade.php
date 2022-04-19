@php
    $terakhirLogin = \App\Models\TerakhirLogin::where("id_user", auth()->user()->id)->get();
    foreach ($terakhirLogin as $tl) {
        $record = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $tl->created_at);
    }
@endphp
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>

        </ul>
        <div class="search-element">
            <div class="search-result">
                <div class="search-header">
                    Histories
                </div>
                <div class="search-item">
                    <a href="#">How to hack NASA using CSS</a>
                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-item">
                    <a href="#">Kodinger.com</a>
                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-item">
                    <a href="#">#Stisla</a>
                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-header">
                    Result
                </div>
                <div class="search-item">
                    <a href="#">
                        <img class="mr-3 rounded" width="30" src="{{ url('/template') }}/dist/assets/img/products/product-3-50.png" alt="product">
                        oPhone S9 Limited Edition
                    </a>
                </div>
                <div class="search-item">
                    <a href="#">
                        <img class="mr-3 rounded" width="30" src="{{ url('/template') }}/dist/assets/img/products/product-2-50.png" alt="product">
                        Drone X2 New Gen-7
                    </a>
                </div>
                <div class="search-item">
                    <a href="#">
                        <img class="mr-3 rounded" width="30" src="{{ url('/template') }}/dist/assets/img/products/product-1-50.png" alt="product">
                        Headphone Blitz
                    </a>
                </div>
                <div class="search-header">
                    Projects
                </div>
                <div class="search-item">
                    <a href="#">
                        <div class="search-icon bg-danger text-white mr-3">
                            <i class="fas fa-code"></i>
                        </div>
                        Stisla Admin Template
                    </a>
                </div>
                <div class="search-item">
                    <a href="#">
                        <div class="search-icon bg-primary text-white mr-3">
                            <i class="fas fa-laptop"></i>
                        </div>
                        Create a new Homepage Design
                    </a>
                </div>
            </div>
        </div>
    </form>
    <ul class="navbar-nav navbar-right">
        @can('super_admin')
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">
                    Pesan
                </div>
                <div class="dropdown-list-content dropdown-list-message">
                    <?php
                        $data_pesan = App\Models\Pesan::paginate(3);
                    ?>

                    @foreach($data_pesan as $data)
                    @php
                        $dataTime = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at);
                    @endphp
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-avatar">
                            <img alt="image" src="{{ url('/template') }}/dist/assets/img/avatar/avatar-1.png" class="rounded-circle">
                            <div class="is-online"></div>
                        </div>
                        <div class="dropdown-item-desc">
                            <b>{{ $data->nama }}</b>
                            <p>{{ $data->pesan }}</p>
                            <div class="time">
                                {{ $dataTime->diffForHumans() }}
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                <div class="dropdown-footer text-center">
                    <a href="{{ url('/app/admin/pesan') }}"> Selengkapnya
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </li>
        @endcan
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                @if (Auth::user()->gambar == NULL)
                <img alt="image" src="{{ url('/template') }}/dist/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                @else
                <img src="{{ url('/storage/'.Auth::user()->gambar) }}" class="rounded-circle mr-1">
                @endif

                <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->nama }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">{{ $record->diffForHumans() }}</div>
                <a href="{{ url('/app/sistem/profil') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profil
                </a>
                <a href="{{ url('/app/sistem/informasi_login') }}" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i> Informasi Login
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" onclick="logout()" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
