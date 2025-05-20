<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['categories'] = Category::all();
        return view('admin.category.index', $data);
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
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|unique:categories|max:255',
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

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();

        return response()->json([
            'success' => true,
            'toastr' => [
                'type' => 'success',
                'message' => 'Category created successfully',
                'title' => 'Category Success'
            ],
            'redirect' => route('admin.categories.index')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Category $category)
    {
        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'category_name' => $category->category_name
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|max:255',
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

        $category->category_name = $request->category_name;
        $category->save();

        return response()->json([
            'success' => true,
            'toastr' => [
                'type' => 'success',
                'message' => 'Category updated successfully',
                'title' => 'Category Success'
            ],
            'redirect' => route('admin.categories.index')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('toastr', [
            'type' => 'success',
            'message' => 'Category deleted successfully',
            'title' => 'Category Success'
        ]);
    }

}
