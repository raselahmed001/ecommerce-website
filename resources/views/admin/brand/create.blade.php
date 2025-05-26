<!-- Modal Start -->
<div class="modal fade" id="kt_modal_open" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form class="form" id="kt_modal_form" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" id="form_method" value="POST">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h2 class="modal-title" id="modal_title">Add Brand</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <!-- Close Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                      transform="rotate(-45 6 17.3137)" fill="currentColor"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                      fill="currentColor"/>
                            </svg>
                        </span>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="modal-body py-10 px-lg-17">
                    <div class="d-flex flex-column flex-lg-row gap-7 gap-lg-10">
                        <!-- Left Column - Thumbnail -->
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Thumbnail</h2>
                                    </div>
                                </div>
                                <div class="card-body text-center pt-0">
                                    <div class="image-input image-input-empty image-input-outline mb-3"
                                         data-kt-image-input="true"
<<<<<<< HEAD
                                         style="background-color: #f5f8fa; background-image: url('{{asset('backend/assets/media/svg/files/blank-image.svg')}}')">
=======
                                         style="background-color: #f5f8fa; background-image: url(assets/media/svg/files/blank-image.svg)">
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
                                        <div class="image-input-wrapper w-150px h-150px"></div>
                                        <!-- Change button -->
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change"
                                            data-bs-toggle="tooltip"
                                            title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <input type="file" name="brand_logo" accept="image/*"/>
                                            <input type="hidden" name="brand_logo"/>
<<<<<<< HEAD


                                        </label>
                                        <div class="invalid-feedback invalid-feedback-server text-danger"></div>
=======
                                        </label>
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
                                        <!-- Cancel button -->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel"
                                            data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!-- Remove button -->
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove"
                                            data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
<<<<<<< HEAD

                                    </div>
                                    <!-- Error message container for brand_logo -->
                                    <div class="invalid-feedback invalid-feedback-server text-danger"></div>
=======
                                    </div>
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - Form Fields -->
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Brand Information</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">

                                    <div class="form-floating mb-3">
                                        <input type="text"
                                               class="form-control form-control-solid"
                                               id="brand_name"
                                               name="brand_name"
                                               placeholder="Enter Brand Name"/>
                                        <label for="brand_name" class="required">Brand Name</label>
                                        <div class="invalid-feedback invalid-feedback-server text-danger"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer flex-center">
                    <button type="reset"
                            class="btn btn-light-danger me-3"
                            data-bs-dismiss="modal">
                        <i class="fas fa-times-circle"></i> Cancel
                    </button>
                    <button type="submit"
                            id="kt_modal_submit"
                            class="btn btn-light-success">
                        <span class="indicator-label">
                            <i class="fas fa-check-circle"></i>
                            <span id="submit_button_text">Submit</span>
                        </span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal End -->


@push('scripts')
<<<<<<< HEAD

    <script>
        $(document).ready(function () {
=======
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {
            // Initialize Toastr
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "2000"
            };
            //     $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d

            // Handle add button click
            $('#kt_modal_add').click(function () {
                $('#modal_title').text('Add Brand');
                $('#submit_button_text').text('Submit');
                $('#form_method').val('POST');
                $('#kt_modal_form').attr('action', "{{ route('admin.brands.store') }}");
                $('#brand_name').val('');

                // You should also reset the image input here
                var imageInput = $('[data-kt-image-input="true"]');
                imageInput.addClass('image-input-empty');
<<<<<<< HEAD
                imageInput.find('.image-input-wrapper').css('background-image', 'url("{{ asset('backend/assets/media/svg/files/blank-image.svg') }}")');
                CommonFormHandlers.clearValidationErrors();
            });

            // Handle edit button click
=======
                imageInput.find('.image-input-wrapper').css('background-image', 'url(assets/media/svg/files/blank-image.svg)');
                clearValidationErrors();
            });

            // Handle edit button click

