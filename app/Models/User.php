<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'description',
        'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        // 'two_factor_recovery_codes',
        // 'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'medsos' => 'array'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        // 'profile_photo_url',
    ];

    public static function validateData(Request $request)
    {
        return $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users,email|string',
            'password' => 'required|min:6|required_with:confirm|same:confirm',
            'confirm' => 'required|min:6'
        ]);
    }

    public static function validateLogin(Request $request)
    {
        return $request->validate([
            'email' => 'required|string',
            'password' => 'required|min:6'
        ]);
    }
    
    public static function validateProfile(Request $request)
    {
        return $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'description' => 'required|min:20|string',
        ]);
    }
    
    public static function validatePassword(Request $request)
    {
        return Validator::make($request->all(), [
            'old' => 'required|min:6',
            'password' => 'required|min:6|required_with:confirm|same:confirm',
            'confirm' => 'required|min:6'
        ]);
    }
}
