@extends('layouts.app')

@section('content')

    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Products</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Products</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Filter menu-->
                <div class="m-0">
                    <!--begin::Menu toggle-->
                    <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder"
                       data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                        <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path
                                    d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                    fill="currentColor"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Filter</a>
                    <!--end::Menu toggle-->
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                         id="kt_menu_624475cf75c38">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
<<<<<<< HEAD
                            <div class="fs-5 text-dark fw-bolder">Product Filters</div>
=======
                            <div class="fs-5 text-dark fw-bolder">Filter Options</div>
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
                        </div>
                        <!--end::Header-->
                        <!--begin::Menu separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Menu separator-->
                        <!--begin::Form-->
<<<<<<< HEAD
                        <form method="GET" action="{{ route('admin.products.index') }}">
                            <div class="px-7 py-5">
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bold">Status:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <div>
                                        <select class="form-select form-select-solid" name="status"
                                                data-kt-select2="true" data-placeholder="Select status">
                                            <option value="">All Statuses</option>
                                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        </select>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bold">Product Types:</label>
                                    <!--end::Label-->
                                    <!--begin::Options-->
                                    <div class="d-flex flex-column">
                                        <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                            <input class="form-check-input" type="checkbox" name="main_slider" value="1"
                                                {{ request('main_slider') == '1' ? 'checked' : '' }}/>
                                            <span class="form-check-label">Main Slider</span>
                                        </label>
                                        <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                            <input class="form-check-input" type="checkbox" name="hot_deal" value="1"
                                                {{ request('hot_deal') == '1' ? 'checked' : '' }}/>
                                            <span class="form-check-label">Hot Deal</span>
                                        </label>
                                        <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                            <input class="form-check-input" type="checkbox" name="best_rated" value="1"
                                                {{ request('best_rated') == '1' ? 'checked' : '' }}/>
                                            <span class="form-check-label">Best Rated</span>
                                        </label>
                                        <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                            <input class="form-check-input" type="checkbox" name="mid_slider" value="1"
                                                {{ request('mid_slider') == '1' ? 'checked' : '' }}/>
                                            <span class="form-check-label">Mid Slider</span>
                                        </label>
                                        <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                            <input class="form-check-input" type="checkbox" name="hot_new" value="1"
                                                {{ request('hot_new') == '1' ? 'checked' : '' }}/>
                                            <span class="form-check-label">Hot New</span>
                                        </label>
                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" name="trendy" value="1"
                                                {{ request('trendy') == '1' ? 'checked' : '' }}/>
                                            <span class="form-check-label">Trendy</span>
                                        </label>
                                    </div>
                                    <!--end::Options-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Actions-->
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('admin.products.index') }}"
                                       class="btn btn-sm btn-light btn-active-light-primary me-2">
                                        Reset
                                    </a>
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Apply
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </div>
                        </form>
=======
                        <div class="px-7 py-5">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-bold">Status:</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div>
                                    <select class="form-select form-select-solid" data-kt-select2="true"
                                            data-placeholder="Select option"
                                            data-dropdown-parent="#kt_menu_624475cf75c38"
                                            data-allow-clear="true">
                                        <option></option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-bold">Member Type:</label>
                                <!--end::Label-->
                                <!--begin::Options-->
                                <div class="d-flex">
                                    <!--begin::Options-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="2" checked="checked"/>
                                        <span class="form-check-label">Customer</span>
                                    </label>
                                    <!--end::Options-->
                                </div>
                                <!--end::Options-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-bold">Notifications:</label>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" name="notifications"
                                           checked="checked"/>
                                    <label class="form-check-label">Enabled</label>
                                </div>
                                <!--end::Switch-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2"
                                        data-kt-menu-dismiss="true">Reset
                                </button>
                                <button type="submit" class="btn btn-sm btn-primary"
                                        data-kt-menu-dismiss="true">Apply
                                </button>
                            </div>
                            <!--end::Actions-->
                        </div>
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
                        <!--end::Form-->
                    </div>
                    <!--end::Menu 1-->
                </div>

                <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-light-primary">Create</a>
                <!--end::Primary button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="px-5">
            <!--begin::Category-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                      transform="rotate(45 17.0365 15.1223)" fill="currentColor"/>
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor"/>
                            </svg>
                        </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-ecommerce-category-filter="search"
                                   class="form-control form-control-solid w-250px ps-14" placeholder="Search Category"/>
                        </div>
                        <!--end::Search-->
                    </div>

                    <!--end::Card toolbar-->
                </div>
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                        <!--begin::Table head-->
                        <thead>

                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                           data-kt-check-target="#kt_ecommerce_category_table .form-check-input"
                                           value="1"/>
                                </div>
                            </th>
                            <th class="min-w-50px">#</th>
                            <th class="min-w-200px">Product</th>
                            <th class="min-w-150px">Product Code</th>
                            <th class="text-start min-w-100px">Category</th>
                            <th class="text-end min-w-100px">Brand</th>
                            <th class="text-end min-w-70px">Qty</th>
                            <th class="text-end min-w-100px">Price</th>
                            <th class="text-end min-w-100px">Status</th>
                            <th class="text-end min-w-70px">Actions</th>
                        </tr>
                        <!--end::Table row-->
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                        @foreach($products as $key=> $product)
                            <!--begin::Table row-->
                            <tr>
                                <!--begin::Checkbox-->
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1"/>
                                    </div>
                                </td>
                                <!--end::Checkbox-->
                                <td class="text-sm-start pe-0" data-order="25">
                                    <span class="fw-bolder ms-3">{{$key + 1}}</span>
                                </td>
                                <!--begin::Category=-->
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!--begin::Thumbnail-->
                                        <a href=""
                                           class="symbol symbol-50px">
                                            <span class="symbol-label"
                                                  style="background-image: url('{{ asset($product->image_one) }}'); background-size: cover;"></span>

                                        </a>
                                        <!--end::Thumbnail-->
                                        <div class="ms-5">
                                            <!--begin::Title-->
                                            <span
                                                class="text-gray-800 text-hover-primary fs-5 fw-bolder"
                                                data-kt-ecommerce-product-filter="product_name">{{$product->product_name}}</span>
                                            <!--end::Title-->
                                        </div>
                                    </div>
                                </td>
                                <!--end::Category=-->
                                <!--begin::Product Code=-->
                                <td class="text-start pe-0">
                                    <span class="fw-bolder">{{$product->product_code}}</span>
                                </td>
                                <!--end::Product Code=-->
                                <td class="text-sm-start pe-0">
                                    <span class="fw-bolder">{{$product->category->category_name ?? 'N/A'}}</span>
                                </td>
                                <td class="text-sm-end pe-0">
                                    <span class="fw-bolder">{{ $product->brand->brand_name ?? 'N/A' }}</span>
                                </td>
                                <!--begin::Qty=-->
                                <td class="text-sm-center pe-0" data-order="25">
                                    <span class="fw-bolder ms-3">{{$product->product_quantity}}</span>
                                </td>
                                <!--end::Qty=-->
                                <!--begin::Price=-->
                                <td class="text-end pe-0">
                                    <span class="fw-bolder text-dark">{{$product->selling_price}}</span>
                                </td>
                                <!--end::Price=-->
                                <!--begin::Status=-->
                                <td class="text-end pe-0" data-order="{{ $product->status }}">
                                    <div
                                        class="badge {{ $product->status == 1 ? 'badge-light-success' : 'badge-light-danger' }}">
                                        {{ $product->status == 1 ? 'Active' : 'Inactive' }}
                                    </div>
                                </td>

                                <!--end::Status=-->
                                <!--begin::Action=-->
                                <td class="text-sm-end">
                                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                       data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                    fill="currentColor"/>
                                            </svg>
                                        </span>

                                    </a>
