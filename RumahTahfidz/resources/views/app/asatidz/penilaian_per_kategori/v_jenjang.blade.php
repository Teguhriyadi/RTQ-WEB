@foreach ($data_jenjang as $jenjang)
    <tr class="text-center">
        <th>{{ $loop->iteration }}</th>
        <td>{{ $jenjang->jenjang }}</td>
        <td>
            <span>{{ url('app/sistem/penilaian/') }}</span>
        </td>
    </tr>
@endforeach
