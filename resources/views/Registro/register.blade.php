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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/jquery.steps.css">
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
        .container-logo {
            padding: 0 0 10px;
            margin-bottom: 28px;
            background-color: #fff;
            width: 464px;
            margin-left: -18px;
            margin-top: -6px;
            height: 104px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body
    style="background-color: #003675; background-image: url('vendors/images/Sherpa.png'); background-repeat: no-repeat; background-size: 980px; height: 100px;">
    <div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="register-box box-shadow border-radius-10"
                        style="background-color: rgba(0, 46, 96, 0.75)">
                        <div class="wizard-content">
                            <form class="tab-wizard2 ">
                                <div class="container-logo">
                                    <img src="{{ asset('vendors/images/logo-himalaya-login.png') }}" alt=""
                                        style="width: 190">
                                </div>
                                    <div class="text-white">
                                        <div class="form-group row ">
                                            <label class="col-sm-4 col-form-label ">Nombres<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Apellidos<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="col-sm-4 col-form-label">Email<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Contraseña<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Confirmar contraseña<span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control">
                                            </div>
                                        </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Confirmar contraseña<span class="text-danger">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- success Popup html Start -->
    <button type="button" id="success-modal-btn" hidden data-toggle="modal" data-target="#success-modal"
        data-backdrop="static">Launch modal</button>
    <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered max-width-400" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h3 class="mb-20">Form Submitted!</h3>
                    <div class="mb-30 text-center"><img src="vendors/images/success.png"></div>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="login.html" class="btn btn-primary">Done</a>
                </div>
            </div>
        </div>
    </div>
    <!-- success Popup html End -->
    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
    <script src="src/plugins/jquery-steps/jquery.steps.js"></script>
    <script src="vendors/scripts/steps-setting.js"></script>
</body>

</html>
