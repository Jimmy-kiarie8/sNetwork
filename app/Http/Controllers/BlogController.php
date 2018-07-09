<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Auth;

class BlogController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->description = $request->description;
        $blog->user_id = Auth::id();
        $blog->save();
        /*foreach ($blog as $item) {
            $image = $item->image;
        }*/
        return $blog;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        // return $request->all();
        $blog = Blog::find($request->id);
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->description = $request->description;
        $blog->user_id = Auth::id();
        $blog->save();
        return $blog;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }

    public function blogImage(Request $request, Blog $blog, $id) {
        // return $request->all;
        $upload = Blog::find($request->id);
        if ($request->hasFile('image')) {
            $imagename = time() . $request->image->getClientOriginalName();
            $request->image->storeAs('public/blog', $imagename);
            // return response();
        }
        $image_name = '/storage/blog/' . $imagename;
        $upload->image = $image_name;
        $upload->save();
        return $upload;
    }

    public function getBlog()
    {
        return json_decode(json_encode(Blog::all()), true);
    }

    public function getImgBlog(Request $request, Blog $blog, $id)
    {
        $blogs = Blog::select('image')->where('id', $id)->get();
        foreach ($blogs as $blog) {
            $image = $blog->image;
        }
        return $image;
    }

    // public function BlogImage()
    // {
    //     return $request->all();
    // }
}
