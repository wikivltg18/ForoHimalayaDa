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
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
    <style>

        .login-box {
            background: rgba(0, 46, 96, 0.75) !important;
            color: white;
            margin-bottom: 5px !important;
        }
        .login-title{
            margin-bottom: 10px !important;
        }
        .login-top
        {
            padding: 0 0 10px;
            margin-bottom: 28px;
            background-color: #fff;
            width:400px;
            margin-left: -20px;
            margin-top: -38px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body  style="background-color: #003675; background-image: url('vendors/images/Sherpa.png'); background-repeat: no-repeat; background-size: 980px; height: 100px;">
	<div class="flex-wrap login-wrap d-flex align-items-center justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-12">
					<div class="bg-white login-box box-shadow ">
                        <div class="login-top">
                            <img src="{{ asset('vendors/images/logo-himalaya-login.png') }}" alt="logo-himalaya" style="width: 190">
                        </div>
						<div class="login-title">
							<h2 class="text-center text-white">Restablecer contraseña</h2>
						</div>
						<p class="mb-20 text-center text-white">Por favor, ingrese su nueva contraseña, confírmela y presione enviar para completar el proceso de actualización.</p>
						<form method="POST" action="{{ route('restorePassworeIndex') }}">
                            @csrf
                            @method('PUT')
							<div class="input-group custom">
								<input type="text" name="password" class="form-control form-control-lg" placeholder="Nueva contraseña">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="text" name="confirmPassword" class="form-control form-control-lg" placeholder="Confirmar nueva contraseña">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row align-items-center">
								<div class="col-md-12">
									<div class="mb-0 input-group">
										<input class="btn btn-success btn-lg btn-block" type="submit" value="Cambiar mi contraseña">
                                    </div>
                                </div>
							</div>
						</form>
					</div>
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
