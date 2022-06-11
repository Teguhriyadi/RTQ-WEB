<?php
use Carbon\Carbon;
?>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
        padding: 10px;
    }

    th {
        background-color: yellow;
        color: white;
    }
</style>

<table border="1">
    <thead>
        <tr>
            <th>No.</th>
            <th>NIS</th>
            <th>Nama Lengkap</th>
            <th>Nama Panggilan</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>No KTP</th>
            <th>No KK</th>
            <th>Wali Santri</th>
            <th>Pekerjaan Orang Tua</th>
            <th>Alamat</th>
            <th>Jenjang</th>
            <th>Halaqah</th>
            <th>Kelas</th>
            <th>Sekolah</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($santri as $s)
            @php
                $jk = $s == 'L' ? 'Laki-laki' : 'Perempuan';
                $status = $s->status == 1 ? 'Aktif' : 'Tidak Aktif';
            @endphp
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $s->nis }}</td>
                <td>{{ $s->nama_lengkap }}</td>
                <td>{{ $s->nama_panggilan }}</td>
                <td>{{ $jk }}</td>
                <td>{{ $s->tempat_lahir }}</td>
                <td>{{ Carbon::createFromFormat('Y-m-d', $s->tanggal_lahir)->isoFormat('DD MMMM Y') }}</td>
                <td>{{ $s->getWali->no_ktp }}</td>
                <td>{{ $s->getWali->no_kk }}</td>
                <td>{{ $s->getWali->getUser->nama }}</td>
                <td>{{ $s->getWali->pekerjaan }}</td>
                <td>{{ $s->alamat }}</td>
                <td>{{ $s->getJenjang->jenjang }}</td>
                <td>{{ $s->getHalaqah->nama_halaqah }}</td>
                <td>{{ $s->getKelas->nama_kelas }}</td>
                <td>{{ $s->sekolah }}</td>
                <td>{{ $status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