>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
            $(document).on('click', '[data-id]', function () {
                var brandId = $(this).data('id');
                $('#modal_title').text('Edit Brand');
                $('#submit_button_text').text('Update');
                $('#form_method').val('PUT');
                $('#kt_modal_form').attr('action', '/admin/brands/' + brandId);
<<<<<<< HEAD
                CommonFormHandlers.clearValidationErrors();
=======
                clearValidationErrors();
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d

                // Reset image input first
                var imageInput = $('[data-kt-image-input="true"]');
                imageInput.addClass('image-input-empty');
                imageInput.find('.image-input-wrapper').css('background-image', 'none');

                // Show loading state while fetching data
                $('#kt_modal_submit').prop('disabled', true).find('.indicator-progress').show();

                // Fetch category data via AJAX
                $.ajax({
                    url: '/admin/brands/' + brandId + '/edit',
                    type: 'GET',
                    success: function (response) {

                        $('#kt_modal_submit').prop('disabled', false).find('.indicator-progress').hide();

                        if (response.success) {
                            // Populate form fields with the fetched data
                            $('#brand_name').val(response.data.brand_name);
                            // Handle the logo display
                            if (response.data.brand_logo) {
                                var imageInput = $('[data-kt-image-input="true"]');
                                imageInput.removeClass('image-input-empty');
                                imageInput.find('.image-input-wrapper').css('background-image', 'url(' + response.data.brand_logo + ')');
                            }
                            // Set other fields if needed

                            // Show the modal after data is loaded
                            $('#kt_modal_open').modal('show');
                        } else {
                            toastr.error('Failed to load brand data', 'Error');
                        }
                    },
                    error: function (xhr) {
                        toastr.error('Failed to load brand data', 'Error');
                    }
                });
            });

<<<<<<< HEAD
        });

=======
            // Clear all validation errors
            function clearValidationErrors() {
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback-server').text('');
                // $('.invalid-feedback-client').text('');
            }

            // Form submission handler

            $('#kt_modal_form').on('submit', function (e) {
                e.preventDefault();

                var form = $(this);
                var submitButton = $('#kt_modal_submit');
                var formData = new FormData(this);
                var formAction = form.attr('action');
                var formMethod = $('#form_method').val();

                if (formMethod === 'PUT') {
                    formData.append('_method', 'PUT');
                }
                // Show loading state
                submitButton.prop('disabled', true);
                submitButton.find('.indicator-label').hide();
                submitButton.find('.indicator-progress').show();

                // Clear previous errors
                clearValidationErrors();

                $.ajax({
                    url: formAction,
                    type: 'POST',
                    data: formData,
                    processData: false,  // ফাইল আপলোডের জন্য জরুরি
                    contentType: false,


                    success: function (response) {
                        if (response.success) {
                            // Show success message
                            if (response.toastr) {
                                toastr[response.toastr.type](response.toastr.message, response.toastr.title);
                            }

                            // Hide modal
                            $('#kt_modal_open').modal('hide');

                            // Reload page after delay
                            setTimeout(function () {
                                window.location.reload();
                            }, 1500);
                        }
                    },
                    error: function (xhr) {
                        // Reset button state
                        submitButton.prop('disabled', false);
                        submitButton.find('.indicator-label').show();
                        submitButton.find('.indicator-progress').hide();

                        if (xhr.status === 422) {
                            // Validation errors
                            var response = xhr.responseJSON;

                            // Show error message
                            if (response.toastr) {
                                toastr[response.toastr.type](response.toastr.message, response.toastr.title);
                            }

                            // Display field errors
                            $.each(response.errors, function (field, messages) {
                                var input = $('[name="' + field + '"]');
                                input.addClass('is-invalid');

                                // Target the closest invalid-feedback element
                                input.closest('.form-floating').find('.invalid-feedback-server').text(messages[0]);
                            });
                        } else {
                            toastr.error('An error occurred. Please try again.', 'Error');
                        }
                    }
                });
            });

            // Reset form when modal is closed
            $('#kt_modal_open').on('hidden.bs.modal', function () {
                $(this).find('form')[0].reset();
                clearValidationErrors();
            });
        });

        $('.show_confirm').click(function (event) {
            event.preventDefault();
            var form = $(this).closest("form");

            swal({
                title: "Are you sure ?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
    </script>

@endpush






