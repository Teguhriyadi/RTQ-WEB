@extends('app.layouts.template')

@section('app_title', 'Profil User')

@section('app_content')
    <section class="section">
        <h3>
            @yield('app_title') {{ $user->nama }}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('app/sistem/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('app/sistem/users') }}">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">@yield('app_title')</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $user->nama }}</li>
            </ol>
        </nav>
    </section>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-4 col-sm-4  profile_left">
            <div class="x_panel">
                <div class="x_title">
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="profile_img">
                        <div id="crop-avatar">

                            <img class="img-responsive avatar-view" src="{{ $user->gambar }}"
                                onerror="this.onerror = null; this.src = '{{ url('gambar/no-images.png') }}'" alt="Avatar"
                                title="Change the avatar" width="100%" height="255">
                        </div>
                    </div>
                    <h3>{{ $user->nama }}</h3>
                    <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> {{ $user->alamat }}
                        </li>
                        <li>
                            <i class="fa fa-briefcase user-profile-icon"></i> Daftar Hak Akses
                            <ul>
                                @php
                                    $hak_akses = \App\Models\HakAkses::where('id_user', $user->id)->get();
                                @endphp
                                @foreach ($hak_akses as $akses)
                                    <li>{{ $akses->getRole->keterangan }}</li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <a class="btn btn-success btn-sm" href="{{ url('app/sistem/users/' . $user->id . '/edit') }}"><i
                            class="fa fa-edit m-right-xs"></i> Edit Profil</a>
                    <br />
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-8 ">
            <div class="x_panel">
                <div class="x_title">
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Status</th>
                                <td>{{ $user->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>No Telepon</th>
                                <td>{{ $user->no_hp }}</td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td>{{ $user->tempat_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ $user->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{ $user->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            </tr>
                            @if ($user->getAsatidz)
                                <tr>
                                    <th>No. KTP</th>
                                    <td>{{ $user->getAsatidz->no_ktp }}</td>
                                </tr>
                                <tr>
                                    <th>NIP</th>
                                    <td>{{ $user->getAsatidz->nomor_induk }}</td>
                                </tr>
                                <tr>
                                    <th>Pendidikan Terakhir</th>
                                    <td>{{ $user->getAsatidz->pendidikan_terakhir }}</td>
                                </tr>
                                <tr>
                                    <th>Aktivitas Utama</th>
                                    <td>{{ $user->getAsatidz->aktivitas_utama }}</td>
                                </tr>
                                <tr>
                                    <th>Motivasi Mengajar</th>
                                    <td>{{ $user->getAsatidz->motivasi_mengajar }}</td>
                                </tr>
                            @elseif ($user->getAdminLokasiRt)
                                <tr>
                                    <th>Pendidikan Terakhir</th>
                                    <td>{{ $user->getAdminLokasiRt->pendidikan_terakhir }}</td>
                                </tr>
                                <tr>
                                    <th>Rumah Tahfidz Cabang</th>
                                    <td>{{ $user->getAdminLokasiRt->getLokasiRt->lokasi_rt }}</td>
                                </tr>
                            @elseif ($user->getWaliSantri)
                                <tr>
                                    <th>No. KTP</th>
                                    <td>{{ $user->getWaliSantri->no_ktp }}</td>
                                </tr>
                                <tr>
                                    <th>No. KK</th>
                                    <td>{{ $user->getWaliSantri->no_kk }}</td>
                                </tr>
                                <tr>
                                    <th>Rumah Tahfidz Cabang</th>
                                    <td>{{ $user->getWaliSantri->getHalaqah->getLokasiRt->lokasi_rt }}</td>
                                </tr>
                            @endif

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
