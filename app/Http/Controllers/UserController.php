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

        return redirect('admin/login');
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
            'password' => Hash::make($request->password),
            'photo' => 'user.png'
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
        return view('backend.user.profile');
    }

    public function profileUpdate(Request $request, User $user)
    {
        $model = User::findOrFail($user->id);
        User::validateProfile($request);
        if ($request->photo == null) {
            $fileName = $model->photo;
        }else{
            $fileName = 'img'.date('dmYHis').'.'.$request->photo->extension();
            $request->photo->move(public_path('img/profile'), $fileName);
        }

        $medsos = json_encode([
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'github' => $request->github
        ]);

        User::where('id', $model->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
            'medsos' => $medsos,
            'photo' => $fileName
        ]);
        
        return redirect('admin/profile')->with('succes', 'Data berhasil diupdate');
    }

    public function passwordUpdate(Request $request, User $user)
    {
        $model = User::findOrFail($user->id);
    }
}