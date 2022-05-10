<input type="hidden" name="id" value="{{ $edit->id }}">
<input type="hidden" name="oldGambar" value="{{ $edit->foto }}">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="id_kategori"> Kategori </label>
            <select name="id_kategori" id="id_kategori" class="form-control">
                <option value="">- Pilih -</option>
                @foreach ($data_kategori as $kategori)
                    <option value="{{ $kategori->id }}" {{ $edit->id_kategori == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->kategori }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="judul"> Judul </label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul"
                value="{{ $edit->judul }}">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="gambar"> Foto </label>
    @if ($edit->foto)
        <img src="{{ url('storage/' . $edit->foto) }}" class="gambar-lihat img-fluid" id="tampilGambar">
    @else
        <img class="gambar-lihat" id="tampilGambar">
    @endif
    <input type="file" class="form-control" name="gambar" id="gambar" onchange="imagePreview()">
</div>
<div class="form-group">
    <label for="deskripsi"> Deskripsi </label>
    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5"
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
