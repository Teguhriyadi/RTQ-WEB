<input type="hidden" name="id" id="id" value="{{ $edit->id }}">

@csrf
<div class="form-group">
    <label for="nama"> Nama </label>
    <input type="text" name="nama" id="nama" class="form-control input-sm" placeholder="Masukkan Nama" value="{{ $edit->nama }}">
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="jenis_kelamin"> Jenis Kelamin </label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                <option value="">- Pilih -</option>
                <option value="L" {{ $edit->jenis_kelamin ? "selected" : "" }} >Laki - Laki</option>
                <option value="P" {{ $edit->jenis_kelamin ? "selected" : "" }} >Perempuan</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="no_hp"> No. HP </label>
            <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukkan No. HP" value="{{ $edit->telepon }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="tempat_lahir"> Tempat Lahir </label>
            <input type="text" class="form-control" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" name="tempat_lahir">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="tanggal_lahir"> Tanggal Lahir </label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="alamat"> Alamat </label>
    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control" placeholder="Masukkan Alamat">{{ $edit->alamat }}</textarea>
</div>
<div class="form-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="gambar" name="gambar">
        <label class="custom-file-label" for="gambar">Upload Gambar</label>
    </div>
</div>
