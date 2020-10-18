<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new Image();
        return view('backend.image.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Image::validateData($request);

        $fileName = 'img'.date('dmYHis').'.'.$request->image_url->extension();
        $request->image_url->move(public_path('img/post'), $fileName);
        Image::create(array_merge($request->all(), ['image_url' => $fileName]));
        return redirect('admin/image')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        $model = Image::findOrFail($image->id);
        return view('backend.image.view', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        $model = Image::findOrFail($image->id);
        return view('backend.image.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        Image::validateData($request);

        $model = Image::findOrFail($image->id);

        if ($request->image_url == null || $request->image_url == '') {
            $fileName = $model->image_url;
        }else{
            if (file_exists(public_path('img/post/'.$model->image_url))) unlink(public_path('img/post/'.$model->image_url));
            $fileName = $model->image_url;
            $request->image_url->move(public_path('img/post'), $fileName);
        }

        Image::updateOrCreate(['id' => $model->id], array_merge($request->all(), ['image_url' => $fileName]));
        return redirect('admin/image')->with('warning', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        unlink(public_path('img/post/'.$image->image_url));
        Image::destroy($image->id);
        return redirect('admin/image')->with('danger', 'Data Berhasil Dihapus!');
    }
}
