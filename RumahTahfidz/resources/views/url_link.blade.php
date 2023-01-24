<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="{{ url('/url_aplikasi') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td>URL Link</td>
                <td>:</td>
                <td>
                    <input type="url" name="url_link" placeholder="Masukkan URL Link Aplikasi" style="width: 300%; padding: 10px; border-radius: 5px;" value="{{ empty($profil) ? '' : $profil->url_aplikasi }}">
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <button type="submit">
                        Upload Link
                    </button>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>
