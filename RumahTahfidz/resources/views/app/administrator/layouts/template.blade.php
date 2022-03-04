
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>General Dashboard &mdash; Stisla</title>

    @include("app.administrator.layouts.partials.css.style")
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA --></head>

    <body>
        <div id="app">
            <div class="main-wrapper main-wrapper-1">
                <div class="navbar-bg"></div>

                @include("app.administrator.layouts.partials.navbar.main-navbar")

                @include("app.administrator.layouts.partials.sidebar.main-sidebar")

                @include("app.administrator.layouts.partials.footer.main-footer")
            </div>
        </div>

        @include("app.administrator.layouts.partials.js.style")

    </body>
    </html>
