<input type="hidden" name="id" id="id" value="{{ $edit->id }}">
<div class="form-group">
    <label for="nama"> Nama </label>
    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama"
        value="{{ $edit->getUser->nama }}">
</div>
<div class="form-group">
    <label for="email"> Email </label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email"
        value="{{ $edit->getUser->email }}">
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="pendidikan_terakhir"> Pendidikan Terakhir </label>
            <input type="text" class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir"
                placeholder="Masukkan Pendidikan Terakhir" value="{{ $edit->pendidikan_terakhir }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="jenis_kelamin"> Jenis Kelamin </label>
            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                <option value="">- Pilih -</option>
                <option value="L" {{ $edit->getUser->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki - Laki
                </option>
                <option value="P" {{ $edit->getUser->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="tempat_lahir"> Tempat Lahir </label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                placeholder="Masukkan Tempat Lahir" value="{{ $edit->getUser->tempat_lahir }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="tanggal_lahir"> Tanggal Lahir </label>
            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                value="{{ $edit->getUser->tanggal_lahir }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="no_hp"> No. HP </label>
            <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan No. HP"
                value="{{ $edit->getUser->no_hp }}">
        </div>
    </div>
    <div class="col-md-6" id="optionNyala">
        <div class="form-group">
            <label for="kode_rt"> Lokasi RT </label>
            <select name="kode_rt" class="form-control" id="kode_rt">
                <option value="">- Pilih -</option>
                @foreach ($lokasi_rt as $data)
                    <option value="{{ $data->kode_rt }}" {{ $edit->kode_rt == $data->kode_rt ? 'selected' : '' }}>
                        {{ $data->lokasi_rt }}
                    </option>
                @endforeach
                <option value="L">Lainnya</option>
            </select>
        </div>
    </div>
    <div class="col-md-6" id="optionMati" style="display: none;">
        <div class="form-group">
            <label for="kode_rt"> Lokasi RT </label>
            <div class="row">
                <div class="col-md-10">
                    <input type="text" class="form-control" name="input_kode_rt" id="kode_rt"
                        placeholder="Masukkan Lokasi RT">
                </div>
                <div class="col-md-2">
                    <a class="btn btn-danger btn-sm" id="btn-nyalakan-pilihan" style="color: white;">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="alamat"> Alamat </label>
    <textarea name="alamat" class="form-control" id="alamat" rows="5" placeholder="Masukkan Alamat">{{ $edit->getUser->alamat }}</textarea>
</div>
<div class="form-group">
    <label for="gambar"> Gambar </label>
    <input type="file" class="form-control" name="gambar" id="gambar">
</div>

<script type="text/javascript">
    $("#kode_rt").change(function() {
        if ($(this).val() == "L") {
            $("#optionNyala").hide();
            $("#optionMati").show();
        }
    });

    $("#btn-nyalakan-pilihan").click(function() {
        $("#optionNyala").show();
        $("#optionMati").hide();
        $("#kode_rt").show();
    });
</script>
