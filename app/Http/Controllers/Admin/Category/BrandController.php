<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Laravel\Facades\Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['brands'] = Brand::all();
        return view('admin.brand.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the request
        $validator = Validator::make($request->all(), [
            'brand_name' => 'required|unique:brands|max:100',
            'brand_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
                'toastr' => [
                    'type' => 'error',
                    'message' => $validator->errors()->first(),
                    'title' => 'Validation Error'
                ]
            ], 422);
        }

        try {
            DB::beginTransaction();

            // Handle file upload
            $image = $request->file('brand_logo');
            $imageName = time() . '-' . $image->getClientOriginalName();

            // Define paths
            $mainPath = public_path('uploads/images/brand/');


            // Ensure directories exist
            File::ensureDirectoryExists($mainPath, 0755);


            // Process image
            $image = Image::read($image->getRealPath());

            // Save main image
            $image->save($mainPath . $imageName);


            // Create brand
            $brand = Brand::create([
                'brand_name' => $request->brand_name,
                'brand_logo' => $imageName,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'toastr' => [
                    'type' => 'success',
                    'message' => 'Brand created successfully',
                    'title' => 'Brand Success'
                ],
                'redirect' => route('admin.brands.index')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            // Delete any uploaded files if error occurred
            if (isset($imageName)) {
                @unlink($mainPath . $imageName);
                @unlink($imageName);
            }

            return response()->json([
                'success' => false,
                'toastr' => [
                    'type' => 'error',
                    'message' => 'An error occurred while creating the brand',
                    'title' => 'Brand Error'

                ],

            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        if (!$brand) {
            return response()->json([
                'success' => false,
                'message' => 'Brand not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'brand_name' => $brand->brand_name,
                'brand_logo' => $brand->brand_logo ? asset('/uploads/images/brand/' . $brand->brand_logo) : null

            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $validator = Validator::make($request->all(), [
            'brand_name' => 'required|max:100',
            'brand_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
                'toastr' => [
                    'type' => 'error',
                    'message' => $validator->errors()->first(),
                    'title' => 'Validation Error'
                ]
            ], 422);
        }

        try {
            DB::beginTransaction();

            $data = [
                'brand_name' => $request->brand_name,
            ];


            if ($request->hasFile('brand_logo')) {
                $image = $request->file('brand_logo');
                $imageName = time() . '-' . $image->getClientOriginalName();

                // Define paths
                $mainPath = public_path('uploads/images/brand/');


                // Ensure directories exist
                File::ensureDirectoryExists($mainPath, 0755);


                // Process image
                $image = Image::read($image->getRealPath());

                // Save main image
                $image->save($mainPath . $imageName);


                // Delete old images before updating
                if ($brand->brand_logo) {
                    @unlink($mainPath . $brand->brand_logo);
                    @unlink($brand->brand_logo);
                }

                $data['brand_logo'] = $imageName;
            }


            $brand->update($data);

            DB::commit();

            return response()->json([
                'success' => true,
                'toastr' => [
                    'type' => 'success',
                    'message' => 'Brand updated successfully',
                    'title' => 'Brand Success'
                ],
                'redirect' => route('admin.brands.index')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            // Delete any newly uploaded files if error occurred
            if (isset($imageName)) {
                @unlink($mainPath . $imageName);
                @unlink($imageName);
            }

            return response()->json([
                'success' => false,
                'toastr' => [
                    'type' => 'error',
                    'message' => 'An error occurred while updating the brand: ' . $e->getMessage(),
                    'title' => 'Brand Error'
                ],
            ], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.brands.index')->with('toastr', [
            'type' => 'success',
            'message' => 'Brand deleted successfully',
            'title' => 'Brand Success'
        ]);
    }
}
