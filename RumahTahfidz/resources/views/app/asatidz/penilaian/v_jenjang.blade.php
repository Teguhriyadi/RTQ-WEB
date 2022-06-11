@foreach ($data_jenjang as $jenjang)
    <tr class="text-center">
        <th>{{ $loop->iteration }}</th>
        <td>{{ $jenjang->jenjang }}</td>
        <td>
            <a href="{{ url('app/sistem/penilaian/' . $kategori . '/' . $kode . '/' . $jenjang->id) }}"
                class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
        </td>
    </tr>
@endforeach
