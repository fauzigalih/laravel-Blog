<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Project;
use App\Models\Template;
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
        $model = new Blog();
        return view('frontend.blog.index', compact('model'));
    }

    public function admin()
    {
        $model = new Blog();
        return view('backend.blog.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Blog();
        return view('backend.blog.create', compact('model'));
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
    public function show(Blog $blog)
    {
        $model = Blog::findOrFail($blog->id);
        return view('backend.blog.view', compact('model'));
    }

    public function demo($url)
    {
        $model = Blog::firstWhere('url', $url);
        $blog = Blog::where('status', 1)->orderBy('created_at', 'desc')->take(5)->get();
        $project = Project::where('status', 1)->orderBy('created_at', 'desc')->take(5)->get();
        $template = Template::where('status', 1)->orderBy('created_at', 'desc')->take(5)->get();
        return view('frontend.blog.article', compact('model', 'blog', 'project', 'template'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $model = Blog::findOrFail($blog->id);
        return view('backend.blog.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        Blog::destroy($blog->id);
        return redirect('admin/blog')->with('danger', 'Data Berhasil Dihapus!');
    }
}
