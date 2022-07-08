<input type="hidden" name="id_santri" value="{{ $detail_administrasi->id_santri }}">
<div class="form-group">
    <label for="nominal"> Nominal </label>
    <input type="number" class="form-control" name="nominal" id="nominal" min="1000"
        max="{{ abs($total_nominal - $iuran) }}" placeholder="0">
</div>
