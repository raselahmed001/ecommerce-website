<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PostCategory;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostCategoryController extends Controller
{
    use JsonResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['blogs'] = PostCategory::select('id', 'category_name_en', 'category_name_bn')->get();
        return view('admin.blogCategory.index',$data );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name_en' => 'required',
            'category_name_bn' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator);
        }

        $blog = new PostCategory();
        $blog->category_name_en = $request->category_name_en;
        $blog->category_name_bn = $request->category_name_bn;
        $blog->save();

        return $this->successResponse(
            'Blog Category created successfully',
            'Blog Success',
            'admin.blogs-categories.index'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PostCategory $blogs_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostCategory $blogs_category)
    {
        return $this->dataResponse([
            'category_name_en' => $blogs_category->category_name_en,
            'category_name_bn' => $blogs_category->category_name_bn,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostCategory $blogs_category)
    {
        $validator = Validator::make($request->all(), [
            'category_name_en' => 'required',
            'category_name_bn' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator);
        }

        $blogs_category->category_name_en = $request->category_name_en;
        $blogs_category->category_name_bn = $request->category_name_bn;
        $blogs_category->save();

        return $this->successResponse(
            'Blog Category updated successfully',
            'Blog Success',
            'admin.blogs-categories.index'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostCategory $blogs_category)
    {
        $blogs_category->delete();

        return $this->redirectSuccess('admin.blogs-categories.index', 'Blog Category deleted successfully', 'Blog Success');
    }
}
