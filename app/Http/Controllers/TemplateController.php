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
        return Post::isUser('template');
    }

    public function admin()
    {
        return Post::isAdmin('template');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Post::createModel();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Post::storeModel($request, 'template');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return Post::showModel($post);
    }

    public function demo($url)
    {
        return Post::demoModel($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return Post::editModel($post);
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
        return Post::updateModel($request, $post, 'template');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        return Post::destroyModel($post, 'template');
    }
}
