<input type="hidden" name="id" value="{{ encrypt($edit->id) }}">
<div class="form-group">
    <label for="kategori_penilaian"> Kategori Penilaian </label>
    <input type="text" class="form-control" name="kategori_penilaian" id="kategori_penilaian"
        placeholder="Masukkan Kategori Penilaian" value="{{ $edit->kategori_penilaian }}">
</div>
