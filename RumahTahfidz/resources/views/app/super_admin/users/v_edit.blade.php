<input type="hidden" name="id" value="{{ $edit->id }}">
<input type="hidden" name="gambar_lama" value="{{ $edit->gambar }}">

<div class="form-group">
    <label for="nama"> Nama </label>
    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama"
        value="{{ $edit->nama }}">
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="email"> Email </label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email"
                value="{{ $edit->email }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="password"> Password </label>
            <input type="password" class="form-control" id="password" placeholder="Masukkan Password" value="">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="no_hp"> No. HP </label>
            <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan No. HP">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="jenis_kelamin"> Jenis Kelamin </label>
            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                <option value="">- Pilih -</option>
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="tempat_lahir"> Tempat Lahir </label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                placeholder="Masukkan Tempat Lahir">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="tanggal_lahir"> Tanggal Lahir </label>
            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="alamat"> Alamat </label>
    <textarea name="alamat" class="form-control" id="alamat" rows="5" placeholder="Masukkan Alamat"></textarea>
</div>
<div class="form-group">
    <label for="gambar"> Gambar </label>
    <img class="gambar-preview img-fluid" id="tampilGambar">
    <input type="file" class="form-control" name="gambar" id="gambar" onchange="previewImage()">
</div>
