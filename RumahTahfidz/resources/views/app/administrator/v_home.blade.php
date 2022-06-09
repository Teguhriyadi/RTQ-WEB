@php
use App\Models\Iuran;
use App\Models\SettingIuran;
@endphp

@extends('app.layouts.template')

@section('app_title', 'Home')

@section('app_content')

    @foreach ($data_santri as $data)
        @php
            $iuran = SettingIuran::first();
            $validasi = Iuran::where('id_santri', $data->id)->first();
        @endphp
    @endforeach

    <div class="row top_tiles">
        <div class="col-sm-12">
            <div class="alert bg-success text-white">
                <p style="font-size: 20px; margin-bottom: 0">Selamat Datang <b>{{ auth()->user()->nama }}</b> <br> Anda
                    login sebagai <b>{{ auth()->user()->getHakAkses->getRole->keterangan }}</b></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_content">
                    <canvas id="graph_bar" style="width:100%; height:280px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="animated flipInY col-md-6">
                    <div class="tile-stats">
                        <div class="icon">
                            <i class="fa fa-caret-square-o-right"></i>
                        </div>
                        <div class="count">{{ $jumlah_user }}</div>
                        <h3>User</h3>
                        <a href="{{ url('/app/sistem/users') }}" style="padding: 10px;">
                            <i class="fa fa-sign-out"></i> Selengkapnya
                        </a>
                    </div>
                </div>
                <div class="animated flipInY col-md-6">
                    <div class="tile-stats">
                        <div class="icon">
                            <i class="fa fa-caret-square-o-right"></i>
                        </div>
                        <div class="count">{{ $jumlah_asatidz }}</div>
                        <h3>Asatidz</h3>
                        <a href="{{ url('/app/sistem/asatidz') }}" style="padding: 10px;">
                            <i class="fa fa-sign-out"></i> Selengkapnya
                        </a>
                    </div>
                </div>
                <div class="animated flipInY col-md-6">
                    <div class="tile-stats">
                        <div class="icon">
                            <i class="fa fa-caret-square-o-right"></i>
                        </div>
                        <div class="count">{{ $jumlah_santri }}</div>
                        <h3>Santri</h3>
                        <a href="{{ url('/app/sistem/santri') }}" style="padding: 10px;">
                            <i class="fa fa-sign-out"></i> Selengkapnya
                        </a>
                    </div>
                </div>
                <div class="animated flipInY col-md-6">
                    <div class="tile-stats">
                        <div class="icon">
                            <i class="fa fa-caret-square-o-right"></i>
                        </div>
                        <div class="count">{{ $jumlah_admin_lokasi_rt }}</div>
                        <h3>Admin Cabang</h3>
                        <a href="{{ url('/app/sistem/admin_lokasi_rt') }}" style="padding: 10px;">
                            <i class="fa fa-sign-out"></i> Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                Informasi Login <small>Users</small>
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="card-box table-responsive">
                                        <table class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="10">No.</th>
                                                    <th>Nama</th>
                                                    <th class="text-center">Waktu</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php use Carbon\Carbon; @endphp
                                                @php $no = 0 @endphp
                                                @foreach ($user_login as $data)
                                                    @php
                                                        $dataTime = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at);
                                                    @endphp
                                                    <tr>
                                                        <td class="text-center">.{{ ++$no }}.</td>
                                                        <td>{{ $data->nama }}</td>
                                                        <td class="text-center">{{ $dataTime->diffForHumans() }}</td>
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
        </div>
    </div>
@endsection

@section('app_scripts')
    <script src="{{ url('') }}/vendors/echarts/dist/echarts.min.js"></script>

    <script>
        const ctx = document.getElementById('graph_bar').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ],
                datasets: [{
                    label: 'Kehadiran',
                    data: [
                        @php
                            for ($bulan = 1; $bulan <= 12; $bulan++) {
                                $data = \App\Models\Iuran::whereMonth('created_at', $bulan)
                                    ->whereYear('created_at', date('Y'))
                                    ->get();
                                $nominal = 0;
                                foreach ($data as $item) {
                                    $nominal += $item->nominal;
                                }
                                echo $nominal . ',';
                            }
                        @endphp
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
