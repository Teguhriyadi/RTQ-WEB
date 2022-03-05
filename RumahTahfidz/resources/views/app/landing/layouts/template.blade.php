
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        <?php
            use App\Models\Profil;

            $data = Profil::select("nama")->first();
        ?>
        @if(empty($data->nama))
            Anonymus
        @else
            {{ $data->nama }}
        @endif

        - @yield("lp_title")
    </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include("app.landing.layouts.partials.css.style")

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    @include("app.landing.layouts.partials.navbar.v_navbar")

    @yield("lp_content")

    @include("app.landing.layouts.partials.footer.v_footer")

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    @include("app.landing.layouts.partials.js.style")

</body>

</html>
