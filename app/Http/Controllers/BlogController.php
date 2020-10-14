<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Post::where('category', 'blog')->get();
        return view('frontend.blog.index', compact('model'));
    }

    public function admin()
    {
        $model = Post::where('category', 'blog')->get();
        return view('backend.blog.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $model = Post::findOrFail($post->id);
        return view('backend.blog.view', compact('model'));
    }

    public function demo($url)
    {
        $model = Post::firstWhere('url', $url);
        $blog = Post::where('category', 'blog')->where('status', 1)->orderBy('created_at', 'desc')->take(5)->get();
        $project = Post::where('category', 'project')->where('status', 1)->orderBy('created_at', 'desc')->take(5)->get();
        $template = Post::where('category', 'template')->where('status', 1)->orderBy('created_at', 'desc')->take(5)->get();
        return view('frontend.blog.article', compact('model', 'blog', 'project', 'template'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $model = Post::findOrFail($post->id);
        return view('backend.blog.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('admin/blog')->with('danger', 'Data Berhasil Dihapus!');
    }
}
