<form action="{{ url('/app/sistem/validasi/iuran/belum_lunas') }}" method="POST">
    @csrf
    @if ($select_rekap == 1)
        <input type="hidden" name="rekap_by" value="1">
    @elseif($select_rekap == 2)
        <input type="hidden" name="rekap_by" value="2">
    @endif
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="mulai_tanggal"> Mulai Tanggal </label>
                <input type="date" class="form-control" name="mulai_tanggal" id="mulai_tanggal"
                    value="{{ empty($tanggal) ? '' : $tanggal }}">
            </div>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary btn-sm btn-block mt-4 p-2">
                <i class="fa fa-search"></i> Cari
            </button>
        </div>
    </div>

</form>
