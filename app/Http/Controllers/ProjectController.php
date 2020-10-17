<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Post::where('category', 'project')->get();
        return view('frontend.post.index', compact('model'));
    }

    public function admin()
    {
        $model = Post::where('category', 'project')->get();
        return view('backend.project.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Post::validateData($request);
        $url = strtolower(str_replace(' ', '-', $request->title));
        $count = Post::where('category', 'project')->where('url', 'like', '%' . $url . '%')->count();
        Post::create([
            'title' => $request->title,
            'article' => $request->article,
            'category' => $request->category,
            'tag' => $request->tag,
            'thumbnail' => $request->thumbnail,
            'uploader' => 1,
            'url' => $count === 0 ? $url : $url.$count,
            'status' => $request->status
        ]);
        return redirect('admin/project')->with('success', 'Tag Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $model = Post::findOrFail($post->id);
        return view('backend.project.view', compact('model'));
    }

    public function demo($url)
    {
        $model = Post::firstWhere('url', $url);
        $blog = Post::where('category', 'blog')->where('status', 1)->orderBy('created_at', 'desc')->take(5)->get();
        $project = Post::where('category', 'project')->where('status', 1)->orderBy('created_at', 'desc')->take(5)->get();
        $template = Post::where('category', 'template')->where('status', 1)->orderBy('created_at', 'desc')->take(5)->get();
        return view('frontend.post.article', compact('model', 'blog', 'project', 'template'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $model = Post::findOrFail($post->id);
        return view('backend.project.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        Post::validateData($request);
        $model = Post::findOrFail($post->id);
        Post::updateOrCreate(['id' => $model->id], [
            'title' => $request->title,
            'article' => $request->article,
            'tag' => $request->tag,
            'thumbnail' => $request->thumbnail,
            'status' => $request->status
        ]);
        return redirect('admin/project')->with('warning', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('admin/project')->with('danger', 'Data Berhasil Dihapus!');
    }
}
