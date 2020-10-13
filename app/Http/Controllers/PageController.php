<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Blog;
use App\Models\Project;
use App\Models\Template;
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
        $model = new Page();
        $blog = Blog::where('status', 1)->orderBy('created_at', 'desc')->take(4)->get();
        $project = Project::where('status', 1)->orderBy('created_at', 'desc')->take(4)->get();
        $template = Template::where('status', 1)->orderBy('created_at', 'desc')->take(4)->get();
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
        $model = Blog::where('title', 'like', '%' . $search . '%')->get();
        return view('frontend.pages.search', compact('model', 'search'));
    }
    
    public function tag($tag)
    {
        $model = Blog::where('tag', 'like', '%' . $tag . '%')->get();
        return view('frontend.pages.tag', compact('model', 'tag'));
    }
}
