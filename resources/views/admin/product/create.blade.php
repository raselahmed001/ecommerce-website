@extends('layouts.app')

@section('content')

    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Product Form
                </h1>
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>

                    <li class="breadcrumb-item text-dark">{{ isset($product->id) ? 'Edit Product' : 'Add Product'}}</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-light-primary">All Product</a>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Form-->
<<<<<<< HEAD
=======
            {{--            <form action="{{ route('admin.products.store') }}" method="POST" id="kt_form"--}}
            {{--                  class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">--}}
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d

            <form
                action="{{ isset($product->id) ? route('admin.products.update', $product->id) : route('admin.products.store') }}"
                method="POST"
                id="kt_form"
                class="form d-flex flex-column flex-lg-row"
                enctype="multipart/form-data">
                @csrf
                @if(isset($product->id))
                    @method('PUT')
                @endif
<<<<<<< HEAD
                @if(isset($product->id))
                    @foreach(['image_one', 'image_two', 'image_three'] as $imageField)
                        @if($product->$imageField)
                            <input type="hidden" name="{{ $imageField }}_existing" value="{{ $product->$imageField }}">
                            <input type="hidden" name="{{ $imageField }}_remove" value="0">
                        @endif
                    @endforeach
                @endif

                <!-- Hidden inputs for Tagify values -->
                <input type="hidden" name="product_color" value="{{ old('product_color', $product->product_color ?? '') }}">
                <input type="hidden" name="product_size" value="{{ old('product_size', $product->product_size ?? '') }}">
=======
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <!--begin::Product Images-->

                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2 class="fw-bold">Product Images</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <!-- Main Image -->
                            <div class="mb-10">
                                <label class="required form-label fs-6 fw-bold fv-row">Main Image </label>
                                <div
                                    class="image-input image-input-empty image-input-outline {{ empty($product->image_one) ? 'image-input-empty' : '' }}"
                                    data-kt-image-input="true"
                                    style="background-image: url('{{ $product->image_one ? asset($product->image_one) : asset('backend/assets/media/svg/files/blank-image.svg') }}')">
                                    <div class="image-input-wrapper w-200px h-200px"
                                         style="background-image: url('{{ $product->image_one ?? '' ? asset($product->image_one ?? '') : '' }}')"></div>
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        title="Change image">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="file" name="image_one" accept=".png, .jpg, .jpeg, .webp"/>
                                        <input type="hidden" name="image_one_remove"/>
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        title="Cancel image">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        title="Remove image">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                </div>
                                <div class="invalid-feedback-server text-danger mt-1"></div>
                            </div>

                            <!-- Additional Images Row -->
                            <div class="row g-5">
                                <!-- Image Two -->
                                <div class="col-sm-6 mb-5">
                                    <label class="form-label fs-6 fw-bold">Image Two</label>
                                    <div class="d-flex justify-content-center">
                                        <div
                                            class="image-input image-input-empty image-input-outline {{ empty($product->image_two ?? '') ? 'image-input-empty' : '' }}"
                                            style="width: 150px; height: 100px; background-image: url('{{ $product->image_two ?? '' ? asset($product->image_two ?? '') : asset('backend/assets/media/svg/files/blank-image.svg') }}')"
                                            data-kt-image-input="true">
                                            <div class="image-input-wrapper w-100 h-100"
                                                 style="background-image: url('{{ $product->image_two ?? '' ? asset($product->image_two ?? '') : '' }}')"></div>
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="Change image">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <input type="file" name="image_two" accept=".png, .jpg, .jpeg, .webp"/>
                                                <input type="hidden" name="image_two_remove"/>
                                            </label>
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="Cancel image">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="Remove image">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Image Three -->
                                <div class="col-sm-6 mb-5">
                                    <label class="form-label fs-6 fw-bold">Image Three</label>
                                    <div class="d-flex justify-content-center">
                                        <div
                                            class="image-input image-input-empty image-input-outline {{ empty($product->image_three ?? '') ? 'image-input-empty' : '' }} "
                                            style="width: 150px; height: 100px; background-image: url('{{ $product->image_three ?? '' ? asset($product->image_three ?? '') : asset('backend/assets/media/svg/files/blank-image.svg') }}')"
                                            data-kt-image-input="true">
                                            <div class="image-input-wrapper w-100 h-100"
                                                 style="background-image: url('{{ $product->image_three ?? '' ? asset($product->image_three ?? '') : '' }}')"></div>
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="Change image">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <input type="file" name="image_three"
                                                       accept=".png, .jpg, .jpeg, .webp"/>
                                                <input type="hidden" name="image_three_remove"/>
                                            </label>
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="Cancel image">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="Remove image">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Product Images-->

                    <!--begin::Status-->
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Status</h2>
                            </div>
                            <div class="card-toolbar">
                                <div
                                    class="rounded-circle bg-{{ ($product->status ?? 1) ? 'success' : 'danger' }} w-15px h-15px"
                                    id="kt_ecommerce_add_product_status"></div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <select class="form-select mb-2" name="status" data-control="select2"
                                    data-hide-search="true" id="kt_ecommerce_add_product_status_select">
                                <option value="1" {{ old('status', $product->status ?? 1) == 1 ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="0" {{ old('status', $product->status ?? 1) == 0 ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>
                        </div>
                    </div>
                    <!--end::Status-->
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Product Features</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <!-- Main Slider -->
                            <div class="form-check form-check-custom form-check-solid mb-3">
                                <input class="form-check-input" type="checkbox" value="1" name="main_slider"
                                       id="main_slider" {{ old('main_slider', $product->main_slider ?? 0) ? 'checked' : '' }}/>
                                <label class="form-check-label" for="main_slider">Main Slider</label>
                            </div>

                            <!-- Hot Deal -->
                            <div class="form-check form-check-custom form-check-solid mb-3">
                                <input class="form-check-input" type="checkbox" value="1" name="hot_deal"
                                       id="hot_deal" {{ old('hot_deal', $product->hot_deal ?? 0) ? 'checked' : '' }}/>
                                <label class="form-check-label" for="hot_deal">Hot Deal</label>
                            </div>

                            <!-- Best Rated -->
                            <div class="form-check form-check-custom form-check-solid mb-3">
                                <input class="form-check-input" type="checkbox" value="1" name="best_rated"
                                       id="best_rated" {{ old('best_rated', $product->best_rated ?? 0) ? 'checked' : '' }}/>
                                <label class="form-check-label" for="best_rated">Best Rated</label>
                            </div>

                            <!-- Mid Slider -->
                            <div class="form-check form-check-custom form-check-solid mb-3">
                                <input class="form-check-input" type="checkbox" value="1" name="mid_slider"
                                       id="mid_slider" {{ old('mid_slider', $product->mid_slider ?? 0) ? 'checked' : '' }}/>
                                <label class="form-check-label" for="mid_slider">Mid Slider</label>
                            </div>

                            <!-- Hot New -->
                            <div class="form-check form-check-custom form-check-solid mb-3">
                                <input class="form-check-input" type="checkbox" value="1" name="hot_new"
                                       id="hot_new" {{ old('hot_new', $product->hot_new ?? 0) ? 'checked' : '' }}/>
                                <label class="form-check-label" for="hot_new">Hot New</label>
                            </div>

                            <!-- Trendy -->
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" name="trendy"
                                       id="trendy" {{ old('trendy', $product->trendy ?? 0) ? 'checked' : '' }}/>
                                <label class="form-check-label" for="trendy">Trendy</label>
                            </div>
                        </div>
                    </div>
                    <!--end::Product Features-->
                </div>
                <!--end::Aside column-->

                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General Information</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row mb-10 ">
                                <!-- Product Name -->
                                <div class="col-md-6 form-floating fv-row">
                                    <input type="text" class="form-control" id="product_name" name="product_name"
                                           placeholder="Product name"
                                           value="{{ old('product_name', $product->product_name ?? '') }}"/>
                                    <label for="product_name" class="required">Product Name</label>
                                    <div class="invalid-feedback-server text-danger mt-1"></div>

                                </div>

                                <!-- Product Code -->
                                <div class="col-md-6 form-floating fv-row">
                                    <input type="text" class="form-control" id="product_code" name="product_code"
                                           placeholder="Product code"
                                           value="{{ old('product_code', $product->product_code ?? '') }}"/>
                                    <label for="product_code" class="required">Product Code</label>
                                    <div class="invalid-feedback-server text-danger mt-1"></div>
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="row mb-10">
                                <div class="col-md-6 fv-row">
                                    <label class="required form-label">Category</label>
                                    <select class="form-select" name="category_id" data-control="select2">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                    @if(old('category_id', $product->category_id ?? '') == $category->id) selected @endif>
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <div class="invalid-feedback-server text-danger mt-1"></div>
                                </div>

                                <!-- Sub Category -->
                                <div class="col-md-6 ">
                                    <label class="form-label">Sub Category</label>
                                    <select class="form-select" name="sub_category_id" data-control="select2"
                                            id="sub_category_id">
                                        <option value="">Select Sub Category</option>
                                        <!-- Options will be populated by JavaScript -->
                                    </select>
<<<<<<< HEAD
                                    <div class="invalid-feedback-server text-danger mt-1"></div>
=======
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
                                </div>
                            </div>

                            <!-- Brand -->
                            <div class="row mb-10">
                                <div class="col-md-6">
                                    <label class="form-label">Brand</label>
                                    <select class="form-select" name="brand_id" id="brand_id" data-control="select2"
                                    >
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $brand)
                                            <option
                                                value="{{ $brand->id }}"
                                                {{ old('brand_id', $product->brand_id ?? '') == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->brand_name }}
                                            </option>
                                        @endforeach
                                    </select>
<<<<<<< HEAD
                                    <div class="invalid-feedback-server text-danger mt-1"></div>
=======
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d

                                </div>

                                <!-- Product Quantity -->
                                <div class="form-floating col-md-6 mt-8 fv-row">
                                    <input type="number" class="form-control" id="product_quantity"
                                           name="product_quantity" placeholder="Quantity"
                                           value="{{ old('product_quantity', $product->product_quantity ?? '') }}"/>
                                    <label for="product_quantity" class="required">Product Quantity</label>
                                    <div class="invalid-feedback-server text-danger mt-1"></div>
                                </div>
                            </div>

                            <!-- Product Color -->
                            <div class="row mb-10">
                                <div class="col-md-6 fv-row">
                                    <label class="required form-label">Product Color</label>
                                    <input type="text" class="form-control" name="product_color" id="kt_tagify_1"
                                           value="{{ old('product_color', $product->product_color ?? '') }}"/>
                                    <div class="invalid-feedback-server text-danger mt-1"></div>
                                </div>
                                <!-- Product Size -->
                                <div class="col-md-6 fv-row">
                                    <label class="required form-label">Product Size</label>
                                    <input type="text" class="form-control" name="product_size" id="kt_tagify_2"
                                           value="{{ old('product_size', $product->product_size ?? '') }}"/>
                                    <div class="invalid-feedback-server text-danger mt-1"></div>
                                </div>
                            </div>
<<<<<<< HEAD
                            <!-- Product Details -->
                            <div class="mb-10 col-12">
                                <label class="form-label">Description</label>
                                <textarea id="kt_docs_tinymce_basic" name="product_details" class="tox-target">
                                    {!! old('product_details', $product->product_details ?? '') !!}
                                    </textarea>
                                <div class="text-muted fs-7">Set a description to the product for better visibility.
                                </div>
                            </div>

=======


                            <!-- Product Details -->
                            <div>
                                <label class="form-label">Description</label>
                                <div id="kt_ecommerce_add_product_description"
                                     name="kt_ecommerce_add_product_description" class="min-h-200px mb-2">{{ old('product_details', $product->product_details ?? '') }}</div>
                                <div class="text-muted fs-7">Set a description to the product for better visibility.
                                </div>

                            </div>
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
                        </div>
                    </div>
                    <!--end::General options-->


                    <!--begin::Pricing-->
                    <div class="row mb-10">
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Pricing</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <!-- Selling Price -->
                                    <div class="col-md-6 mb-5 mb-md-0 fv-row">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="selling_price"
                                                   name="selling_price"
<<<<<<< HEAD
                                                   placeholder="0"
                                                   value="{{ old('selling_price', $product->selling_price ?? '') }}"
                                                   step="0.01" min="0"/>
=======
                                                   placeholder="0"  value="{{ old('selling_price', $product->selling_price ?? '') }}" step="0.01" min="0"/>
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
                                            <label for="selling_price" class="required">Selling Price</label>
                                            <div class="invalid-feedback-server text-danger mt-1"></div>
                                        </div>
                                    </div>

                                    <!-- Discount Price -->
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="discount_price"
                                                   name="discount_price"
<<<<<<< HEAD
                                                   placeholder="0"
                                                   value="{{ old('discount_price', $product->discount_price ?? '') }}"
                                                   step="0.01" min="0"/>
=======
                                                   placeholder="0" value="{{ old('discount_price', $product->discount_price ?? '') }}" step="0.01" min="0"/>
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
                                            <label for="discount_price">Discount Price (%)</label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Pricing-->

                    <!--begin::Video Link-->
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Video Link</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="form-floating">
                                <input type="url" class="form-control" id="video_link" name="video_link"
<<<<<<< HEAD
                                       placeholder="https://youtube.com/embed/..."
                                       value="{{ old('video_link', $product->video_link ?? '') }}"/>
=======
                                       placeholder="https://youtube.com/embed/..." value="{{ old('video_link', $product->video_link ?? '') }}"/>
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
                                <label for="video_link">Video URL</label>
                            </div>
                        </div>
                    </div>

                    <!--end::Video Link-->

                    <div class="d-flex justify-content-end">
                        <button type="submit" id="kt_submit" class="btn btn-light-success">
                            <span class="indicator-label"><i class="fas fa-check-circle"></i> Submit</span>
                            <span class="indicator-progress">Please wait...
<<<<<<< HEAD
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
=======
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
                        </button>
                    </div>
                </div>
                <!--end::Main column-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Container-->
    </div>
<<<<<<< HEAD
    <style>
        .tox-tinymce {
            height: 300px !important;
        }
    </style>
=======

>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
@endsection

@push('scripts')

<<<<<<< HEAD
    <script>
        $(document).ready(function () {
=======
    <!-- SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="{{ asset('js/common-form-handlers.js') }}"></script>


    <script>
        $(document).ready(function () {
            // Initialize toastr
            CommonFormHandlers.initToastr();
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d

            // Initialize Tagify
            const initTagify = (selector) => {
                const input = document.querySelector(selector);
                if (input) {
                    return new Tagify(input, {
                        originalInputValueFormat: valuesArr => JSON.stringify(valuesArr)
                    });
                }
                return null;
            };

            const tagify1 = initTagify("#kt_tagify_1");
            const tagify2 = initTagify("#kt_tagify_2");

            // Initialize Select2
            $('[data-control="select2"]').select2({
                width: '100%'
            });

            // Handle category change event
            const categorySelect = $('select[name="category_id"]');
            const subcategorySelect = $('#sub_category_id');
            const oldSubcategory = @json(old('sub_category_id'));
            const productSubcategory = @json($product->sub_category_id ?? null);

            categorySelect.on('change', function () {
                const categoryId = $(this).val();

                subcategorySelect.empty().append('<option value="">Select Sub Category</option>');
                subcategorySelect.prop('disabled', true).trigger('change');

                if (categoryId) {
                    $.ajax({
                        url: '{{ url("/admin/get-subcategories") }}/' + categoryId,
                        type: 'GET',
                        success: function (response) {
                            if (response && response.length > 0) {
                                $.each(response, function (key, subcategory) {
                                    subcategorySelect.append(
                                        $('<option></option>')
                                            .val(subcategory.id)
                                            .text(subcategory.sub_category_name)
                                    );
                                });
                            }
                            subcategorySelect.prop('disabled', false).trigger('change');

                            const selectedValue = oldSubcategory || productSubcategory;
                            if (selectedValue) {
                                subcategorySelect.val(selectedValue).trigger('change');
                            }
                        },
                        error: function () {
                            console.error('Error loading subcategories');
                            subcategorySelect.prop('disabled', false).trigger('change');
                            toastr.error('Failed to load subcategories', 'Error');
                        }
                    });
                } else {
                    subcategorySelect.prop('disabled', false).trigger('change');
                }
            });

            // Trigger change on page load if category is already selected
            if (categorySelect.val()) {
                categorySelect.trigger('change');
            } else if (productSubcategory) {
                const productCategoryId = @json($product->category_id ?? null);
                if (productCategoryId) {
                    categorySelect.val(productCategoryId).trigger('change');
                }
            }
<<<<<<< HEAD

        });

    </script>

@endpush



=======
            // Form submission handler
            CommonFormHandlers.initPageFormSubmission('#kt_form', '#kt_submit');
            CommonFormHandlers.initDeleteConfirmation();
        });
    </script>

@endpush
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
