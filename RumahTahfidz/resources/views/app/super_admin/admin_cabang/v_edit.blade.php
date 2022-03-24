<input type="hidden" name="id" id="id" value="{{ $edit->id }}">
<div class="form-group">
    <label for="nama"> Nama </label>
    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="{{ $edit->nama }}">
</div>
<div class="form-group">
    <label for="email"> Email </label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" value="{{ $edit->email }}">
</div>
<div class="form-group">
    <label for="pendidikan_terakhir"> Pendidikan Terakhir </label>
    <input type="text" class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" placeholder="Masukkan Pendidikan Terakhir" value="{{ $edit->pendidikan_terakhir }}">
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="no_hp"> No. HP </label>
            <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan No. HP" value="{{ $edit->no_hp }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="id_cabang"> Cabang </label>
            <select name="id_cabang" class="form-control" id="id_cabang">
                <option value="">- Pilih -</option>
                @foreach ($cabang as $data)
                    @if($edit->id_cabang == $data->id)
                    <option value="{{ $data->id }}" selected>
                        {{ $data->nama_cabang }}
                    </option>
                    @else
                    <option value="{{ $data->id }}">
                        {{ $data->nama_cabang }}
                    </option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
</div>
