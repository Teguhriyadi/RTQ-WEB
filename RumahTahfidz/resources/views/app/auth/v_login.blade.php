<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('/template') }}/dist/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/template') }}/dist/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('/template') }}/dist/assets/modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('/template') }}/dist/assets/css/style.css">
    <link rel="stylesheet" href="{{ url('/template') }}/dist/assets/css/components.css">
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
            <section class="section">
                <div class="container mt-5 pt-5">
                    <div class="row">
                        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div class="card card-primary">
                                <div class="card-header"><h4>Login</h4></div>

                                <div class="card-body">
                                    @if(session("message"))
                                    <div class="alert alert-success">
                                        {{  session("message") }}
                                    </div>
                                    @endif
                                    <div class="alert alert-danger" id="error-login" style="display: none;">
                                        Login Gagal, harap periksa kembali akun anda!
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp" class="control-label">Telepon</label>
                                        <input id="no_hp" type="number" class="form-control" name="no_hp" tabindex="1" required autofocus min="0">
                                        <div class="invalid-feedback" id="error-no_hp">
                                            Please fill in your Telepon
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="control-label"> Passwod </label>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                        <div class="invalid-feedback" id="error-password">
                                            Please fill in your password
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 text-muted text-center">
                                Lupa Password Anda ?
                                <a href="{{ url('/app/forgot-password') }}">Lupa Password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- General JS Scripts -->
        <script src="{{ url('/template') }}/dist/assets/modules/jquery.min.js"></script>
        <script src="{{ url('/template') }}/dist/assets/modules/popper.js"></script>
        <script src="{{ url('/template') }}/dist/assets/modules/tooltip.js"></script>
        <script src="{{ url('/template') }}/dist/assets/modules/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{ url('/template') }}/dist/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="{{ url('/template') }}/dist/assets/modules/moment.min.js"></script>
        <script src="{{ url('/template') }}/dist/assets/js/stisla.js"></script>

        <!-- JS Libraies -->

        <!-- Page Specific JS File -->

        <!-- Template JS File -->
        <script src="{{ url('/template') }}/dist/assets/js/scripts.js"></script>
        <script src="{{ url('/template') }}/dist/assets/js/custom.js"></script>
        <script src="{{ url('sweetalert/dist/sweetalert2.all.min.js') }}"></script>

        <script type="text/javascript">
            function validasi() {
                let no_hp = $('#no_hp').val().trim();
                let password = $('#password').val().trim();

                if (no_hp == '' && password == '') {
                    $('#no_hp, #password').addClass('is-invalid')
                    $('.invalid-feedback').css('display', 'block')
                } else if (no_hp == '') {
                    $('#no_hp').addClass('is-invalid')
                    $('#error-no_hp').css('display', 'block')
                } else if (password == '') {
                    $('#password').addClass('is-invalid')
                    $('#error-password').css('display', 'block')
                } else {
                    proses(no_hp, password)
                }

                $('#no_hp').change(function () {
                    $(this).removeClass('is-invalid')
                    $('#error-no_hp').css('display', 'none')
                    $("#error-login").css('display', 'none')
                })

                $('#password').change(function () {
                    $(this).removeClass('is-invalid')
                    $('#error-password').css('display', 'none')
                    $("#error-login").css('display', 'none')
                })
            }

            function proses(no_hp, password) {

                $.ajax({
                    url: '{{ url("app/login") }}',
                    type: "POST",
                    data: {no_hp: no_hp,
                        password: password,
                        _token: '{{ csrf_token() }}'},
                        success: function (respon) {
                            let timerInterval
                            Swal.fire({
                                title: 'Harap tunggu',
                                html: 'Silahkan tunggu beberapa detik.',
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading()
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                    if (respon.status == 1) {
                                        Swal.fire({
                                            title: 'Selamat!',
                                            text: 'Anda berhasil login',
                                            icon: 'success'
                                        }).then((result2) => {
                                            location.href = '{{ url("app/sistem/home") }}';
                                        })
                                    } else {
                                        $("#error-login").css('display', 'block');
                                        $("#password").val('')
                                    }
                                }
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    if (respon.status == 1) {
                                        Swal.fire({
                                            title: 'Selamat!',
                                            text: 'Anda berhasil login',
                                            icon: 'success'
                                        }).then((result2) => {
                                            location.href = '{{ url("app/sistem/home") }}';
                                        })
                                    } else {
                                        $("#error-login").css('display', 'block');
                                        $("#password").val('')
                                    }
                                }
                            })

                        }
                    })
                }

                $(document).ready(function () {
                    $("#btn-login").on('click', function() {
                        validasi();
                    });

                    $("input").on('keypress', function (e) {
                        if(e.keyCode == 13)
                        {
                            validasi();
                        }
                    });


                })

                function cek() {
                    $.ajax({
                        url: 'http://127.0.0.1:8000/contoh',
                        type: 'get',
                        success: function (coba) {
                            console.log(coba);
                        }
                    })
                }
                cek()
            </script>

        </body>
        </html>
