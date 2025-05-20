<?php

namespace App\Http\Controllers\Admin;

use \Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['products'] = Product::with('category', 'brand')->orderBy('id', 'desc')->get();
//        return response()->json($data);
        return view('admin.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.product.create', [
            'product' => new Product(),
            'categories' => Category::select('id', 'category_name')
                ->orderBy('category_name')
                ->get(),
            'brands' => Brand::select('id', 'brand_name')->orderBy('brand_name')->get(),
//            'subcategories' => collect()
            'subcategories' => SubCategory::select('id', 'sub_category_name')->orderBy('sub_category_name')->get(),
        ]);
    }

    public function getSubcategories($category_id)
    {
        $subcategories = SubCategory::where('category_id', $category_id)->get();
        return response()->json($subcategories);
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(ProductRequest $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $mainPath = public_path('uploads/images/product/');

            if (!file_exists($mainPath)) {
                mkdir($mainPath, 0777, true);
            }

            $imagePaths = [];
            $imageFields = ['image_one', 'image_two', 'image_three'];

            foreach ($imageFields as $imageField) {
                if ($request->hasFile($imageField)) {
                    $image = $request->file($imageField);
                    $filename = Str::slug($validated['product_name']) . '-' . time() . '-' . Str::random(5) . '.' . $image->getClientOriginalExtension();

                    try {
                        Image::read($image->getRealPath())
                            ->resize(300, 300, function ($constraint) {
                                $constraint->aspectRatio();
                                $constraint->upsize();
                            })
                            ->save($mainPath . $filename);

                        $imagePaths[$imageField] = 'uploads/images/product/' . $filename;
                    } catch (\Exception $e) {
                        throw new \Exception("Failed to process {$imageField}: " . $e->getMessage());
                    }
                }
            }

            $productData = [
                'category_id' => $validated['category_id'],
                'sub_category_id' => $validated['sub_category_id'],
                'brand_id' => $validated['brand_id'] ?? null,
                'product_name' => $validated['product_name'],
                'product_code' => $validated['product_code'],
                'product_quantity' => $validated['product_quantity'],
                'product_details' => $validated['product_details'] ?? '',
                'product_color' => $this->processTagifyInput($validated['product_color']),
                'product_size' => $this->processTagifyInput($validated['product_size']),
                'selling_price' => $validated['selling_price'],
                'discount_price' => $validated['discount_price'] ?? null,
                'video_link' => $validated['video_link'] ?? null,
                'status' => $validated['status'] ?? 0,
                'main_slider' => $validated['main_slider'] ?? 0,
                'hot_deal' => $validated['hot_deal'] ?? 0,
                'best_rated' => $validated['best_rated'] ?? 0,
                'mid_slider' => $validated['mid_slider'] ?? 0,
                'hot_new' => $validated['hot_new'] ?? 0,
                'trendy' => $validated['trendy'] ?? 0,
            ];

            foreach ($imageFields as $field) {
                $productData[$field] = $imagePaths[$field] ?? null;
            }

            Product::create($productData);
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Product created successfully',
                'redirect' => route('admin.products.index'),
                'toastr' => [
                    'type' => 'success',
                    'title' => 'Success',
                    'message' => 'Product added successfully'
                ]
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            foreach ($imagePaths ?? [] as $path) {
                if (file_exists(public_path($path))) {
                    @unlink(public_path($path));
                }
            }

            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
                'toastr' => [
                    'type' => 'error',
                    'title' => 'Error',
                    'message' => 'Failed to create product: ' . $e->getMessage()
                ]
            ], 500);
        }
    }

    protected function processTagifyInput($input)
    {
        if (empty($input)) return '';

        $decoded = json_decode($input, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $input;
        }

        if (is_array($decoded)) {
            return implode(', ', array_map(function ($item) {
                return $item['value'] ?? $item;
            }, $decoded));
        }

        return $input;
    }


    public function toggleStatus(Product $product)
    {
        $newStatus = $product->status == 1 ? 0 : 1;
        $product->update(['status' => $newStatus]);

        return redirect()->back()->with([
            'toastr' => [
                'type' => 'success',
                'title' => 'Success',
                'message' => $newStatus ? 'Product activated successfully' : 'Product deactivated successfully'
            ]
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.create', [
            'product' => $product,
            'categories' => Category::select('id', 'category_name')->orderBy('category_name')->get(),
            'brands' => Brand::select('id', 'brand_name')->orderBy('brand_name')->get(),
            'subcategories' => SubCategory::where('category_id', $product->category_id)
                ->select('id', 'sub_category_name')
                ->get()
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
