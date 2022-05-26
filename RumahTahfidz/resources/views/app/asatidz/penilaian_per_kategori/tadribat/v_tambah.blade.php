@foreach ($data_santri as $santri)
    <?php
    $nilai = App\Models\Nilai::where('id_santri', $santri->id)
        ->where('id_kategori_pelajaran', $id_pelajaran)
        ->first();
    ?>
    <tr>
        <th>{{ $loop->iteration }}</th>
        <td>{{ $santri->nis }}</td>
        <td>{{ $santri->nama_lengkap }}</td>
        <td>{{ $santri->getJenjang->jenjang }}</td>
        <td>{{ $santri->getHalaqah->getLokasiRt->lokasi_rt }}</td>
        <td>
            @if ($nilai)
                @if ($nilai->id_asatidz == auth()->user()->id)
                    <input type="number" max="100" min="0" class="form-control" name="nilai[]"
                        placeholder="Masukan nilai" value="{{ $nilai ? $nilai->nilai : '' }}">
                    <input type="hidden" class="form-control" name="id_santri[]" value="{{ $santri->id }}">
                @else
                    Sudah ada nilai
                @endif
            @else
                <input type="number" max="100" min="0" class="form-control" name="nilai[]" placeholder="Masukan nilai"
                    value="">
                <input type="hidden" class="form-control" name="id_santri[]" value="{{ $santri->id }}">
            @endif
        </td>
    </tr>
@endforeach
