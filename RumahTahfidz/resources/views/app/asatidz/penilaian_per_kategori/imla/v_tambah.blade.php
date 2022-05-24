@foreach ($data_santri as $santri)
    <?php
    $nilai = App\Models\NilaiImla::where('id_santri', $santri->id)
        ->where('id_pelajaran_imla', $id_pelajaran)
        ->first();
    ?>
    <tr>
        <th>{{ $loop->iteration }}</th>
        <td>{{ $santri->nis }}</td>
        <td>{{ $santri->nama_lengkap }}</td>
        <td>{{ $santri->getJenjang->jenjang }}</td>
        <td>{{ $santri->getHalaqah->getLokasiRt->lokasi_rt }}</td>
        <td>
            <input type="number" max="100" min="0" class="form-control" name="nilai[]" placeholder="Masukan nilai"
                value="{{ $nilai ? $nilai->nilai : '' }}">
            <input type="hidden" class="form-control" name="id_santri[]" value="{{ $santri->id }}">
        </td>
    </tr>
@endforeach
