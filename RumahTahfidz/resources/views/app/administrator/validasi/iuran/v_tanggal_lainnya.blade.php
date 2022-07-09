<form action="{{ url('/app/sistem/validasi/iuran/belum_lunas') }}" method="POST">
    @csrf
    <input type="hidden" name="rekap_by" value="3">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="tanggal_awal"> Tanggal Awal </label>
                <input type="date" class="form-control" name="tanggal_awal"
                    value="{{ empty($tanggal_awal) ? '' : $tanggal_awal }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="tanggal_akhir"> Tanggal Akhir </label>
                <input type="date" class="form-control" name="tanggal_akhir"
                    value="{{ empty($tanggal_akhir) ? '' : $tanggal_akhir }}">
            </div>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary btn-sm btn-block mt-4 p-2">
                <i class="fa fa-search"></i> Cari
            </button>
        </div>
    </div>

</form>
