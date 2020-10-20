@extends('layouts.public')
@section('title', 'Register')
@section('content')
    <main class="static">
        <form action="">
            @csrf
            <div class="form-group">
                <label for="name"></label>
                <input name="name" type="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}" autofocus required>
            </div>
            <div class="form-group">
                <label for="email"></label>
                <input name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}" autofocus required>
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input name="password" type="password" class="form-control" placeholder="Password" value="{{ old('password') }}" autofocus required>
            </div>
            <div class="form-group">
                <label for="confirm"></label>
                <input name="confirm" type="password" class="form-control" placeholder="Ulangi Password" value="{{ old('confirm') }}" autofocus required>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" value="">
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>
        </form>
    </main>
@endsection