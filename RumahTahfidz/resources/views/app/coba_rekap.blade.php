@php
use App\Models\Iuran;
@endphp
<form action="{{ url('/coba_rekap') }}" method="POST">
    @method('PUT')
    @csrf
    <input type="date" name="tanggal_awal">
    <input type="date" name="tanggal_akhir">
    <input type="submit" name="btn_rekap">
</form>

<hr>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Santri</th>
            <th>Nominal</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 0;
        @endphp
        @if (empty($data_coba))
            <tr>
                <td colspan="3">
                    <i>
                        <b>Data Kosong</b>
                    </i>
                </td>
            </tr>
        @else
            @php
                $jumlah = 0;
                $nama_lengkap = "";
            @endphp
            @foreach ($data_coba as $data)
                @php
                    $count = Iuran::where('id_santri', $data->santri_id)->get();
                    $jumlah = 0;
                    foreach ($count as $c) {
                        $nama_lengkap = $c->getSantri->nama_lengkap;
                        if ($data->santri_id == $c->id_santri) {
                            $jumlah += $c->nominal;
                        }
                    }
                @endphp
                <tr>
                    <td>{{ ++$no }}.</td>
                    <td>{{ $nama_lengkap }}</td>
                    <td>{{ $jumlah }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
