<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'article',
        'category',
        'tag',
        'thumbnail',
        'uploader',
        'url',
        'status',
        'view'
    ];

    public static function validateData(Request $request)
    {
        return $request->validate([
            'title' => 'required|string',
            'article' => 'required',
            'category' => 'string',
            'tag' => 'required|string',
            'thumbnail' => 'required|string',
            'uploader' => 'integer',
            'url' => 'string',
            'status' =>'required|integer',
            'view' => 'integer'
        ]);
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'uploader');
    }

    public static function isUser($category)
    {
        $model = self::where('category', $category)->orderBy('created_at', 'desc')->get();
        return view('frontend.post.index', compact('model'));
    }

    public static function isAdmin($category)
    {
        $model =  self::where('category', 'blog')->where('uploader', Auth::user()->id)->get();
        return view('backend.post.index', compact('model'));
    }

    public static function storeModel($request, $category)
    {
        self::validateData($request);
        $url = strtolower(str_replace(' ', '-', $request->title));
        $count = self::where('category', $category)->where('url', 'like', '%' . $url . '%')->count();
        $thumbnail = explode('/', $request->thumbnail)[array_key_last(explode('/', $request->thumbnail))];
        $create = self::create([
            'title' => $request->title,
            'article' => $request->article,
            'category' => $request->category,
            'tag' => $request->tag,
            'thumbnail' => $thumbnail,
            'uploader' => Auth::user()->id,
            'url' => $count === 0 ? $url : $url.'-'.Auth::user()->id.date('dmy'),
            'status' => $request->status,
            'view' => 0
        ]);
        if ($create) {
            return redirect('admin/'.$category)->with('success', ucwords($category).' was created successfully');
        }
        return redirect('admin/'.$category)->with('success', ucwords($category).' failed to create');
    }

    public static function updateModel($request, $post, $category)
    {
        self::validateData($request);
        $model = self::findOrFail($post->id);
        $thumbnail = explode('/', $request->thumbnail)[array_key_last(explode('/', $request->thumbnail))];
        $update = self::updateOrCreate(['id' => $model->id], [
            'title' => $request->title,
            'article' => $request->article,
            'tag' => $request->tag,
            'thumbnail' => $thumbnail,
            'status' => $request->status
        ]);
        if ($update) {
            return redirect('admin/'.$category)->with('success', ucwords($category).' updated successfully');
        }
        return redirect('admin/'.$category)->with('success', ucwords($category).' updated successfully');
    }

    public static function demoModel($url)
    {
        $model = self::firstWhere('url', $url);
        $blog = self::where('category', 'blog')->where('status', 1)->orderBy('created_at', 'desc')->take(5)->get();
        $project = self::where('category', 'project')->where('status', 1)->orderBy('created_at', 'desc')->take(5)->get();
        $template = self::where('category', 'template')->where('status', 1)->orderBy('created_at', 'desc')->take(5)->get();
        
        if (!Auth::check()) {
            $model->view++;
            $model->save();
        }
        
        return view('frontend.post.article', compact('model', 'blog', 'project', 'template'));
    }

    public static function createModel()
    {
        return view('backend.post.create');
    }

    public static function showModel($post)
    {
        $model = self::findOrFail($post->id);
        return view('backend.post.view', compact('model'));
    }

    public static function editModel($post)
    {
        $model = self::findOrFail($post->id);
        return view('backend.post.edit', compact('model'));
    }

    public static function destroyModel($post, $category)
    {
        $model = self::findOrFail($post->id);
        if (self::where('id', $model->id)->delete()) {
            return redirect('admin/'.$category)->with('success', ucwords($category).' deleted successfully');
        }
        return redirect('admin/'.$category)->with('danger', ucwords($category).' failed to delete');
    }
}
