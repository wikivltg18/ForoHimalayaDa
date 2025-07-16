<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

    <style>
        body {
            background-color: #003B7B;
            color: #ffff font-family: "Red Hat Display";
            font-size: 19px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
        }

        .login-box {
            max-width: 499px;

        }

        .login-box .login-title {
            padding: 0 0 10px;
            margin-bottom: 28px;
            background-color: #fff;
            width: 459px;
            margin-left: -20px;
            margin-top: -41px;
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

        .login-box {
            background: transparent !important;
            color: white;
            box-shadow: none;
        }

        .btn-primary
        {
            background-color: #00BDF8;
            border-color: #00BDF8;
        }
        .fa {
            font-size: 40px;
        }

        .alert-dismissible {
            padding-right: 2rem !important;
        }

        h2 {
            color: #FFF;
            font-family: "Red Hat Display";
            font-size: 32px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
        }

        h6 {
            color: #FFF;
            font-family: "Red Hat Display";
            font-size: 18px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }
        .img-logo
        {
            margin-left: 73px;
            width: 10rem ;
            margin-bottom: 5rem;
        }

        .img-right
        {
            max-width: 86% !important;
        }
    </style>
</head>

<body>
    <div class="flex-wrap login-wrap d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row ">
                <div class="col-md-6">
                    <img src="{{ asset('vendors/images/logo_himalaya_Blue-10 1.png') }}" class="img-logo " alt="logo_himalaya">
                    <div class="bg-white login-box box-shadow" >
                        <h2>Las contraseñas se olvidan, <br> las grandes ideas no.</h2>
                        <h6 class="mb-20 text-white">Restablécela aquí.</h6>
                        <form method="POST" action="{{ url('storeForgotPassword') }}">
                            @csrf
                            <div class="input-group custom">
                                <input type="email" class="form-control form-control-lg" name="email"
                                    placeholder="Mail" value="{{ old('email') }}" required>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"></span>
                                </div>
                            </div>
                            @if (session('successEmail'))
                            <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
                                <i class="icon-copy fa fa-check-circle" aria-hidden="true"></i>
                                <br>
                                {{ session('successEmail') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            @if (session('errorEmail'))
                            <div class="text-center alert alert-warning alert-dismissible fade show" role="alert">
                                <i class="icon-copy fa fa-warning" aria-hidden="true"></i>
                                <br>
                                {{ session('errorEmail') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="mb-0 input-group">
                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Enviar">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-0 input-group">
                                        <a class="btn btn-secondary btn-lg btn-block" href="{{ url('login') }}">Volver</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('vendors/images/photo_right_blue.png') }}" class="img-right" alt="" srcset="">
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
</body>

</html>
