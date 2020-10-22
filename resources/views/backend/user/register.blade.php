@extends('layouts.public')
@section('title', 'Register')
@section('content')
    <main class="auth">
        <h1>Register</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('admin/register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input name="name" type="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}" autofocus required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="confirm">Ulangi Password</label>
                <input name="confirm" type="password" class="form-control" placeholder="Ulangi Password" required>
            </div>
            <p>Sudah punya akun? <a href="{{ url('admin/login') }}">Login!</a></p>
            <button class="btn btn-primary" type="submit">Daftar</button>
        </form>
    </main>
@endsection