<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    use JsonResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

//        $data['categories'] = Category::all();
        $data['categories'] = Category::select('id', 'category_name')->get();
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
            return $this->validationErrorResponse($validator);
        }

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();

        return $this->successResponse(
            'Category created successfully',
            'Category Success',
            'admin.categories.index'
        );
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
        return $this->dataResponse([
            'category_name' => $category->category_name,

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
            return $this->validationErrorResponse($validator);
        }

        $category->category_name = $request->category_name;
        $category->save();

        return $this->successResponse(
            'Category updated successfully',
            'Category Success',
            'admin.categories.index'
        );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return $this->redirectSuccess('admin.categories.index', 'Category deleted successfully', 'Category Success');
    }

}
