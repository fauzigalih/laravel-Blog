<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TagController;

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
Route::get('admin', [AdminPageController::class, 'index']);
Route::get('admin/about', [AdminPageController::class, 'about']);
Route::get('admin/contact', [AdminPageController::class, 'contact']);
Route::get('admin/terms-of-service', [AdminPageController::class, 'termsofservice']);
Route::get('admin/privacy-policy', [AdminPageController::class, 'privacypolicy']);
Route::get('admin/profile', [AdminPageController::class, 'profile']);
Route::get('admin/logout', [AdminPageController::class, 'logout']);

// Guest Static Pages
Route::get('/', [PageController::class, 'index']);
Route::get('about', [PageController::class, 'about']);
Route::get('contact', [PageController::class, 'contact']);
Route::get('terms-of-service', [PageController::class, 'termsofservice']);
Route::get('privacy-policy', [PageController::class, 'privacypolicy']);

// Blog
Route::get('blog', [BlogController::class, 'index']);
Route::get('admin/blog', [BlogController::class, 'admin']);
Route::get('admin/blog/create', [BlogController::class, 'create']);
Route::post('admin/blog', [BlogController::class, 'store']);
// Route::get('admin/blog/{blog}', [BlogController::class, 'show'])->where('blog', '[\w\d\-\_]+');  =>optional
Route::get('admin/blog/{blog}', [BlogController::class, 'show'])->name('blog.show');
Route::get('blog/{url}', [BlogController::class, 'demo']);
Route::get('admin/blog/edit/{blog}', [BlogController::class, 'edit'])->name('blog.edit');
Route::put('admin/blog/{blog}', [BlogController::class, 'update']);
Route::delete('admin/blog/{blog}', [BlogController::class, 'destroy']);

// Project
Route::get('project', [ProjectController::class, 'index']);
Route::get('admin/project', [ProjectController::class, 'admin']);
Route::get('admin/project/create', [ProjectController::class, 'create']);
Route::post('admin/project', [ProjectController::class, 'store']);
Route::get('project/{project}', [ProjectController::class, 'show']);
Route::get('admin/project/edit/{project}', [ProjectController::class, 'edit']);
Route::put('admin/project/{project}', [ProjectController::class, 'update']);
Route::delete('admin/project/{project}', [ProjectController::class, 'destroy']);

// Template
Route::get('template', [TemplateController::class, 'index']);
Route::get('admin/template', [TemplateController::class, 'admin']);
Route::get('admin/template/create', [TemplateController::class, 'create']);
Route::post('admin/template', [TemplateController::class, 'store']);
Route::get('template/{template}', [TemplateController::class, 'show']);
Route::get('admin/template/edit/{template}', [TemplateController::class, 'edit']);
Route::put('admin/template/{template}', [TemplateController::class, 'update']);
Route::delete('admin/template/{template}', [TemplateController::class, 'destroy']);

// Image
Route::get('admin/image', [ImageController::class, 'index']);
Route::get('admin/image/create', [ImageController::class, 'create'])->name('image.create');
Route::post('admin/image', [ImageController::class, 'store'])->name('image.store');
Route::get('admin/image/{image}', [ImageController::class, 'show'])->name('image.show');
Route::get('admin/image/edit/{image}', [ImageController::class, 'edit'])->name('image.edit');
Route::put('admin/image/{image}', [ImageController::class, 'update'])->name('image.update');
Route::delete('admin/image/{image}', [ImageController::class, 'destroy']);

// Tag
Route::get('admin/tag', [TagController::class, 'index']);
Route::get('admin/tag/create', [TagController::class, 'create'])->name('tag.create');
Route::post('admin/tag', [TagController::class, 'store'])->name('tag.store');
Route::get('admin/tag/{tag}', [TagController::class, 'show'])->name('tag.show');
Route::get('admin/tag/edit/{tag}', [TagController::class, 'edit'])->name('tag.edit');
Route::put('admin/tag/{tag}', [TagController::class, 'update'])->name('tag.edit');
Route::delete('admin/tag/{tag}', [TagController::class, 'destroy']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
