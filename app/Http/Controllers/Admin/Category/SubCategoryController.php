<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use App\Http\Requests\SubCategoryRequest;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['categories'] = Category::select('id', 'category_name')->get();
//        $data['subcategories'] = SubCategory::with('category')
//            ->select('id', 'sub_category_name', 'category_id')
//            ->latest()
//            ->get();
        $data['subcategories'] = SubCategory::all()->withRelationshipAutoloading();

        return view('admin.subcategory.index', $data);
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
    public function store(SubCategoryRequest $request)
    {
        try {
            $validated = $request->validated();

            SubCategory::create([
                'category_id' => $validated['category_id'],
                'sub_category_name' => $validated['sub_category_name']
            ]);

            return response()->json([
                'success' => true,
                'toastr' => [
                    'type' => 'success',
                    'message' => 'Sub Category created successfully',
                    'title' => 'Success'
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'toastr' => [
                    'type' => 'error',
                    'message' => 'Failed to create sub category',
                    'title' => 'Error'
                ]
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subcategory)
    {
        // $subCategory = SubCategory::find($id);

        if (!$subcategory) {
            return response()->json([
                'success' => false,
                'message' => 'Sub Category not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'sub_category_name' => $subcategory->sub_category_name,
                'category_id' => $subcategory->category_id,

            ]
        ]);

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(SubCategoryRequest $request, SubCategory $subcategory)
    {
        try {
            $validated = $request->validated();

            $subcategory->update([
                'category_id' => $validated['category_id'],
                'sub_category_name' => $validated['sub_category_name']
            ]);

            return response()->json([
                'success' => true,
                'toastr' => [
                    'type' => 'success',
                    'message' => 'Sub Category updated successfully',
                    'title' => 'Success'
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'toastr' => [
                    'type' => 'error',
                    'message' => 'Failed to update sub category',
                    'title' => 'Error'
                ]
            ], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('admin.subcategories.index')->with('toastr', [
            'type' => 'success',
            'message' => 'Sub Category deleted successfully',
            'title' => 'Sub Category Success'
        ]);
    }
}
