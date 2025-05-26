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
                                         style="background-color: #f5f8fa; background-image: url('{{asset('backend/assets/media/svg/files/blank-image.svg')}}')">
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


                                        </label>
                                        <div class="invalid-feedback invalid-feedback-server text-danger"></div>
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

                                    </div>
                                    <!-- Error message container for brand_logo -->
                                    <div class="invalid-feedback invalid-feedback-server text-danger"></div>
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

    <script>
        $(document).ready(function () {

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
                imageInput.find('.image-input-wrapper').css('background-image', 'url("{{ asset('backend/assets/media/svg/files/blank-image.svg') }}")');
                CommonFormHandlers.clearValidationErrors();
            });

            // Handle edit button click
            $(document).on('click', '[data-id]', function () {
                var brandId = $(this).data('id');
                $('#modal_title').text('Edit Brand');
                $('#submit_button_text').text('Update');
                $('#form_method').val('PUT');
                $('#kt_modal_form').attr('action', '/admin/brands/' + brandId);
                CommonFormHandlers.clearValidationErrors();

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

        });

    </script>

@endpush






