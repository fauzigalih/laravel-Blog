<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_url',
        'reference'
    ];

    public static function validateData(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image_url' => 'required',
            'reference' => 'string'
        ]);
    }
}
