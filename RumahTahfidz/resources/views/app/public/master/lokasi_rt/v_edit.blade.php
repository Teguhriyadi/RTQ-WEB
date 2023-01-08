<input type="hidden" class="form-control" name="kode_rt" id="kode_rt" placeholder="Masukkan Kode RT"
    value="{{ encrypt($edit->kode_rt) }}">
<div class="form-group">
    <label for="lokasi_rt"> Lokasi RT </label>
    <input type="text" name="lokasi_rt" class="form-control input-sm" id="lokasi_rt" placeholder="Masukkan Lokasi RT"
        value="{{ $edit->lokasi_rt ? $edit->lokasi_rt : old('lokasi_rt') }}">
</div>
