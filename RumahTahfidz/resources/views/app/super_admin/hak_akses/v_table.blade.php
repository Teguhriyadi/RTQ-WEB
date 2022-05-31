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
@endforeach

<script>
    $('.form-check-input').on('click', function() {
        const userId = $(this).data('user');
        const roleId = $(this).data('role');

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

    });
</script>
