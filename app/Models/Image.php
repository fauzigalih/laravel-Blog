<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
        $store = Route::currentRouteName() == 'image.store';
        return $request->validate(array_merge([
            'name' => 'required|string',
        ], $store ? ['image_url' => 'required|image'] : ['image_url' => 'image']));
    }
}
