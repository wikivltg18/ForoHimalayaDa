<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Gestor de procesos Himalaya DA</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">



    <style>
        .login-box {
            background: transparent !important;
            color: white;
            box-shadow: none;
        }

        body {
            background-color: #ffff;
            color: #FFFf;
            font-family: "Red Hat Display";
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
        }

        .alert-dismissible {
            padding-right: 2rem !important;
        }

        .fa {
            font-size: 25px !important;
        }

        .login-box {
            max-width: 503px;
            padding: 0px;
        }

        .login-box .login-title {
            padding: 0 0 10px;
            margin-bottom: 28px;
            background-color: #fff;
            width: 459px;
            margin-left: -20px;
            margin-top: -38px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-wrap {
            height: calc(100% - 70px);
            overflow: visible;
            padding: 18px 0;
        }

        .alert {
            display: none;
            /* Inicialmente oculta */
            opacity: 0;
            transform: translateY(-20px);
            /* La alerta comenzará desde 20px por encima */
            transition: opacity 0.5s ease, transform 0.5s ease;
            /* Suaviza la transición de opacidad y desplazamiento */
        }

        /* Alerta visible con animación */
        .alert.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
            /* Se desliza desde arriba */
        }

        /* Animación de desvanecimiento */
        @keyframes fadeOut {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        h1 {
            color: #003B7B;
            font-family: "Red Hat Display";
            font-size: 60px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
        }

        .pb-6 {
            padding-bottom: 6rem
        }

        .button-color {
            background-color: #00BDF8;
            border-radius: 10px;
            font-weight:700;
            font-size: 16px;
            font-family: "Red Hat Display";
            color: #fff;
        }


        .button-color:hover {
            opacity: 0.8;
        }

        .text-start small {
            color: #003B7B;
            font-family: "Red Hat Display";
            font-size: 18px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .row-texts>div:nth-child(2)>.texts-rows {
            color: #003B7B;
            font-weight: 700;
            font-weight: bolder;
            padding-left: 37px;
        }

        .row-texts>div:nth-child(2)>.texts-rows:hover {
            opacity: 0.8;
        }

        .row-texts>div:nth-child(1)>.texts-rows {
            font-size: 16px;
            color: #003B7B;
            font-weight: 400;

        }

        .input-checkbox {
            width: 19px;
            height: 19px;
            flex-shrink: 0;
        }
        .form-control:focus
        {
            border-color: #00BDF8 !important;
        }

        .btn:hover
        {
            color: #ffff;
            opacity: 0.8;
        }

        .img-right
        {
            max-width: 86% !important;
        }


    </style>

</head>

<body>
    @if (session('showModal'))
    <script>
        window.onload = function() {
                $('#warning-modal').modal('show');
            }
    </script>
    @endif

    @if(session('messageEmail'))
    <div class="modal fade" id="warning-modal-password" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content bg-warning">
                <div class="modal-body text-center">
                    <h3 class="mb-15"><i class="fa fa-exclamation-triangle"></i> Advertencia</h3>
                    <p class="text-center text-black">
                        {{ session('messageEmail') }}.
                    </p>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <div class="modal fade" id="warning-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered">
                    <div class="modal-content bg-warning">
                        <div class="text-center modal-body">
                            <h3 class="mb-15"><i class="fa fa-exclamation-triangle"></i> Advertencia</h3>
                            <p>{{ session('message') }}</p>
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="flex-wrap login-wrap d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row ">
                <div class="col-md-6 ">
                    <div class="bg-white login-box box-shadow ">
                        <img src="{{ asset('vendors/images/logo_himalaya_blue.png') }}" alt="logo_himalaya" class="pb-5 img-right">
                        <div class="text-start">
                            <h1 style="height: 69px;">Bienvenido</h1>
                            <small> Accede a tu espacio de trabajo y colabora con tu equipo.</small>
                        </div>
                        <br>
                        <form action="{{ route('login.user.credentials') }}" method="POST">
                            @csrf
                            <div class="input-group custom">
                                <input type="email" name="email" class="form-control form-control-lg" placeholder="Mail"
                                    required>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"></span>
                                </div>
                            </div>
                            @error('email')
                            <div class="alert alert-danger" id="error-alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="input-group custom">
                                <input type="password" name="password" class="form-control form-control-lg"
                                    placeholder="Password" required>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"></i></span>
                                </div>
                            </div>
                            @error('password')
                            <div class="alert alert-danger" id="error-alert">
                                {{ $message }}
                            </div>
                    </div>
                    @enderror

                    <div class="row pb-30 row-texts">
                        <div class="col-md-6">
                            <input type="checkbox" name="remember" class="px-5 input-checkbox">
                            <label name="remember" class="pl-2 texts-rows" for="customCheck1">Mantenerme conectado</label>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('forgotPassword') }}" class="texts-rows">¿Olvido su contraseña?</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @if (session('loginError'))
                            <div class="text-center alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="icon-copy fa fa-warning" aria-hidden="true"></i>
                                <br>
                                {{ session('loginError') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <audio autoplay>
                                    <source src="{{asset('sounds/error.ogg')}}">
                                    Tu navegador no soporta el audio.
                                </audio>
                            </div>
                            @endif
                            <button class="btn button-color btn-block btn-lg" type="submit">Iniciar
                                sesión</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('vendors/images/photo_right.png') }}" alt="img" class="img-right">
            </div>
        </div>
    </div>
    </div>
    <!-- js -->


    <!-- Primero asegúrate de cargar todas las librerías JS -->
    <script src="{{ asset('vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>

    <!-- Después agrega tus scripts personalizados -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Para el modal de advertencia principal
            @if (session('showModal'))
                $('#warning-modal').modal('show');
            @endif

            // Para el modal de contraseña
            @if(session('messageEmail'))
                $('#warning-modal-password').modal('show');
            @endif

            // Para las alertas de error
            var alertBox = document.getElementById('error-alert');
            if (alertBox) {
                alertBox.classList.add('show');
                setTimeout(function() {
                    alertBox.classList.remove('show');
                }, 5000);
            }
        });
    </script>

</body>

</html>
