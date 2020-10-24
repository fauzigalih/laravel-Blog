<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
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
        User::validateLogin($request);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->has('remember'))) {
            // Authentication passed...
            return redirect()->intended('admin');
        }

        return redirect('admin/login')->with('danger', 'email and password does not match or not registered.');
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
        return redirect('admin/login')->with('success', 'Your account has been successfully registered, please login to enter the system');
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
            if ($model->photo != 'user.png') {
                if (file_exists(public_path('img/profile/'.$model->photo))) unlink(public_path('img/profile/'.$model->photo));
            }
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

        $update = User::where('id', $model->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
            'medsos' => $medsos,
            'photo' => $fileName
        ]);

        if ($update) {
            
            return redirect('admin/profile')->with('success', 'Profile has been updated successfully');
        }else{
            return redirect('admin/profile')->with('success', 'Profile failed to update');
        }
        
    }

    public function passwordUpdate(Request $request, User $user)
    {
        $model = User::findOrFail($user->id);
        $validator = User::validatePassword($request);
        $validator->after(function ($validator) use ($request, $model){
            if (!Hash::check($request->old, $model->password)) {
                // The passwords not match...
                $validator->errors()->add('old', 'The old password does not match your current password.');
            }
        })->validate();

        $update = User::where('id', $model->id)->update(['password' => Hash::make($request->password)]);
        if ($update) {
            Auth::logout();
            return redirect('admin/login')->with('success', 'Your password has been updated, please log back in with the new password');
        }
            
        return redirect('admin/profile')->with('danger', 'Password failed to update');
    }

    public function destroy(User $user)
    {
        $model = User::findOrFail($user->id);
        if ($model->photo != 'user.png') {
            if (file_exists(public_path('img/profile/'.$model->photo))) unlink(public_path('img/profile/'.$model->photo));
        }
        Post::where('uploader', $model->id)->delete();
        User::destroy($model->id);
        return redirect('admin/login')->with('danger', 'Your account has been permanently deleted');
    }
}