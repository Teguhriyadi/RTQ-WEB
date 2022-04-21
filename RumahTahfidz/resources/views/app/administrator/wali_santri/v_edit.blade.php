<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nik"> NIK </label>
            <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK" value="{{ $edit->nik }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="nama"> No. KK </label>
            <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="Masukkan No. KK" value="{{ $edit->no_kk }}">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="nama"> Nama </label>
    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="{{ $edit->getUser->nama }}">
</div>
<div class="form-group">
    <label for="email"> Email </label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" value="{{ $edit->getUser->email }}">
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="no_hp"> No. HP </label>
            <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan No. HP" value="{{ $edit->getUser->no_hp }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="jenis_kelamin"> Jenis Kelamin </label>
            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                <option value="">- Pilih -</option>
                <option value="L" {{ $edit->getUser->jenis_kelamin == "L" ? "selected" : "" }} >Laki - Laki</option>
                <option value="P" {{ $edit->getUser->jenis_kelamin == "P" ? "selected" : "" }}>Perempuan</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="tempat_lahir"> Tempat Lahir </label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="{{ $edit->getUser->tempat_lahir }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="tanggal_lahir"> Tanggal Lahir </label>
            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ $edit->getUser->tanggal_lahir }}">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="alamat"> Alamat </label>
    <textarea name="alamat" class="form-control" id="alamat" rows="5" placeholder="Masukkan Alamat">{{ $edit->getUser->alamat }}</textarea>
</div>
