<input type="hidden" name="id" value="{{ encrypt($edit->id) }}">
<div class="form-group">
    <label for="nama_kelas"> Nama Kelas </label>
    <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Masukkan Nama Kelas"
        value="{{ old('nama_kelas') ? old('nama_kelas') : $edit->nama_kelas }}">
</div>
