<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        if (Auth::check()) return redirect('admin');
        return view('backend.user.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {
            // Authentication passed...
            return redirect()->intended('admin');
        }
    }

    public function register()
    {
        if (Auth::check()) return redirect('admin');
        return view('backend.user.register');
    }

    public function store(Request $request)
    {
        User::validateData($request);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect('admin');
    }

    public function logout()
    {
        if (Auth::check())
        {
            Auth::logout();
            return redirect('admin/login');
        }
        return redirect('/');
    }

    public function profile()
    {
        $model = new User();
        return view('backend.user.profile');
    }
}