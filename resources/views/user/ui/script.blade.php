<!-- JAVASCRIPT -->
<script src="{{ asset('admin_backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin_backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('admin_backend/assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('admin_backend/assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('admin_backend/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('admin_backend/assets/js/plugins.js') }}"></script>

<!-- apexcharts -->
<script src="{{ asset('admin_backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- Vector map-->
<script src="{{ asset('admin_backend/assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
<script src="{{ asset('admin_backend/assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

<!--Swiper slider js-->
<script src="{{ asset('admin_backend/assets/libs/swiper/swiper-bundle.min.js') }}"></script>

<!-- Dashboard init -->
<script src="{{ asset('admin_backend/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('admin_backend/assets/js/app.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<style>
    #toast-container > .toast {
        font-size: 11px;
    }
</style>

<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    @if(Session::has('toastr'))
    toastr.{!! Session::get('toastr.type') !!}(
        "{!! Session::get('toastr.message') !!}",
        "{!! Session::get('toastr.title', '') !!}"
    );
    @endif
</script>













