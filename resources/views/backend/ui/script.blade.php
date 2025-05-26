<!--begin::Javascript-->
<script>
    // Global configuration
    var hostUrl = "{{ url('/') }}/backend/assets/";
</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('backend/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('backend/assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<<<<<<< HEAD
=======

>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{ asset('backend/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Page Vendors Javascript-->

<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('backend/assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom/utilities/modals/users-search.js') }}"></script>
<!--end::Page Custom Javascript-->
<script src="{{ asset('backend/assets/js/custom/apps/ecommerce/catalog/categories.js') }}"></script>

<script src="{{ asset('backend/assets/js/custom/apps/ecommerce/catalog/save-product.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>

<<<<<<< HEAD

<script src="{{ asset('backend/assets/js/custom/documentation/forms/select2.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset('js/common-form-handlers.js') }}"></script>
<!-- TinyMCE -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.9/tinymce.min.js"></script>--}}
<script src="{{asset('backend/assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/documentation/editors/tinymce/basic.js')}}"></script>

<script>
    $(document).ready(function () {
        // Initialize form handlers
        CommonFormHandlers.initFormSubmission('#kt_modal_form', '#kt_modal_submit', '#kt_modal_open');
        CommonFormHandlers.initPageFormSubmission('#kt_form', '#kt_submit');
        CommonFormHandlers.initModalReset('#kt_modal_open');
        CommonFormHandlers.initDeleteConfirmation();

    });
</script>

<script>
    CommonFormHandlers.initToastr();
    @if(Session::has('toastr'))
    toastr.{{ Session::get('toastr.type') }}(
        "{{ Session::get('toastr.message') }}",
        "{{ Session::get('toastr.title', '') }}"
    );
=======
<script src="{{ asset('backend/assets/js/custom/documentation/forms/select2.js') }}"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></>


<script>

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toastr-top-right",
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
        toastr.{{ Session::get('toastr.type') }}(
            "{{ Session::get('toastr.message') }}",
            "{{ Session::get('toastr.title', '') }}"
        );
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
    @endif
</script>






<<<<<<< HEAD




=======
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
