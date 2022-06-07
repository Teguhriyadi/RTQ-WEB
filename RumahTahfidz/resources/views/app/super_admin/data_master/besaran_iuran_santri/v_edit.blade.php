<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="form-group">
    <label for="id_besaran"> Besaran </label>
    <select name="id_besaran" class="form-control" id="id_besaran">
        <option value="">- Pilih -</option>
        @foreach ($data_besaran as $data)
            <option value="{{ $data->id }}" {{ $edit->id_besaran == $data->id ? 'selected' : '' }}>
                Rp. {{ number_format($data->besaran) }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="id_santri"> Santri </label>
    <select name="id_santri" class="form-control" id="id_santri">
        <option value="">- Pilih -</option>
        @foreach ($data_santri as $data)
            <option value="{{ $data->id }}" {{ $edit->id_santri == $data->id ? 'selected' : '' }}>
                {{ $data->nama_lengkap }}
            </option>
        @endforeach
    </select>
</div>
