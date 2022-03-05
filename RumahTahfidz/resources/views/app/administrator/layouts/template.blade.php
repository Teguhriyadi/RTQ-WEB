
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Rumah Tahfidz Quran | @yield("app_title") </title>

    @include("app.administrator.layouts.partials.css.style")

    @include("app.administrator.layouts.partials.js.style")

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include("app.administrator.layouts.partials.navbar.main-navbar")

            @include("app.administrator.layouts.partials.sidebar.main-sidebar")

            <!-- Main Content -->
            <div class="main-content">
                @yield("app_content")
            </div>

            @include("app.administrator.layouts.partials.footer.main-footer")
        </div>
    </div>

    @yield("app_scripts")

    <script>
        $(document).ready(function() {
            $("#table-1").dataTable();

            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });
        })
    </script>
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
