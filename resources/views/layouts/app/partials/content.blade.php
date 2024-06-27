    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <x-alert/>
            </div>
            <div class="d-flex align-items-center mb-2">
                @include('layouts.app.partials.breadcrumbs')
            </div> 
            <div class="content-body">
                <section id="dashboard-ecommerce">
                    <div class="row match-height">

                        @yield('contentpage')

                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>