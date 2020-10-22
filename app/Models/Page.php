<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'about',
        'contact',
        'termsofservice',
        'privacypolicy'
    ];

    public static function validateData(Request $request)
    {
        return $request->validate([
            'about' => 'string',
            'contact' => 'string',
            'termsofservice' => 'string',
            'privacypolicy' => 'string'
        ]);
    }

    public static function greatings($hour)
    {
        if ($hour < 11 && $hour >= 3) {
            $greating = 'Good Morning';
        }else if ($hour < 15) {
            $greating = 'Good Noon';
        }else if ($hour < 18) {
            $greating = 'Good Afternoon';
        }else if ($hour < 22) {
            $greating = 'Good Evening';
        }else{
            $greating = 'Good Night';
        }

        return $greating;
    }
}
