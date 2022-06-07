@php
use Carbon\Carbon;
@endphp
@extends('.app.layouts.template')

@section('app_title', 'Rekap Absensi Asatidz')

@section('app_content')

    <section class="section">
        <h3>
            @yield('app_title')
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('app/sistem/home') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ url('app/sistem/laporan/asatidz') }}">Laporan</a></li>
                <li class="breadcrumb-item active"><a href="{{ url('app/sistem/laporan/asatidz') }}">Absensi</a></li>
                <li class="breadcrumb-item active"><a href="{{ url('app/sistem/laporan/asatidz') }}">Asatidz</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $asatidz->nama }}</li>
            </ol>
        </nav>
    </section>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-8 col-sm-8 ">
            <div class="x_panel">
                <div class="x_title">
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="profile_title">
                        <div class="col-md-6">
                            <h2>Grafik Kehadiran Asatidz</h2>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>

                    <canvas id="graph_bar" style="width:100%; height:280px;"></canvas>

                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4  profile_left">
            <div class="x_panel">
                <div class="x_title">
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="profile_img">
                        <div id="crop-avatar">

                            <img class="img-responsive avatar-view" src="{{ $asatidz->gambar }}"
                                onerror="this.onerror = null; this.src = '{{ url('gambar/no-images.png') }}'" alt="Avatar"
                                title="Change the avatar" width="100%" height="255">
                        </div>
                    </div>
                    <h3 class="text-center">{{ $asatidz->nama }}</h3>
                    <hr>
                    <ul class="messages">
                        @foreach ($absensi as $a)
                            <li>
                                <img src="{{ $a->gambar }}" class="avatar" alt="Avatar">
                                <div class="message_date">
                                    <h3 class="date text-info">
                                        {{ Carbon::createFromFormat('Y-m-d H:i:s', $a->created_at)->isoFormat('D') }}</h3>
                                    <p class="month">
                                        {{ Carbon::createFromFormat('Y-m-d H:i:s', $a->created_at)->isoFormat('MMMM') }}
                                    </p>
                                </div>
                                <div class="message_wrapper">
                                    <h4 class="heading">{{ $a->getAsatidz->getUser->nama }}</h4>
                                    <blockquote class="message">
                                        {{ $a->alamat }}
                                    </blockquote>
                                    <br />
                                    <p class="url">
                                        <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                        <a href="{{ $a->gambar }}" id="btnLampiran" data-target="#modal-lampiran"
                                            data-toggle="modal"><i class="fa fa-paperclip"></i>
                                            Lampiran </a>
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modal-lampiran">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <center class="modal-body">
                    <div id="modal-content-edit"></div>
                </center>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                        <i class="fa fa-times"></i> Kembali
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('app_scripts')
    <script>
        $(document).ready(function() {
            $('#btnLampiran').on('click', function() {
                var url = $(this).attr('href');
                $('#modal-content-edit').html('<img src="' + url + '" class="img-responsive" alt="">');
            });
        });

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
                        <?php
                        for ($bulan = 1; $bulan <= 12; $bulan++) {
                            $data = \App\Models\AbsensiAsatidz::where('id_asatidz', $asatidz->id)
                                ->whereMonth('created_at', $bulan)
                                ->whereYear('created_at', date('Y'))
                                ->count();
                            echo $data;
                            echo ',';
                        }
                        ?>
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
