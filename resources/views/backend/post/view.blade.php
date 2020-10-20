@php
    $arrRouteAction = explode('\\', Route::currentRouteAction());
    $arrRoute = explode('@', $arrRouteAction[3]);
    $controller = $arrRoute[0];
    $action = $arrRoute[1];
    $control = str_replace('controller', '', strtolower($controller));
@endphp
@extends('layouts.admin')
@section('title', 'View '.ucwords($control))
@section('content')
<main>
    <h2>View {{ ucwords($control) }}</h2>
    @include('backend.post._form')
</main>
@endsection