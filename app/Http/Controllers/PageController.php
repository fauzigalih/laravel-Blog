<?php

namespace App\Http\Controllers;

use App\Models\Page;

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
        return view('frontend.pages.index', compact('model'));
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
}
