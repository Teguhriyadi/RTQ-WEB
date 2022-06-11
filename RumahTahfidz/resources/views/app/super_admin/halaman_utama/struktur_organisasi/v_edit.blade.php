<input type="hidden" name="id" value="{{ $edit->id }}">
<input type="hidden" name="foto_lama" value="{{ $edit->foto }}">
<div class="form-group">
    <label for="nama"> Nama </label>
    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama"
        value="{{ $edit->nama }}">
</div>
<div class="form-group">
    <label for="id_jabatan"> Jabatan </label>
    <select name="id_jabatan" class="form-control" id="id_jabatan">
        <option value="">- Pilih -</option>
        @foreach ($data_jabatan as $data)
        <option value="{{ $data->id }}" {{ $data->id == $edit->id_jabatan ? "selected" : "" }} >
            {{ $data->nama_jabatan }}
        </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="foto"> Foto </label>
    @if ($edit->foto)
        <img src="{{ url('storage/' . $edit->foto) }}" class="gambar-lihat img-fluid mb-3" id="tampilGambar" width="100%" height="300">
    @else
        <img class="gambar-lihat" id="tampilGambar">
    @endif
    <input type="file" class="form-control" name="gambar" id="gambar" onchange="imagePreview()">
</div>
<div class="form-group">
    <label for="deskripsi"> Deskripsi </label>
    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5"
        placeholder="Masukkan Deskripsi">{{ $edit->deskripsi }}</textarea>
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
