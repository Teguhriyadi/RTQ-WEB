<div class="form-group">
    <label for="kode_halaqah"> Kode Halaqah </label>
    <input type="text" class="form-control" name="kode_halaqah" id="kode_halaqah" placeholder="Masukkan Kode Halaqah" value="{{ $edit->kode_halaqah }}" readonly>
</div>
<div class="form-group">
    <label for="nama_halaqah"> Nama Halaqah </label>
    <input type="text" class="form-control" name="nama_halaqah" id="nama_halaqah" placeholder="Masukkan Nama Halaqah" value="{{ $edit->nama_halaqah }}">
</div>
<div class="form-group">
    <label for="id_cabang_new"> Cabang </label>
    <select name="id_cabang_new" class="form-control" id="id_cabang_new" style="width: 100%">
        <option value="">- Pilih -</option>
        @foreach ($data_cabang as $cabang)
        <option value="{{ $cabang->id }}" {{ ($edit->id_cabang == $cabang->id) ? "selected" : "" }}>
            {{ $cabang->nama_cabang }}
        </option>
        @endforeach
    </select>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#id_cabang_new").select2({
            theme: 'bootstrap4',
            placeholder: "Please Select"
        });
    });
</script>
