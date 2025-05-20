<!--begin::Javascript-->
<script>
    // Global configuration
    var hostUrl = "{{ url('/') }}/backend/assets/";
</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('backend/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('backend/assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
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
    @endif
</script>










