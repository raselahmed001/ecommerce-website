<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Post;
use App\Models\Admin\PostCategory;
use App\Traits\JsonResponseTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Laravel\Facades\Image;


class PostController extends Controller
{
    use JsonResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['categories'] = PostCategory::select('id', 'category_name_en')->get();
        $data['posts'] = Post::all();
        return view('admin.blogPosts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.blogPosts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());

        $validator = Validator::make($request->all(), [
            'post_category_id' => 'required|exists:post_categories,id',

        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator);
        }
        $post = new Post();
        $post->post_category_id = $request->input('post_category_id');
        $post->title_en = $request->input('title_en');
        $post->title_bn = $request->input('title_bn');
        $post->details_en = $request->input('details_en');
        $post->details_bn = $request->input('details_bn');

        if ($request->hasFile('image')) {

            if ($post->image && file_exists(public_path($post->image))) {
                unlink(public_path($post->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('uploads/images/blogs/');

            File::ensureDirectoryExists($uploadPath);

            $img = Image::read($image->getRealPath());
            $img->save($uploadPath . $imageName);

            $post->image = 'uploads/images/blogs/' . $imageName;
        }

        $post->save();

        return $this->successResponse(
            'Blog Post created successfully',
            'Blog Post Success',
            'admin.blogs-posts.index'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
