<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
}
