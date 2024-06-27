<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
                       
                        <!-- /Brand logo-->
                        <!-- Left Div-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img
                                    class="img-fluid" src="{{ url('assets/images/banner/banner_login_02.png') }}"
                                    alt="Login V2" /></div>
                        </div>
                        <!-- /Left Div-->
                        <!-- Right Div-->
                        <div
                            class="d-flex col-lg-4 align-items-center auth-bg pt-lg-3 flex-column justify-content-between mx-auto">
                            <x-alert />
                            @yield('contentpage')
                            <div></div>
                        </div>

                        <!-- /Right Div-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
