<input type="hidden" name="id_wali" value="{{ $data_wali->id }}">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nama_lengkap"> Nama Lengkap </label>
            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan Nama Lengkap">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="nama_panggilan"> Nama Panggilan </label>
            <input type="text" class="form-control" name="nama_panggilan" id="nama_panggilan" placeholder="Masukkan Nama Panggilan">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="tempat_lahir"> Tempat Lahir </label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="tanggal_lahir"> Tanggal Lahir </label>
            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="0">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="sekolah"> Sekolah </label>
    <input type="text" class="form-control" name="sekolah" id="sekolah" placeholder="Masukkan Nama Sekolah">
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="prestasi_anak"> Prestasi Anak </label>
            <input type="text" class="form-control" name="prestasi_anak" id="prestasi_anak" placeholder="Masukkan Data Prestasi">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="id_kelas"> Kelas </label>
            <select class="form-control" name="id_kelas" id="id_kelas">
                <option value="">- Pilih -</option>
                @foreach($data_kelas as $kelas)
                <option value="{{ $kelas->id }}">
                    {{ $kelas->nama_kelas }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="alamat"> Alamat </label>
    <textarea name="alamat" class="form-control" id="alamat" rows="5" placeholder="Masukkan Data Alamat"></textarea>
</div>
