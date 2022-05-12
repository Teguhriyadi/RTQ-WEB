<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($last_login as $d)
            <tr>
                <td>{{ $d->id }}</td>
                <td>{{ $d->getUser->nama }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