<<<<<<< HEAD

=======
                                    {{--                                    test--}}
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
                                    <div
                                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                        data-kt-menu="true">

                                        {{-- Edit --}}
                                        <div class="menu-item px-3">
                                            <a href="{{ route('admin.products.edit', $product) }}"
                                               class="d-flex justify-content-center align-items-center btn btn-sm btn-light-success text-hover-white"
                                               style="height: 30px; width: 100px;"
                                               data-id="{{ $product->id }}">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                        </div>

                                        {{-- View --}}
                                        <div class="menu-item px-3">
                                            <a href="{{ route('admin.products.show', $product) }}"
                                               class="d-flex justify-content-center align-items-center btn btn-sm btn-light-primary text-hover-white"
                                               style="height: 30px; width: 100px;">
                                                <i class="bi bi-eye"></i>View
                                            </a>
                                        </div>

                                        {{-- Status Toggle --}}
                                        <div class="menu-item px-3">
                                            <form method="POST"
                                                  action="{{ route('admin.products.toggle-status', $product) }}">
                                                @csrf
                                                <button type="submit"
                                                        class="d-flex justify-content-center align-items-center btn btn-sm
                                                          {{ $product->status ? 'btn-light-warning' : 'btn-light-success' }}
                                                          text-hover-white"
<<<<<<< HEAD
                                                        style="height: 30px; width: 100px;">
=======
                                                        style="height: 30px; width: 100px;" >
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
                                                    <i class="bi {{ $product->status ? 'bi-x-circle' : 'bi-check-circle' }} me-1"></i>
                                                    {{ $product->status ? 'Deactivate' : 'Activate' }}
                                                </button>
                                            </form>
                                        </div>

                                        {{-- Delete --}}
                                        <div class="menu-item px-3">
                                            <form method="POST"
                                                  action="{{ route('admin.products.destroy', $product) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="d-flex justify-content-center btn btn-sm btn-light-danger text-hover-white show_confirm"
                                                        style="height: 30px; width: 100px;"
                                                        data-toggle="tooltip" title='Delete'>
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>

                                    </div>

                                    <!--end::Menu-->
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->

                            <!--end::Table row-->
                        @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Category-->
<<<<<<< HEAD
        </div>
=======
        </div>ñ
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
        <!--end::Container-->
    </div>
    <!--end::Post-->

@endsection
<<<<<<< HEAD



=======
@push('scripts')

    @if(Session::has('toastr'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Configure toastr options
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    positionClass: "toast-top-right",
                    timeOut: "2000"
                };

                // Display the toastr message
                toastr.{{ Session::get('toastr.type') }}(
                    '{{ Session::get('toastr.message') }}',
                    '{{ Session::get('toastr.title') }}'
                );
            });
        </script>
    @endif
@endpush
>>>>>>> 9a955228f4c04072fa4e46bf20ddfec168f1d60d
