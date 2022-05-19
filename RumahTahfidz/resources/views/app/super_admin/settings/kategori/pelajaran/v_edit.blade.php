<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="form-group">
    <label for="id_jenjang"> Jenjang </label>
    <select name="id_jenjang" class="form-control" id="id_jenjang">
        <option value="">- Pilih -</option>
        @foreach ($data_jenjang as $data)
            <option value="{{ $data->id }}" {{ $data->id == $edit->id_jenjang ? 'selected' : '' }}>
                {{ $data->jenjang }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="id_pelajaran"> Pelajaran </label>
    <select name="id_pelajaran" class="form-control" id="id_pelajaran">
        <option value="">- Pilih -</option>
        @foreach ($data_pelajaran as $data)
            <option value="{{ $data->id }}" {{ $data->id == $edit->id_pelajaran ? 'selected' : '' }}>
                {{ $data->nama_pelajaran }}
            </option>
        @endforeach
    </select>
</div>
