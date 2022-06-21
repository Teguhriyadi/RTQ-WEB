<input type="hidden" name="id" value="{{ $edit->id }}">
<input type="hidden" name="gambar_lama" value="{{ $edit->getUser->gambar }}">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="no_ktp"> No. KTP </label>
            <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="Masukkan No. KTP"
                value="{{ $edit->no_ktp }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="nama"> No. KK </label>
            <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="Masukkan No. KK"
                value="{{ $edit->no_kk }}">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="nama"> Nama </label>
    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama"
        value="{{ $edit->getUser->nama }}">
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="email"> Email </label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email"
                value="{{ $edit->getUser->email }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="kode_halaqah"> Kode Halaqah </label>
            <select name="kode_halaqah" class="form-control" id="kode_halaqah">
                <option value="">- Pilih -</option>
                @foreach ($data_halaqah as $data)
                    <option value="{{ $data->kode_halaqah }}"
                        {{ $edit->kode_halaqah == $data->kode_halaqah ? 'selected' : '' }}>
                        {{ $data->nama_halaqah }} - {{ $data->kode_rt }}
                    </option>
                @endforeach
            </select>
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
    <div class="col-md-6">
        <div class="form-group">
            <label for="jenis_kelamin"> Jenis Kelamin </label>
            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                <option value="">- Pilih -</option>
                <option value="L" {{ $edit->getUser->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki - Laki
                </option>
                <option value="P" {{ $edit->getUser->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan
                </option>
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
<div class="form-group">
    <label for="alamat"> Alamat </label>
    <textarea name="alamat" class="form-control" id="alamat" rows="5" placeholder="Masukkan Alamat">{{ $edit->getUser->alamat }}</textarea>
</div>
<div class="form-group">
    <label for="pekerjaan"> Pekerjaan </label>
    <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Masukkan Pekerjaan"
        value="{{ $edit->pekerjaan }}">
</div>
<div class="form-group">
    <label for="gambar"> Gambar </label>
    @if ($edit->getUser->gambar)
        <img src="{{ url('storage/' . $edit->getUser->gambar) }}" class="gambar-lihat img-fluid mb-3"
            id="tampilGambar">
    @else
        <img class="gambar-lihat img-fluid" id="tampilGambar">
    @endif
    <input onchange="imagePreview()" type="file" class="form-control" name="gambar" id="gambar">
</div>

<script>
    function imagePreview() {
        const image = document.querySelector("#gambar");
        const imgPreview = document.querySelector(".gambar-lihat");
        imgPreview.style.display = "block";
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
            $("#tampilGambar").addClass('mb-3');
            $("#tampilGambar").width("100%");
            $("#tampilGambar").height("300");
        }
    }
</script>
