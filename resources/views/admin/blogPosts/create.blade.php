<!-- Modal Start -->
<div class="modal fade" id="kt_modal_open" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <form class="form" id="kt_modal_form" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" id="form_method" value="POST">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h2 class="modal-title" id="modal_title">Add Blog Post</h2>
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
                                            <input type="file" name="image" accept="image/*"/>
                                            <input type="hidden" name="image"/>
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
                                        <h2>Blog Post Information</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row g-5">

                                        <!-- Row 1: Blog Category -->
                                        <div class="col-12 fv-row">
                                            <label for="post_category_id" class="required form-label">Blog Category</label>
                                            <select class="form-select form-select-solid" name="post_category_id" id="post_category_id" required>
                                                <option value="">Select Blog Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback-server text-danger"></div>
                                        </div>


                                        <!-- Row 2: Title English + Title Bangla -->
                                        <div class="col-md-6 form-floating fv-row">
                                            <input type="text" class="form-control" id="title_en" name="title_en"
                                                   placeholder="Enter English Title"
                                                   value=""/>
                                            <label for="title_en" class="required">Title English</label>
                                            <div class="invalid-feedback-server text-danger mt-1"></div>
                                        </div>

                                        <div class="col-md-6 form-floating fv-row">
                                            <input type="text" class="form-control" id="title_bn" name="title_bn"
                                                   placeholder="Enter Bangla Title"
                                                   value=""/>
                                            <label for="title_bn" class="required">Title Bangla</label>
                                            <div class="invalid-feedback-server text-danger mt-1"></div>
                                        </div>

                                        <!-- Row 3: Details English + Details Bangla -->
                                        <div class="col-md-6">
                                            <label class="form-label">Details English</label>
                                            <!-- Changed ID to be unique -->
                                            <textarea id="kt_docs_tinymce_basic_en" name="details_en" class="tox-target"></textarea>
                                            <div class="text-muted fs-7">Set a description to the Blog for better visibility.</div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Details Bangla</label>
                                            <!-- Changed ID to be different from English version -->
                                            <textarea id="kt_docs_tinymce_basic_bn" name="details_bn" class="tox-target"></textarea>
                                            <div class="text-muted fs-7">Set a description to the Blog for better visibility.</div>
                                        </div>

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
            // Initialize TinyMCE for English editor
            tinymce.init({
                selector: '#kt_docs_tinymce_basic_en',
                plugins: 'link lists',
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | bullist numlist | link',
                height: 300
            });

            // Initialize TinyMCE for Bangla editor
            tinymce.init({
                selector: '#kt_docs_tinymce_basic_bn',
                plugins: 'link lists',
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | bullist numlist | link',
                height: 300
            });

            $('#kt_modal_submit').on('click', function (e) {
                e.preventDefault();
                tinymce.triggerSave();
                $('#kt_modal_form').submit();
            });

            // Handle add button click
            $('#kt_modal_add').click(function () {
                $('#modal_title').text('Add Blog Post');
                $('#submit_button_text').text('Submit');
                $('#form_method').val('POST');
                $('#kt_modal_form').attr('action', "{{ route('admin.blogs-posts.store') }}");
                $('#post_category_id').val('').trigger('change');
                $('#title_en').val('');
                $('#title_bn').val('');

                // Clear TinyMCE editors
                if (tinymce.get('kt_docs_tinymce_basic_en')) {
                    tinymce.get('kt_docs_tinymce_basic_en').setContent('');
                }
                if (tinymce.get('kt_docs_tinymce_basic_bn')) {
                    tinymce.get('kt_docs_tinymce_basic_bn').setContent('');
                }

                // Reset image input
                var imageInput = $('[data-kt-image-input="true"]');
                imageInput.addClass('image-input-empty');
                imageInput.find('.image-input-wrapper').css('background-image', 'url("{{ asset('backend/assets/media/svg/files/blank-image.svg') }}")');
                CommonFormHandlers.clearValidationErrors();
            });

            // Handle edit button click
            $(document).on('click', '[data-id]', function () {
                var blogPostId = $(this).data('id');
                $('#modal_title').text('Edit Blog Post');
                $('#submit_button_text').text('Update');
                $('#form_method').val('PUT');
                $('#kt_modal_form').attr('action', '/admin/blogs-posts/' + blogPostId);
                CommonFormHandlers.clearValidationErrors();

                // Reset image input first
                var imageInput = $('[data-kt-image-input="true"]');
                imageInput.addClass('image-input-empty');
                imageInput.find('.image-input-wrapper').css('background-image', 'none');

                // Show loading state while fetching data
                $('#kt_modal_submit').prop('disabled', true).find('.indicator-progress').show();

                // Fetch blog post data via AJAX
                $.ajax({
                    url: '/admin/blogs-posts/' + blogPostId + '/edit',
                    type: 'GET',
                    success: function (response) {
                        $('#kt_modal_submit').prop('disabled', false).find('.indicator-progress').hide();

                        if (response.success) {
                            // Populate form fields with the fetched data
                            $('#post_category_id').val(response.data.post_category_id).trigger('change');
                            $('#title_en').val(response.data.title_en);
                            $('#title_bn').val(response.data.title_bn);

                            // Set TinyMCE editor content
                            if(response.data.details_en) {
                                tinymce.get('kt_docs_tinymce_basic_en').setContent(response.data.details_en);
                            }
                            if(response.data.details_bn) {
                                tinymce.get('kt_docs_tinymce_basic_bn').setContent(response.data.details_bn);
                            }

                            // Handle the image display
                            if (response.data.image) {
                                var imageInput = $('[data-kt-image-input="true"]');
                                imageInput.removeClass('image-input-empty');
                                imageInput.find('.image-input-wrapper').css('background-image', 'url(' + response.data.image + ')');
                            }

                            // Show the modal after data is loaded
                            $('#kt_modal_open').modal('show');
                        } else {
                            toastr.error('Failed to load blog post data', 'Error');
                        }
                    },
                    error: function (xhr) {
                        toastr.error('Failed to load blog post data', 'Error');
                    }
                });
            });


            // Clear editors when modal is closed
            $('#kt_modal_open').on('hidden.bs.modal', function () {
                tinymce.get('kt_docs_tinymce_basic_en').setContent('');
                tinymce.get('kt_docs_tinymce_basic_bn').setContent('');
            });
        });
    </script>
@endpush



