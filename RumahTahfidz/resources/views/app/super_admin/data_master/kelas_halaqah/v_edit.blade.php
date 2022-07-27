@php
use App\Models\KelasHalaqah;
@endphp
<input type="hidden" name="id" value="{{ encrypt($edit->id) }}">
<div class="form-group">
    <label for="id_asatidz"> Asatidz </label>
    <select name="id_asatidz" class="form-control" id="id_asatidz">
        <option value="">- Pilih -</option>
        @foreach ($data_asatidz as $data)
            @php
                $sudah_ada = KelasHalaqah::where('id_asatidz', $data->id)->first();
            @endphp
            @if ($sudah_ada)
                @if ($edit->id_asatidz == $data->getUser->id)
                    <option value="{{ $data->getUser->id }}"
                        {{ $edit->id_asatidz == $data->getUser->id ? 'selected' : '' }}>
                        {{ $data->getUser->nama }}
                    </option>
                @endif
            @else
                <option value="{{ $data->getUser->id }}"
                    {{ $edit->id_asatidz == $data->getUser->id ? 'selected' : '' }}>
                    {{ $data->getUser->nama }}
                </option>
            @endif
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="kode_halaqah"> Halaqah </label>
    <select name="kode_halaqah" class="form-control" id="kode_halaqah">
        <option value="">- Pilih -</option>
        @foreach ($data_halaqah as $data)
            <option value="{{ $data->kode_halaqah }}"
                {{ $edit->kode_halaqah == $data->kode_halaqah ? 'selected' : '' }}>
                {{ $data->kode_halaqah }} - {{ $data->nama_halaqah }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="kelas_halaqah"> Kelas Halaqah </label>
    <input type="text" class="form-control" name="kelas_halaqah" id="kelas_halaqah"
        placeholder="Masukkan Kelas Halaqah" value="{{ $edit->kelas_halaqah }}">
</div>
