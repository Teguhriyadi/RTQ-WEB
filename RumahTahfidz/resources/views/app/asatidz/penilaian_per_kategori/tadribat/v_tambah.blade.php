<input type="hidden" name="id_santri[]" value="{{ $edit->id }}">
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Pelajaran</th>
            <th class="text-center">Nilai</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kategori_pelajaran_tadribat as $data)
        <tr>
            <td>
                <input type="hidden" name="id_pelajaran_tadribat[]" value="{{ $data->id }}">
                <input type="text" class="form-control" name="id_pelajaran[]" value="{{ $data->getPelajaran->pelajaran }}" readonly style="background-color: white;">
            </td>
            <td class="text-center" width="120">
                <input type="number" name="nilai[]" class="form-control" min="10" max="100" minlength="10" maxlength="100" placeholder="0">
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
