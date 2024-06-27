<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
        <p class="clearfix mb-0 d-flex justify-content-center">
            <span class="float-md-start d-block d-md-inline-block mt-25">
                COPYRIGHT &copy; {{ date('Y') }}
                <a class="ms-25" href="" target="_blank">Nathã Emanuel</a>
                <span class="d-none d-sm-inline-block">, Todos direitos Reservados</span>
            </span>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ url('assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- JS - FontAwesome-6.1.1 -->
        <script src="{{ url('assets/js/scripts/fontawesome-6.1.1/all.min.js') }}"></script>

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ url('assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ url('assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ url('assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ url('assets/js/core/app-menu.js') }}"></script>
    <script src="{{ url('assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })

        setTimeout(function() {
            // Verifica se a div existe antes de tentar fechá-la
            var alertDiv = document.getElementById('alertDiv');
            var closeButton = document.getElementById('closeButton');
            if (alertDiv) {
                alertDiv.classList.remove('show');
                alertDiv.classList.add('fade');
                setTimeout(function() {
                    alertDiv.style.display = 'none';
                }, 1000);
            }
        }, 10000);
</script>
    </script>

    @yield('footerpage')
</body>
<!-- END: Body-->

</html>