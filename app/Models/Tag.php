<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag'
    ];

    public static function validateData(Request $request)
    {
        $request->validate([
            'tag' => 'required|unique:tags,tag|string',
        ]);
    }
}
