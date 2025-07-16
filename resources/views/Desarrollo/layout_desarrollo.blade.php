<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Gestor de procesos HimalayaDigital</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('vendors/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('vendors/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('vendors/images/favicon-16x16.png') }}">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- CSS -->


    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icons-style.css') }}">
    @stack('CSS')

    <style>
        .sidebar-menu .dropdown-toggle .micon {
            color: #003B7B !important;
        }
        body {

            background-color: #003B7B;
            font-family: "Red Hat Display" !important;
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
        }

        .sidebar-menu .dropdown-toggle:hover,
        .sidebar-menu .show>.dropdown-toggle {
            background: none !important;
        }

        .sidebar-menu
        {
            padding-top: 1rem !important;
        }

        .sidebar-menu .dropdown-toggle:hover .micon ,
        .sidebar-menu .show>.dropdown-toggle .micon {
            background-color: #25AFDB !important;
            /* Color azul para el fondo */
            color: white !important;
            /* Color blanco para el icono */
            border-radius: 50% !important;
            /* Forma redonda */
            padding: 5px !important;
            /* Espacio alrededor del icono */
            transition: all 0.3s ease !important;
            /* Animación suave */
        }

        .sidebar-menu .dropdown-toggle:hover::after,
        .sidebar-menu .show>.dropdown-toggle::after {
            content: '' !important;
            display: block !important;
            width: 29% !important;
            height: 3px !important;
            background-color: #e60000 !important;
            position: absolute !important;
            bottom: 0 !important;
            left: 63px !important;
        }

        a {
            color: #003B7B !important;
            font-family: "Red Hat Display" !important;
            font-size: 14px !important;
            font-style: normal;
            font-weight: 500 !important;
            /* 42px */
        }

        .btn-primary {
            background-color: #00BDF8 !important;
            border-color: #00BDF8 !important;
            border: solid 1px #00BDF8;
        }

        .btn-primary:hover {
            background-color: #204d74 !important;
            border-color: #204d74 !important;
        }


        .brand-logo {
            background-color: #ffff;
            margin-bottom: 20px;
        }

        .light-logo {
            width: 100%
        }

        .left-side-bar {
            width: 255px !important;
            background: #ffff;
            border-radius: 9px !important;
        }


        .header {
            background-color: transparent;
            box-shadow: none;

        }

        .btn-secondary {
            background-color: #004EA4;
            border-color: #004EA4;
        }

        .page-header {
            background-image: url('{{ asset("vendors/images/page-header.webp") }}');
            background-size: cover !important;
            background-position: center top !important;
            background-repeat: no-repeat !important;
            height: 120px;
            margin-bottom: 20px;
        }

        .page-header ol
        {
            display: flex !important;
            align-items: center !important;
        }

        .mCustomScrollBox {
            background-color: #ffff;
        }
    </style>

</head>

