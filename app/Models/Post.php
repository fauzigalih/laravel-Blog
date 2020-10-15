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
        'status'
    ];

    public static function validateData(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'article' => 'required',
            'category' => 'string',
            'tag' => 'required|string',
            'thumbnail' => 'required|string',
            'uploader' => 'integer',
            'url' => 'string',
            'status' =>'required|integer'
        ]);
    }
}
