<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Post::where('category', 'blog')->where('status', 1)->orderBy('created_at', 'desc')->take(4)->get();
        $project = Post::where('category', 'project')->where('status', 1)->orderBy('created_at', 'desc')->take(4)->get();
        $template = Post::where('category', 'template')->where('status', 1)->orderBy('created_at', 'desc')->take(4)->get();
        return view('frontend.pages.index', compact('blog', 'project', 'template'));
    }

    public function about()
    {
        $model = Page::findOrFail(1);
        return view('frontend.pages.about', compact('model'));
    }
    
    public function contact()
    {
        $model = Page::findOrFail(1);
        return view('frontend.pages.contact', compact('model'));
    }
    
    public function termsofservice()
    {
        $model = Page::findOrFail(1);
        return view('frontend.pages.termsofservice', compact('model'));
    }
    
    public function privacypolicy()
    {
        $model = Page::findOrFail(1);
        return view('frontend.pages.privacypolicy', compact('model'));
    }

    public function searchUrl(Request $request)
    {
        return redirect('search/'.$request->search);
    }
    
    public function search($search)
    {
        $model = Post::where('title', 'like', '%' . $search . '%')->get();
        $blog = Post::where('category', 'blog')->where('status', 1)->orderBy('created_at', 'desc')->take(5)->get();
        $project = Post::where('category', 'project')->where('status', 1)->orderBy('created_at', 'desc')->take(5)->get();
        $template = Post::where('category', 'template')->where('status', 1)->orderBy('created_at', 'desc')->take(5)->get();
        return view('frontend.pages.search', compact('model', 'search', 'blog', 'project', 'template'));
    }
    
    public function tag($tag)
    {
        $tag = ucwords(str_replace('-', ' ', $tag));

        $model = Post::where('tag', 'like', '%' . $tag . '%')->get();
        $blog = Post::where('category', 'blog')->where('status', 1)->orderBy('created_at', 'desc')->take(5)->get();
        $project = Post::where('category', 'project')->where('status', 1)->orderBy('created_at', 'desc')->take(5)->get();
        $template = Post::where('category', 'template')->where('status', 1)->orderBy('created_at', 'desc')->take(5)->get();
        return view('frontend.pages.tag', compact('model', 'tag', 'blog', 'project', 'template'));
    }
}