<body>
    {{-- <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo"><img src="{{ asset('vendors/images/deskapp-logo.svg') }}" alt=""></div>
            <div class='loader-progress' id="progress_div">
                <div class='bar' id='bar1'></div>
            </div>
            <div class='percent' id='percent1'>0%</div>
            <div class="loading-text">
                Loading...
            </div>
        </div>
    </div> --}}

    <div class="header">
        <div class="header-left">
            <div class="menu-icon dw dw-menu" style="color:#fff"></div>
            <div class="search-toggle-icon dw dw-search2" data-toggle="header_search" style="color: #fff"></div>
            <div class="header-search">
                <form>
                    <div class="mb-0 form-group">
                        <div class="dropdown">
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">From</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control form-control-sm form-control-line" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">To</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control form-control-sm form-control-line" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Subject</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control form-control-sm form-control-line" type="text">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="header-right">
            <div class="user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                        <i class="icon-copy dw dw-notification" style="color: #fff"></i>
                        <span class="badge notification-active"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="notification-list mx-h-350 customscroll">
                            <ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        style="color: white">
                        <span class="user-icon">
                            <img src="{{ asset('storage/images' . Auth::user()->img_perfil) }}">
                        </span>
                        <span class="user-name" style="color:#fff">
                            @if (Auth::check())
                                {{ Auth::user()->nombre }}
                            @else
                                Invitado
                            @endif
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="{{ url('superadmin/profileDevelopment/' . Auth::user()->id) }}">
                            <i class="dw dw-user1"></i> Perfil
                        </a>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="dw dw-logout"></i> Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">Layout Settings
                <span class="btn-block font-weight-400 font-12">user</span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>
        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <h4 class="pb-10 weight-600 font-18">Header Background</h4>
                <div class="mb-10 sidebar-btn-group pb-30">
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
                </div>

                <h4 class="pb-10 weight-600 font-18">Sidebar Background</h4>
                <div class="mb-10 sidebar-btn-group pb-30">
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
                </div>

                <h4 class="pb-10 weight-600 font-18">Menu Dropdown Icon</h4>
                <div class="pb-10 mb-10 sidebar-radio-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon"
                            class="custom-control-input" value="icon-style-1" checked="">
                        <label class="custom-control-label" for="sidebaricon-1"><i
                                class="fa fa-angle-down"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon"
                            class="custom-control-input" value="icon-style-2">
                        <label class="custom-control-label" for="sidebaricon-2"><i
                                class="ion-plus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon"
                            class="custom-control-input" value="icon-style-3">
                        <label class="custom-control-label" for="sidebaricon-3"><i
                                class="fa fa-angle-double-right"></i></label>
                    </div>
                </div>

                <h4 class="pb-10 weight-600 font-18">Menu List Icon</h4>
                <div class="mb-10 sidebar-radio-group pb-30">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-1" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-1" checked="">
                        <label class="custom-control-label" for="sidebariconlist-1"><i
                                class="ion-minus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-2" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-2">
                        <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o"
                                aria-hidden="true"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-3" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-3">
                        <label class="custom-control-label" for="sidebariconlist-3"><i
                                class="dw dw-check"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-4" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-4" checked="">
                        <label class="custom-control-label" for="sidebariconlist-4"><i
                                class="icon-copy dw dw-next-2"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-5" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-5">
                        <label class="custom-control-label" for="sidebariconlist-5"><i
                                class="dw dw-fast-forward-1"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-6" name="menu-list-icon"
                            class="custom-control-input" value="icon-list-style-6">
                        <label class="custom-control-label" for="sidebariconlist-6"><i
                                class="dw dw-next"></i></label>
                    </div>
                </div>

                <div class="text-center reset-options pt-30">
                    <button class="btn btn-danger" id="reset-settings">Reset Settings</button>
                </div>
            </div>
        </div>
    </div>

    <div class="left-side-bar">
        {{-- <div class="brand-logo">
            <a href="index.html">
                <img src="{{ asset('vendors/images/logos himalaya-10.png') }}" alt="" class="light-logo">
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div> --}}
        <div class="menu-block customscroll">
            <img src="{{ url(asset('vendors/images/logo_azul.png')) }}" class="py-3 mx-auto d-block" alt="">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li class="dropdown">
                        <a href="{{ url('superadmin/home') }}" class="dropdown-toggle no-arrow">
                            <span class="micon icon-home"></span><span>Home</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="{{ url('superadmin/Clientes') }}" class="dropdown-toggle no-arrow">
                            <span class="micon icon-clientes"></span>
                            Clientes</span>
                        </a>
                    </li>
                    <li class="dropdown">
                       <a href="{{ url('superadmin/usuariosEquipo') }}" class="no-arrow dropdown-toggle "><span class="micon icon-equipo"></span>Usuarios</a>
                    </li>
                         <li class="dropdown">
                        <a class="dropdown-toggle">
                            <span class="micon icon-copy fi-wrench"></span><span>Herramientas</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ url('superadmin/Areas') }}">Areas</a></li>
                        </ul>
                        <ul class="submenu">
                            <li><a href="{{ url('superadmin/servicios') }}">Servicios</a></li>
                        </ul>
                        <ul class="submenu">
                            <li><a href="{{ url('superadmin/roles') }}">Roles</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <span class="pr-1 icon-home"></span>
                                    <li><a href="index.html"><span>Home / {{ $nameRoute }} </a></li>
                                </ol>
                            </nav>
                            <div class="title">
                                <h3 style="color: #003B7B">{{ $nameRoute }}</h3>
                            </div>
                        </div>
                        <div class="text-right col-md-6 col-sm-12">
                            @yield('button-press')
                        </div>
                    </div>
                    @yield('template-without-template')
                </div>
                <div class="bg-white general-container pd-20 border-radius-4 box-shadow mb-30">
                    @yield('template-blank-development')
                </div>
            </div>
            <div class="mb-20 footer-wrap pd-20 card-box" style="color: #003B7B">
                Copyright © 2017 Himalaya Digital Agency. Todos los derechos reservados.
            </div>
        </div>
    </div>
    <!-- js -->

    @stack('JS')

</body>

</html>
