<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Admin Static Pages
Route::get('admin', [AdminPageController::class, 'index'])->middleware('auth');
Route::get('admin/about', [AdminPageController::class, 'about'])->middleware('auth');
Route::get('admin/contact', [AdminPageController::class, 'contact'])->middleware('auth');
Route::get('admin/terms-of-service', [AdminPageController::class, 'termsofservice'])->middleware('auth');
Route::get('admin/privacy-policy', [AdminPageController::class, 'privacypolicy'])->middleware('auth');
Route::get('admin/profile', [AdminPageController::class, 'profile'])->middleware('auth');

// Guest Static Pages
Route::get('/', [PageController::class, 'index']);
Route::get('about', [PageController::class, 'about']);
Route::get('contact', [PageController::class, 'contact']);
Route::get('terms-of-service', [PageController::class, 'termsofservice']);
Route::get('privacy-policy', [PageController::class, 'privacypolicy']);
Route::post('search', [PageController::class, 'searchUrl']);
Route::get('search/{search}', [PageController::class, 'search']);
Route::get('tag/{tag}', [PageController::class, 'tag']);

// Blog
Route::get('blog', [BlogController::class, 'index']);
Route::get('admin/blog', [BlogController::class, 'admin']);
Route::get('admin/blog/create', [BlogController::class, 'create']);
Route::post('admin/blog', [BlogController::class, 'store']);
// Route::get('admin/blog/{blog}', [BlogController::class, 'show'])->where('blog', '[\w\d\-\_]+');  =>optional
Route::get('admin/blog/{post}', [BlogController::class, 'show']);
Route::get('blog/{url}', [BlogController::class, 'demo']);
Route::get('admin/blog/edit/{post}', [BlogController::class, 'edit']);
Route::put('admin/blog/{post}', [BlogController::class, 'update']);
Route::delete('admin/blog/{post}', [BlogController::class, 'destroy']);

// Project
Route::get('project', [ProjectController::class, 'index']);
Route::get('admin/project', [ProjectController::class, 'admin']);
Route::get('admin/project/create', [ProjectController::class, 'create']);
Route::post('admin/project', [ProjectController::class, 'store']);
Route::get('admin/project/{post}', [ProjectController::class, 'show']);
Route::get('project/{url}', [ProjectController::class, 'demo']);
Route::get('admin/project/edit/{post}', [ProjectController::class, 'edit']);
Route::put('admin/project/{post}', [ProjectController::class, 'update']);
Route::delete('admin/project/{post}', [ProjectController::class, 'destroy']);

// Template
Route::get('template', [TemplateController::class, 'index']);
Route::get('admin/template', [TemplateController::class, 'admin']);
Route::get('admin/template/create', [TemplateController::class, 'create']);
Route::post('admin/template', [TemplateController::class, 'store']);
Route::get('admin/template/{post}', [TemplateController::class, 'show']);
Route::get('template/{url}', [TemplateController::class, 'demo']);
Route::get('admin/template/edit/{post}', [TemplateController::class, 'edit']);
Route::put('admin/template/{post}', [TemplateController::class, 'update']);
Route::delete('admin/template/{post}', [TemplateController::class, 'destroy']);

// Image
Route::get('admin/image', [ImageController::class, 'index']);
Route::get('admin/image/create', [ImageController::class, 'create'])->name('image.create');
Route::post('admin/image', [ImageController::class, 'store'])->name('image.store');
Route::get('admin/image/{image}', [ImageController::class, 'show'])->name('image.show');
Route::get('admin/image/edit/{image}', [ImageController::class, 'edit'])->name('image.edit');
Route::put('admin/image/{image}', [ImageController::class, 'update'])->name('image.update');
Route::delete('admin/image/{image}', [ImageController::class, 'destroy']);

// User
Route::get('admin/login', [UserController::class, 'login'])->name('login');
Route::get('admin/register', [UserController::class, 'register']);
Route::post('admin/register', [UserController::class, 'store']);
Route::post('admin/login', [UserController::class, 'authenticate']);
Route::get('admin/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('admin/profile', [UserController::class, 'profile'])->middleware('auth');
Route::put('admin/profile/{user}', [UserController::class, 'profileUpdate'])->middleware('auth');
Route::put('admin/password/{user}', [UserController::class, 'passwordUpdate'])->middleware('auth');
Route::delete('admin/profile/{user}', [UserController::class, 'destroy']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');