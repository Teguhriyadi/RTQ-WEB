<input type="hidden" name="id" value="{{ encrypt($edit->id) }}">
<div class="form-group">
    <label for="besaran"> Besaran Iuran </label>
    <input type="text" class="form-control" name="besaran" id="besaran2" placeholder="Masukkan Besaran Iuran"
        value="Rp. {{ number_format($edit->besaran, 0, '', '.') }}">
</div>

<script>
    var rupiah = document.getElementById('besaran2');
    rupiah.addEventListener('keyup', function(e) {
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
