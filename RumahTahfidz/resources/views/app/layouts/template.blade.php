
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title> Rumah Tahfidz Quran &mdash; @yield("app_title")</title>

    <!-- General CSS Files -->
    @include("app.layouts.partials.css.style")

    @include("app.layouts.partials.js.style")
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>


    <div id="app">
        @if(session("message"))
        {!! session("message") !!}
        @endif
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include("app.layouts.partials.navbar.main-navbar")

            @include("app.layouts.partials.sidebar.main-sidebar")

            <!-- Main Content -->
            <div class="main-content">
                @yield("app_content")
            </div>

            @include("app.layouts.partials.footer.main-footer")

        </div>
    </div>

    @yield("app_scripts")

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
                        url: '{{ url("app/logout") }}',
                        type: 'get',
                        success: function (response) {
                            if (response.status == true) {
                                Swal.fire({
                                    title: 'Selamat!',
                                    text: 'Anda berhasil logout',
                                    icon: 'success'
                                }).then((result) => {
                                    location.href = '{{ url("/app/login") }}'
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
