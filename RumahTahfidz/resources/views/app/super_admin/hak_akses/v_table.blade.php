@foreach ($role as $r)
    @php
        $role = \App\Models\HakAkses::where('id_role', $r->id)
            ->where('id_user', $user->id)
            ->first();
    @endphp
    <tr class="text-center">
        <th>{{ $loop->iteration }}</th>
        <td>{{ $r->keterangan }}</td>
        <td>
            @if ($role)
                <input type="checkbox" checked data-role="{{ $r->id }}" data-user="{{ $user->id }}"
                    class="form-check-input">
            @else
                <input type="checkbox" data-role="{{ $r->id }}" data-user="{{ $user->id }}"
                    class="form-check-input">
            @endif
        </td>
    </tr>

    <!-- Edit Data -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalEdit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa fa-edit"></i>
                        <span>Edit Data</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/app/sistem/jenjang/simpan') }}" method="POST" id="editJenjang">
                    @method('PUT')
                    {{ csrf_field() }}
                    <div class="modal-body" id="modal-content-edit">

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger btn-sm" data-dismiss="modal">
                            <i class="fa fa-times"></i> Kembali
                        </button>
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END -->
@endforeach

<script>
    $('.form-check-input').on('click', function(e) {
        e.preventDefault();

        const userId = $(this).data('user');
        const roleId = $(this).data('role');

        Swal.fire({
            title: '',
            text: "Apakah anda yakin?",
            icon: 'warning',
            showDenyButton: true,
            confirmButtonColor: '#d33',
            denyButtonColor: '#3085d6',
            confirmButtonText: 'Batal',
            denyButtonText: 'Iya'
        }).then((result) => {
            if (result.isDenied) {
                $.ajax({
                    url: "{{ url('app/sistem/users/hak_akses/update') }}",
                    type: 'post',
                    data: {
                        userId: userId,
                        roleId: roleId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response == 1) {
                            loadData();
                            $("#message").html(
                                '<div class="alert alert-success">Hak akses berhasil diubah!</div>'
                            )
                        } else {
                            console.log(response);
                        }
                    }
                });
            } else {}
        })

    });
</script>
