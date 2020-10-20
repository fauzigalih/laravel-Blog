<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Post::where('category', 'template')->get();
        return view('frontend.post.index', compact('model'));
    }

    public function admin()
    {
        $model = Post::where('category', 'template')->get();
        return view('backend.post.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.post.create');
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
        $count = Post::where('category', 'template')->where('url', 'like', '%' . $url . '%')->count();
        $thumbnail = explode('/', $request->thumbnail)[array_key_last(explode('/', $request->thumbnail))];
        Post::create([
            'title' => $request->title,
            'article' => $request->article,
            'category' => $request->category,
            'tag' => $request->tag,
            'thumbnail' => $thumbnail,
            'uploader' => 1,
            'url' => $count === 0 ? $url : $url.$count,
            'status' => $request->status
        ]);
        return redirect('admin/template')->with('success', 'Tag Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $model = Post::findOrFail($post->id);
        return view('backend.post.view', compact('model'));
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
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $model = Post::findOrFail($post->id);
        return view('backend.post.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        Post::validateData($request);
        $model = Post::findOrFail($post->id);
        $thumbnail = explode('/', $request->thumbnail)[array_key_last(explode('/', $request->thumbnail))];
        Post::updateOrCreate(['id' => $model->id], [
            'title' => $request->title,
            'article' => $request->article,
            'tag' => $request->tag,
            'thumbnail' => $thumbnail,
            'status' => $request->status
        ]);
        return redirect('admin/template')->with('warning', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('admin/template')->with('danger', 'Data Berhasil Dihapus!');
    }
}
