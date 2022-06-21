<input type="hidden" name="id" value="{{ $edit->id }}">
<input type="hidden" name="foto_lama" value="{{ $edit->foto }}">
<div class="form-group">
    <label for="nama_wali"> Nama Wali </label>
    <input type="text" class="form-control" name="nama_wali" value="{{ $edit->getWali->getUser->nama }}" readonly>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nis"> NIS </label>
            <input type="text" class="form-control" name="nis" id="nis" placeholder="Masukkan NIS"
                value="{{ $edit->nis }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="halaqah"> Halaqah </label>
            <input type="text" class="form-control" value="{{ $edit->getWali->getHalaqah->nama_halaqah }}"
                readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nama_lengkap"> Nama Lengkap </label>
            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                placeholder="Masukkan Nama Lengkap" value="{{ $edit->nama_lengkap }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="nama_panggilan"> Nama Panggilan </label>
            <input type="text" class="form-control" name="nama_panggilan" id="nama_panggilan"
                placeholder="Masukkan Nama Panggilan" value="{{ $edit->nama_panggilan }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="tempat_lahir"> Tempat Lahir </label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                placeholder="Masukkan Tempat Lahir" value="{{ $edit->tempat_lahir }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="tanggal_lahir"> Tanggal Lahir </label>
            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="0"
                value="{{ $edit->tanggal_lahir }}">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="sekolah"> Sekolah </label>
    <input type="text" class="form-control" name="sekolah" id="sekolah" placeholder="Masukkan Nama Sekolah"
        value="{{ $edit->sekolah }}">
</div>
<div class="form-group">
    <label for="prestasi_anak"> Prestasi Anak </label>
    <input type="text" class="form-control" name="prestasi_anak" id="prestasi_anak"
        placeholder="Masukkan Data Prestasi" value="{{ $edit->prestasi_anak }}">
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="jenis_kelamin"> Jenis Kelamin </label>
            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                <option value="">- Pilih -</option>
                <option value="L" {{ $edit->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki - Laki</option>
                <option value="P" {{ $edit->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="id_kelas"> Kelas </label>
            <select class="form-control" name="id_kelas" id="id_kelas">
                <option value="">- Pilih -</option>
                @foreach ($data_kelas as $kelas)
                    <option value="{{ $kelas->id }}" {{ $edit->id_kelas == $kelas->id ? 'selected' : '' }}>
                        {{ $kelas->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="alamat"> Alamat </label>
    <textarea name="alamat" class="form-control" id="alamat" rows="5" placeholder="Masukkan Data Alamat">{{ $edit->alamat }}</textarea>
</div>
<div class="form-group">
    <label for="id_besaran"> Besaran Iuran </label>
    <select name="id_besaran" class="form-control" id="id_besaran">
        <option value="">- Pilih -</option>
        @foreach ($data_besaran as $data)
            <option value="{{ $data->id }}" {{ $edit->id_besaran == $data->id ? 'selected' : '' }}>
                Rp. {{ number_format($data->besaran) }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="foto"> Foto </label>
    @if (empty($edit->foto))
        <img class="gambar-lihat" id="tampilGambar">
    @else
        <img class="gambar-lihat mb-3" id="tampilGambar" src="{{ $edit->foto }}" width="100%">
    @endif

    <input type="file" class="form-control" name="foto" id="foto" onchange="imagePreview()">
</div>

<script>
    function imagePreview() {
        const image = document.querySelector("#foto");
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
