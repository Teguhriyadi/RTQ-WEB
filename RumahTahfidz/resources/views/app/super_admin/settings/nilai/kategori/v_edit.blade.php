<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="form-group">
    <label for="nilai_awal"> Nilai Awal </label>
    <input type="number" class="form-control" name="nilai_awal" id="nilai_awal" placeholder="0" value="{{ $edit->nilai_awal }}">
</div>
<div class="form-group">
    <label for="nilai_akhir"> Nilai Akhir </label>
    <input type="number" class="form-control" name="nilai_akhir" id="nilai_akhir" placeholder="0" value="{{ $edit->nilai_akhir }}">
</div>
<div class="form-group">
    <label for="nilai_kategori"> Nilai Kategori </label>
    <input type="text" class="form-control" name="nilai_kategori" id="nilai_kategori"
        placeholder="Masukkan Nilai Kategori" value="{{ $edit->nilai_kategori }}">
</div>
