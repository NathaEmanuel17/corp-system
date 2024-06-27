<!DOCTYPE html>
<html class="loading" lang="pt_BR" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="author" content="">

    <link rel="apple-touch-icon" href="{{ url('assets/images/logo/logo_02.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/images/logo/logo_02.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <title>
        Corpsystem | @yield('titlepage')
    </title>

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/vendors/css/extensions/toastr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/themes/semi-dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/vendors/css/extensions/sweetalert2.min.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/pages/dashboard-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/plugins/charts/chart-apex.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <!-- END: Page CSS-->

</head>
<!-- END: Head-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav
        class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content align-items-center">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon cor-icone"
                                data-feather="menu"></i></a></li>
                </ul>

            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">

                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link nav-link-style">
                        <i class="ficon cor-icone" data-feather="moon"></i>
                    </a>
                </li>

                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name fw-bolder">{{ Auth::user()->name }}</span>
                            <span class="user-status">{{ Auth::user()->user_type }}</span>
                        </div>
                        <span class="avatar">
                            <img class="round" src="{{ Auth::user()->photo ? url('storage/' . Auth::user()->photo) : url('assets/images/logo/no-logo.png') }}"
                                alt="avatar" height="40" width="40">
                            <span class="avatar-status-online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="{{ route('profile', Auth::user()) }}">
                            <i class="me-50" data-feather="user"></i> 
                            Perfil
                        </a>
                        <a class="dropdown-item" href="{{ route('login') }}">
                            <i class="me-50" data-feather="power"></i>
                            Sair
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- END: Header-->
