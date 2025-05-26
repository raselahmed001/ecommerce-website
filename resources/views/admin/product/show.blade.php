@extends('layouts.app')

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Product Details</h1>
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.products.index') }}" class="text-muted text-hover-primary">Products</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-dark">{{ $product->product_name }}</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit
                    Product</a>
                <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-light-primary">All Products</a>
            </div>
        </div>
    </div>
    <!--end::Toolbar-->

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <div class="card-body p-lg-20">
                    <div class="d-flex flex-column flex-xl-row">
                        <!--begin::Sidebar-->
                        <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                            <!--begin::Card-->
                            <div class="card mb-5 mb-xl-8">
                                <div class="card-body">
                                    <!--begin::Product images-->
                                    <div class="mb-7 text-center">
                                        <div class="image-input image-input-outline" data-kt-image-input="true">
                                            <div class="image-input-wrapper w-300px h-300px"
                                                 style="background-image: url('{{ asset($product->image_one) }}')"></div>
                                        </div>
                                    </div>

                                    <div class="row g-5">
                                        @if($product->image_two)
                                            <div class="col-6">
                                                <div class="image-input image-input-outline" data-kt-image-input="true">
                                                    <div class="image-input-wrapper w-150px h-150px"
                                                         style="background-image: url('{{ asset($product->image_two) }}')"></div>
                                                </div>
                                            </div>
                                        @endif

                                        @if($product->image_three)
                                            <div class="col-6">
                                                <div class="image-input image-input-outline" data-kt-image-input="true">
                                                    <div class="image-input-wrapper w-150px h-150px"
                                                         style="background-image: url('{{ asset($product->image_three) }}')"></div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Product images-->
                                </div>
                            </div>
                            <!--end::Card-->

                            <!--begin::Status-->
                            <div class="card mb-5 mb-xl-8">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Status</h2>
                                    </div>
                                    <div class="card-toolbar">
                                        <span
                                            class="badge badge-light-{{ $product->status ? 'success' : 'danger' }} fs-7 fw-bold">
                                            {{ $product->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--end::Status-->

                            <!--begin::Features-->
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Product Features</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="d-flex flex-wrap gap-5">
                                        @if($product->main_slider)
                                            <span class="badge badge-light-primary">Main Slider</span>
                                        @endif

                                        @if($product->hot_deal)
                                            <span class="badge badge-light-danger">Hot Deal</span>
                                        @endif

                                        @if($product->best_rated)
                                            <span class="badge badge-light-success">Best Rated</span>
                                        @endif

                                        @if($product->mid_slider)
                                            <span class="badge badge-light-info">Mid Slider</span>
                                        @endif

                                        @if($product->hot_new)
                                            <span class="badge badge-light-warning">Hot New</span>
                                        @endif

                                        @if($product->trendy)
                                            <span class="badge badge-light-dark">Trendy</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--end::Features-->
                        </div>
                        <!--end::Sidebar-->

                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid ms-lg-15">
                            <!--begin::General info-->
                            <div class="card mb-6 mb-xl-9">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>General Information</h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Product Name</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">{{ $product->product_name }}</span>
                                        </div>
                                    </div>

                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Product Code</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">{{ $product->product_code }}</span>
                                        </div>
                                    </div>

                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Category</label>
                                        <div class="col-lg-8">
                                            <span
                                                class="fw-bold fs-6 text-gray-800">{{ $product->category->category_name ?? 'N/A' }}</span>
                                        </div>
                                    </div>

                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Sub Category</label>
                                        <div class="col-lg-8">
                                            <span
                                                class="fw-bold fs-6 text-gray-800">{{ $product->subCategory->sub_category_name ?? 'N/A' }}</span>
                                        </div>
                                    </div>

                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Brand</label>
                                        <div class="col-lg-8">
                                            <span
                                                class="fw-bold fs-6 text-gray-800">{{ $product->brand->brand_name ?? 'N/A' }}</span>
                                        </div>
                                    </div>

                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Quantity</label>
                                        <div class="col-lg-8">
                                            <span
                                                class="fw-bold fs-6 text-gray-800">{{ $product->product_quantity }}</span>
                                        </div>
                                    </div>

                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Colors</label>
                                        <div class="col-lg-8">
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach(explode(',', $product->product_color) as $color)
                                                    @php
                                                        $trimmedColor = trim($color);
                                                        // Convert color names to hex codes for better consistency
                                                        $colorMap = [
                                                            'red' => '#ff0000',
                                                            'blue' => '#0000ff',
                                                            'green' => '#008000',
                                                            'black' => '#000000',
                                                            'white' => '#ffffff',
                                                            'gray' => '#808080',
                                                            'grey' => '#808080',
                                                            'yellow' => '#ffff00',
                                                            'pink' => '#ffc0cb',
                                                            'purple' => '#800080',
                                                            'orange' => '#ffa500',
                                                            'brown' => '#a52a2a',
                                                            'cyan' => '#00ffff',
                                                            'magenta' => '#ff00ff',
                                                            'silver' => '#c0c0c0',
                                                            'gold' => '#ffd700',
                                                            'maroon' => '#800000',
                                                            'navy' => '#000080',
                                                            'teal' => '#008080',
                                                            'olive' => '#808000',
                                                            'lime' => '#00ff00'
                                                        ];

                                                        // Check if color is a named color
                                                        $lowerColor = strtolower($trimmedColor);
                                                        $hexColor = $colorMap[$lowerColor] ?? $trimmedColor;

                                                        // Determine text color based on brightness
                                                        $r = hexdec(substr($hexColor, 1, 2));
                                                        $g = hexdec(substr($hexColor, 3, 2));
                                                        $b = hexdec(substr($hexColor, 5, 2));
                                                        $brightness = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;
                                                        $textColor = $brightness > 128 ? 'text-dark' : 'text-white';

                                                        // Ensure valid hex color format
                                                        if (!preg_match('/^#[a-f0-9]{6}$/i', $hexColor)) {
                                                            $hexColor = '#cccccc'; // fallback to light gray if invalid
                                                        }
                                                    @endphp
                                                    <span class="badge {{ $textColor }} border border-secondary"
                                                          style="background-color: {{ $hexColor }}; min-width: 70px; text-transform: capitalize;">
                                                        {{ $trimmedColor }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Sizes</label>
                                        <div class="col-lg-8">
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach(explode(',', $product->product_size) as $size)
                                                    <span class="badge badge-light">{{ trim($size) }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Description</label>
                                        <div class="col-lg-8">
                                            <div class="fw-bold fs-6 text-gray-800">
                                                @if($product->product_details)
                                                    {!! $product->product_details !!}
                                                @else
                                                    <span class="text-muted">No description available</span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--end::General info-->

                            <!--begin::Pricing-->
                            <div class="card mb-6 mb-xl-9">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Pricing</h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Selling Price</label>
                                        <div class="col-lg-8">
                                            <span
                                                class="fw-bold fs-6 text-gray-800">${{ number_format($product->selling_price, 2) }}</span>
                                        </div>
                                    </div>

                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Discount Price</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">
                                                @if($product->discount_price)
                                                    ${{ number_format($product->discount_price, 2) }}
                                                @else
                                                    <span class="text-muted">No discount</span>
                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                    @if($product->discount_price)
                                        <div class="row">
                                            <label class="col-lg-4 fw-semibold text-muted">You Save</label>
                                            <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-danger">
                                                ${{ number_format($product->selling_price - $product->discount_price, 2) }}
                                                ({{ number_format((($product->selling_price - $product->discount_price) / $product->selling_price) * 100, 2) }}%)
                                            </span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!--end::Pricing-->

                            <!--begin::Video-->

                            @if($product->video_link)
                                <div class="card mb-5">
                                    <div class="card-header bg-light">
                                        <h3 class="card-title mb-0">Product Video</h3>
                                    </div>
                                    <div class="card-body p-0">
                                        @php
                                            $videoUrl = trim($product->video_link);
                                            $embedUrl = null;
                                            $provider = null;

                                            // YouTube URL Patterns (simplified and fixed)
                                            if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/|youtube\.com\/shorts\/)([^"&?\/\s]{11})/i', $videoUrl, $matches)) {
                                                $embedUrl = "https://www.youtube.com/embed/{$matches[1]}?rel=0&showinfo=0";
                                                $provider = 'youtube';
                                            }
                                            // Vimeo Pattern
                                            elseif (preg_match('/vimeo\.com\/(\d+)/i', $videoUrl, $matches)) {
                                                $embedUrl = "https://player.vimeo.com/video/{$matches[1]}?title=0&byline=0";
                                                $provider = 'vimeo';
                                            }
                                            // Direct Video Files
                                            elseif (preg_match('/\.(mp4|webm|ogg|mov)$/i', $videoUrl)) {
                                                $provider = 'html5';
                                            }
                                        @endphp

                                        @if($provider === 'youtube' || $provider === 'vimeo')
                                            <div class="ratio ratio-16x9 bg-dark">
                                                <iframe src="{{ $embedUrl }}"
                                                        title="Product Video"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        frameborder="0"
                                                        loading="lazy"
                                                        class="rounded-bottom"></iframe>
                                            </div>
                                        @elseif($provider === 'html5')
                                            <div class="ratio ratio-16x9 bg-dark">
                                                <video controls class="w-100 rounded-bottom">
                                                    <source src="{{ $videoUrl }}"
                                                            type="video/{{ pathinfo($videoUrl, PATHINFO_EXTENSION) }}">
                                                    Your browser does not support HTML5 video.
                                                </video>
                                            </div>
                                        @else
                                            <div class="p-4 text-center">
                                                <div class="alert alert-warning mb-3">
                                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                                    <strong>Unsupported Video Format</strong>
                                                    <div class="small mt-1">Provided URL:
                                                        <code>{{ Str::limit($videoUrl, 50) }}</code></div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            <!--end::Video-->
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


