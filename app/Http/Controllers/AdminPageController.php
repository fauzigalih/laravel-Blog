<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;

class AdminPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Post::where('category', 'blog');
        $project = Post::where('category', 'project');
        $template = Post::where('category', 'template');
        return view('backend.pages.index', compact('blog', 'project', 'template'));
    }

    public function about()
    {
        $model = Page::findOrFail(1);
        return view('backend.pages.about', compact('model'));
    }
    
    public function contact()
    {
        $model = Page::findOrFail(1);
        return view('backend.pages.contact', compact('model'));
    }
    
    public function termsofservice()
    {
        $model = Page::findOrFail(1);
        return view('backend.pages.termsofservice', compact('model'));
    }
    
    public function privacypolicy()
    {
        $model = Page::findOrFail(1);
        return view('backend.pages.privacypolicy', compact('model'));
    }
}
