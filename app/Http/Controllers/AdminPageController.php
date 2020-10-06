<?php

namespace App\Http\Controllers;

use App\Models\Page;

class AdminPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new Page();
        return view('backend.pages.index', compact('model'));
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
