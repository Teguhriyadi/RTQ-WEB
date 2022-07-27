<input type="hidden" name="id" value="{{ encrypt($edit->id) }}">
<div class="form-group">
    <label for="nama_pelajaran"> Nama Pelajaran </label>
    <input type="text" class="form-control" name="nama_pelajaran" id="nama_pelajaran"
        placeholder="Masukkan Nama Pelajaran" value="{{ $edit->nama_pelajaran }}">
</div>
