<input type="hidden" name="id" value="{{ encrypt($edit->id) }}">
<div class="form-group">
    <label for="id_kategori_penilaian"> Penilaian </label>
    <select name="id_kategori_penilaian" class="form-control" id="id_kategori_penilaian">
        <option value="">- Pilih -</option>
        @foreach ($data_kategori_penilaian as $data)
            <option value="{{ $data->id }}" {{ $data->id == $edit->id_kategori_penilaian ? 'selected' : '' }}>
                {{ $data->kategori_penilaian }}
            </option>
        @endforeach
    </select>
</div>
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
