<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="form-group">
    <label for="nama_lengkap"> Nama Lengkap </label>
    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="{{ $edit->nama_lengkap }}" readonly>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nama_kelas"> Kelas </label>
            <input type="text" class="form-control" id="nama_kelas" value="{{ $edit->getKelas->nama_kelas }}" readonly>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="nama_wali"> Nama Wali </label>
            <input type="text" class="form-control" value="{{ $edit->getWali->getUser->nama }}" readonly>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="id_jenjang"> Jenjang </label>
    <select name="id_jenjang" class="form-control" id="id_jenjang">
        <option value="">- Pilih -</option>
        @foreach ($data_jenjang as $data)
        <option value="{{ $data->id }}" {{ ($edit->id_jenjang == $data->id) ? "selected" : "" }}>
            {{ $data->jenjang }}
        </option>
        @endforeach
    </select>
</div>
