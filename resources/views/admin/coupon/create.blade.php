<!-- Add Modal -->
<div class="modal fade" id="kt_modal_open" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" id="kt_modal_form" method="POST">
                @csrf
                <input type="hidden" name="_method" id="form_method" value="POST">

                <div class="modal-header">
                    <h2 id="modal_title">Add Coupon</h2>
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
                                       id="coupon_code"
                                       name="coupon_code"
                                       placeholder="Enter Coupon Code"/>
                                <label for="coupon_code" class="required">Coupon Code</label>

                                <div class="invalid-feedback-server text-danger mt-1"></div>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-5 fv-row">
                            <div class="form-floating">
                                <input type="text"
                                       class="form-control form-control-solid"
                                       id="discount_amount"
                                       name="discount_amount"
                                       placeholder="Enter Coupon Discount (%)"/>
                                <label for="discount_amount" class="required">Coupon Discount (%)</label>
                                <div class="invalid-feedback-server text-danger mt-1"></div>
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

    <script>
        $(document).ready(function () {
            // Handle add button click
            $('#kt_modal_add').click(function () {
                $('#modal_title').text('Add Coupon');
                $('#submit_button_text').text('Submit');
                $('#form_method').val('POST');
                $('#kt_modal_form').attr('action', "{{ route('admin.coupons.store') }}");
                $('#coupon_code').val('');
                $('#discount_amount').val('');
                CommonFormHandlers.clearValidationErrors();
            });

            // Handle edit button click
            $(document).on('click', '[data-id]', function () {
                var couponId = $(this).data('id');
                $('#modal_title').text('Edit Coupon');
                $('#submit_button_text').text('Update');
                $('#form_method').val('PUT');
                $('#kt_modal_form').attr('action', '/admin/coupons/' + couponId);
                CommonFormHandlers.clearValidationErrors();


                // Fetch coupon data via AJAX
                $.ajax({
                    url: '/admin/coupons/' + couponId + '/edit',
                    type: 'GET',
                    success: function (response) {
                        if (response.success) {
                            // Populate form fields with the fetched data
                            $('#coupon_code').val(response.data.coupon_code);
                            $('#discount_amount').val(response.data.discount_amount);

                            // Show the modal after data is loaded
                            $('#kt_modal_open').modal('show');
                        } else {
                            toastr.error('Failed to load coupon data', 'Error');
                        }
                    },
                    error: function (xhr) {
                        toastr.error('Failed to load coupon data', 'Error');
                    }
                });
            });

        });
    </script>
@endpush

