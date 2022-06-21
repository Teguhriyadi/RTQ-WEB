@php
use App\Models\Santri;
use App\Models\Nilai;
use App\Models\KategoriPelajaran;
use App\Models\Absensi;
$data_1 = KategoriPelajaran::where('id_kategori_penilaian', 1)->get();
$data_2 = KategoriPelajaran::where('id_kategori_penilaian', 2)->get();
$data_santri = Santri::get();
@endphp

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>No.</th>
            <th>ID</th>
            <th>Nama Kategori Penilaian</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 0;
        @endphp
        @foreach ($data_1 as $data)
            <tr>
                <td>{{ ++$no }}.</td>
                <td>{{ $data->id }}</td>
                <td>{{ $data->getKategoriPenilaian->kategori_penilaian }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<br>
<hr>
<br>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>No.</th>
            <th>Santri</th>
            <th>Nilai Absensi</th>
            <th>Nilai Tadribat</th>
            <th>Nilai Hafalan</th>
            <th>Kriteria</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 0;
        @endphp
        @foreach ($data_santri as $data)
            <tr>
                <td>{{ ++$no }}.</td>
                <td>{{ $data->nama_lengkap }}</td>
                <td>
                    @php
                        $data_absensi = Absensi::where('id_santri', $data->id)
                            ->where('id_status_absen', 1)
                            ->count();
                        $hasil_absensi = ((270 / $data_absensi) * 40) / 100;
                        echo $hasil_absensi;
                    @endphp
                </td>
                <td>
                    @php
                        $data_nilai = 0;
                        $jum_pelajaran = 0;

                        foreach ($data_1 as $d) {
                            $data_nilai += Nilai::where('id_santri', $data->id)
                                ->where('id_kategori_pelajaran', $d->id)
                                ->sum('nilai');

                            $jum_pelajaran += Nilai::where('id_santri', $data->id)
                                ->where('id_kategori_pelajaran', $d->id)
                                ->count();
                        }
                        $hasil_tadribat = (($data_nilai / $jum_pelajaran) * 30) / 100;

                        echo $hasil_tadribat;
                    @endphp
                </td>
                <td>
                    @php
                        $data_nilai = 0;
                        $jum_pelajaran = 0;
                        foreach ($data_2 as $d) {
                            $data_nilai += Nilai::where('id_santri', $data->id)
                                ->where('id_kategori_pelajaran', $d->id)
                                ->sum('nilai');

                            $jum_pelajaran += Nilai::where('id_santri', $data->id)
                                ->where('id_kategori_pelajaran', $d->id)
                                ->count();
                        }

                        $hasil_hafalan = (($data_nilai / $jum_pelajaran) * 30) / 100;
                        echo $hasil_hafalan;
                    @endphp
                </td>
                <td>
                    @php
                        $total = $hasil_absensi + $hasil_tadribat + $hasil_hafalan;
                    @endphp

                    @if ($total <= 100 && $total >= 75)
                        Lulus
                    @elseif($total = 50 <= 75)
                        Tidak Lulus
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
