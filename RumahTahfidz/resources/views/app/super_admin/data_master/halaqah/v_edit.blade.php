<input type="hidden" class="form-control" name="kode_halaqah" id="kode_halaqah" placeholder="Masukkan Kode Halaqah"
    value="{{ encrypt($edit->kode_halaqah) }}">
<div class="form-group">
    <label for="nama_halaqah"> Nama Halaqah </label>
    <input type="text" class="form-control" name="nama_halaqah" id="nama_halaqah" placeholder="Masukkan Nama Halaqah"
        value="{{ old('nama_halaqah') ? old('nama_halaqah') : $edit->nama_halaqah }}">
</div>
<div class="form-group">
    <label for="kode_rt"> Lokasi Cabang </label>
    <select name="kode_rt" class="form-control" id="kode_rt" style="width: 100%">
        <option value="">- Pilih -</option>
        @foreach ($data_lokasi_rt as $data)
            <option value="{{ $data->kode_rt }}" {{ $edit->kode_rt == $data->kode_rt ? 'selected' : '' }}>
                {{ $data->lokasi_rt }}
            </option>
        @endforeach
    </select>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
    // $(document).ready(function() {
    //     $("#kode_rt_new").select2({
    //         theme: 'bootstrap4',
    //         placeholder: "Please Select"
    //     });
    // });
</script>
