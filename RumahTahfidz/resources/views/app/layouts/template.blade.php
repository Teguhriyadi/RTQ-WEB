@php
$user = \App\Models\User::where('id', auth()->user()->id)->first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ url('gambar/logo_ulil.png') }}" />

    <title>RTQ Ulil Albab | @yield('app_title')</title>

    @include('app.layouts.partials.css.style')

    @yield('app_css')

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            @include('app.layouts.partials.sidebar.main-sidebar')

            @include('app.layouts.partials.navbar.main-navbar')

            <!-- page content -->
            <div class="right_col" role="main">
                @yield('app_content')
            </div>
            <!-- /page content -->

            @include('app.layouts.partials.footer.main-footer')
        </div>
    </div>

    @include('app.layouts.partials.js.style')
    @if (session('message'))
        {!! session('message') !!}
    @endif
    @yield('app_scripts')

    @can('super_admin')
        @if (Request::segment(3) != 'laporan')
            <script>
                $(document).ready(function() {
                    $("#laporan").removeClass('active');
                    $("#laporan ul").css('display', 'none')
                })
            </script>
        @endif
    @endcan
    @can('admin')
        @if (Request::segment(3) != 'laporan')
            <script>
                $(document).ready(function() {
                    $("#laporan").removeClass('active');
                    $("#laporan ul").css('display', 'none')
                })
            </script>
        @endif
    @endcan

    <script>
        function logout() {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan mengakhiri sesi login ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Logout'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ url('app/logout') }}',
                        type: 'get',
                        success: function(response) {
                            if (response.status == true) {
                                Swal.fire({
                                    title: 'Selamat!',
                                    text: 'Anda berhasil logout',
                                    icon: 'success'
                                }).then((result) => {
                                    location.href = '{{ url('/app/login') }}'
                                })
                            }
                        }
                    })
                }
            })
        }
    </script>

</body>

</html>
