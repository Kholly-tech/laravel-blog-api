<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\BlogFilter;
use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\BlogCollection;
use App\Http\Resources\V1\BlogResource;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new BlogFilter();
        $filterItems = $filter->transform($request); // [['column', 'operator', 'value']]

        if(count($filterItems) === 0) {
            return new BlogCollection(Blog::paginate());
        } else {
            $blogs = Blog::where($filterItems)->paginate();
            return new BlogCollection($blogs->appends($request->query()));
        }
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
    public function store(StoreBlogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return new BlogResource(($blog));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
