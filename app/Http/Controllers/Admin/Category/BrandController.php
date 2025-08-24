<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Laravel\Facades\Image;

class BrandController extends Controller
{
    use JsonResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['brands'] = Brand::select('id','brand_name','brand_logo')->get();
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
            return $this->validationErrorResponse($validator);
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
            Brand::create([
                'brand_name' => $request->brand_name,
                'brand_logo' => $imageName,
            ]);

            DB::commit();
            return $this->successResponse(
                'Brand created successfully',
                'Brand Success',
                'admin.brands.index'
            );

        } catch (\Exception $e) {
            DB::rollBack();

            // Delete any uploaded files if error occurred
            if (isset($imageName)) {
                @unlink($mainPath . $imageName);
                @unlink($imageName);
            }

            return $this->errorMessageResponse(
                'An error occurred while creating the brand',
                'Brand Error'
            );
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
        return $this->dataResponse([
            'brand_name' => $brand->brand_name,
            'brand_logo' => $brand->brand_logo
                ? asset('/uploads/images/brand/' . $brand->brand_logo)
                : null,
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
            return $this->validationErrorResponse($validator);
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

            return $this->successResponse(
                'Brand update successfully',
                'Brand Success',
                'admin.brands.index'
            );

        } catch (\Exception $e) {
            DB::rollBack();

            // Delete any newly uploaded files if error occurred
            if (isset($imageName)) {
                @unlink($mainPath . $imageName);
                @unlink($imageName);
            }

            return $this->errorMessageResponse(
                'An error occurred while updating the brand',
                'Brand Error'
            );

        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        try {
            DB::beginTransaction();

            // Delete the logo file if it exists
            if ($brand->brand_logo) {
                $logoPath = public_path('uploads/images/brand/') . $brand->brand_logo;

                // Check if file exists and is not the default placeholder
                if (file_exists($logoPath) && !str_contains($brand->brand_logo, 'blank-image.svg')) {
                    unlink($logoPath);
                }
            }
            // Delete the brand record
            $brand->delete();
            DB::commit();
            return $this->redirectSuccess('admin.brands.index', 'Brand deleted successfully', 'Brand Success');

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->redirectError('admin.brands.index', 'Failed to delete brand', 'Brand Error');

        }
    }
}
