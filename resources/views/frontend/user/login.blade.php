@extends('layouts.public')
@section('title', 'Login')
@section('content')
<main class="auth">
    <h1>Login</h1>
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('admin/login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}" autofocus required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" placeholder="Password" value="{{ old('password') }}" required>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>
            </div>
            <p>Tidak punya akun? <a href="{{ url('admin/register') }}">Daftar!</a></p>
            <button class="btn btn-primary" type="submit">Login</button>
        </form>
    </main>
@endsection