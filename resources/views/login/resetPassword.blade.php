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

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
    <style>
        .login-box {
            max-width: 500px;
            height: 34rem;
        }

        .login-box .login-title {
            padding: 0 0 10px !important;
            margin-bottom: 8px !important;

        }

        .login-wrap {
            height: calc(100% - 70px);
            overflow: visible;
            padding: 30px 0;
        }

        body {
            background-color: #003675;
            background-image: url('vendors/images/Sherpa.png');
            background-repeat: no-repeat;
            background-size: 980px;
        }

        .login-title h1 {
            color: #FFF;
            font-family: "Red Hat Display";
            font-size: 32px;
            font-weight: 700;
        }

        h6 {
            color: #FFF;
            font-family: "Red Hat Display";
            font-size: 18px;
            font-weight: 400;
        }

        .custom-button input
        {
            background-color: #00BDF8;
            border:#00BDF8;
        }

        .custom-button input:hover
        {
            opacity: 0.8;
            background: #00BDF8;
        }

        .img-fluid
        {
            margin-left: 73px;
            width: 10rem ;
        }
    </style>
</head>

<body>
    <div class="flex-wrap login-wrap d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="{{ asset('vendors/images/logo_himalaya_Blue-10 1.png') }}" alt="logo_himalaya"class="img-fluid">
                    <div class="login-box">
                        <div class="login-title">
                            <h1>Recuperar contraseña</h1>
                        </div>
                        <h6 class="mb-20 text-white">Ingresa tu nueva contraseña, confírmala y haz clic en enviar para
                            continuar</h6>
                        <form method="POST" action="{{ route('store.reset.password') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token ?? '' }}">
                            <input type="hidden" name="email" value="{{ $emailUser->email ?? '' }}">

                            <div class="input-group custom">
                                <input type="email" class="form-control form-control-lg" placeholder="Correo" name="email" required>
                            </div>
                            @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" name="password" placeholder="Contraseña" required>

                            </div>
                            @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror

                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Confirma tu contraseña">

                            </div>
                            @error('password_confirmation')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="mb-0 input-group custom-button">
                                        <input type="submit" class="btn btn-success btn-block btn-lg" value="Actualizar contraseña">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('vendors/images/photo_right_blue.png') }}" alt="">
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
