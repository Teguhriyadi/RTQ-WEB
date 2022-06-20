@php
use App\Models\ProfilWeb;
$data = ProfilWeb::select('id', 'nama', 'singkatan', 'logo')->first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="{{ empty($data->logo) ? url('/gambar/logo_ulil.png') : $data->logo }}">

    <title>
        {{ empty($data->nama) ? 'Rumah Tahfidz Quran' : $data->nama }}
    </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('app.landing.layouts.partials.css.style')

</head>

<body>

    @include('app.landing.layouts.partials.header.v_header')

    @yield('app_content')

    @include('app.landing.layouts.partials.footer.v_footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    @include('app.landing.layouts.partials.js.style')

</body>

</html>
