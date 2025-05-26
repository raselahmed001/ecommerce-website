<!-- Add Modal -->
<div class="modal fade" id="kt_modal_open" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" id="kt_modal_form" method="POST">
                @csrf
                <input type="hidden" name="_method" id="form_method" value="POST">


                <div class="modal-header">
                    <h2 id="modal_title">Add Category</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
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

                <div class="modal-body py-10 px-lg-17">
                    <div class="scroll-y me-n7 pe-7">
                        <div class="d-flex flex-column mb-5 fv-row">
                            <div class="form-floating">
                                <input type="text"
                                       class="form-control form-control-solid"
                                       id="category_name"
                                       name="category_name"
                                       placeholder="Enter Category Name"/>
                                <label for="category_name" class="required">Category Name</label>
                                <div class="invalid-feedback-server text-danger"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer flex-center">
                    <button type="reset" class="btn btn-light-danger btn-light-danger me-3" data-bs-dismiss="modal">
                        <i class="fas fa-times-circle"></i> Cancel
                    </button>
                    <button type="submit" id="kt_modal_submit" class="btn btn-light-success btn-light-success">
                        <span class="indicator-label"><i class="fas fa-check-circle"></i> <span id="submit_button_text">Submit</span></span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

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
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d

            // Handle add button click
            $('#kt_modal_add').click(function () {
                $('#modal_title').text('Add Category');
                $('#submit_button_text').text('Submit');
                $('#form_method').val('POST');
                $('#kt_modal_form').attr('action', "{{ route('admin.categories.store') }}");
                $('#category_name').val('');
<<<<<<< HEAD
                CommonFormHandlers.clearValidationErrors();
=======
                clearValidationErrors();
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
            });

            // Handle edit button click

            $(document).on('click', '[data-id]', function () {
                var categoryId = $(this).data('id');
                $('#modal_title').text('Edit Category');
                $('#submit_button_text').text('Update');
                $('#form_method').val('PUT');
                $('#kt_modal_form').attr('action', '/admin/categories/' + categoryId);
<<<<<<< HEAD
                CommonFormHandlers.clearValidationErrors();
=======
                clearValidationErrors();
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d

                // Fetch category data via AJAX
                $.ajax({
                    url: '/admin/categories/' + categoryId + '/edit',
                    type: 'GET',
                    success: function (response) {
                        if (response.success) {
                            // Populate form fields with the fetched data
                            $('#category_name').val(response.data.category_name);
                            // Set other fields if needed

                            // Show the modal after data is loaded
                            $('#kt_modal_open').modal('show');
                        } else {
                            toastr.error('Failed to load category data', 'Error');
                        }
                    },
                    error: function (xhr) {
                        toastr.error('Failed to load category data', 'Error');
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
                $('.invalid-feedback-client').text('');
            }

            // Form submission handler
            $('#kt_modal_form').on('submit', function (e) {
                e.preventDefault();

                var form = $(this);
                var submitButton = $('#kt_modal_submit');
                var formData = form.serialize();
                var formAction = form.attr('action');
                var formMethod = $('#form_method').val();

                // Show loading state
                submitButton.prop('disabled', true);
                submitButton.find('.indicator-label').hide();
                submitButton.find('.indicator-progress').show();

                // Clear previous errors
                clearValidationErrors();

                $.ajax({
                    url: formAction,
                    type: formMethod === 'POST' ? 'POST' : 'PUT',
                    data: formData,
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

                                // Show server-side validation error below the input
                                input.closest('.fv-row').find('.invalid-feedback-server').text(messages[0]);
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






