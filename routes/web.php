<?php

use App\Http\Controllers\AdminPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TemplateController;

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
Route::get('admin/termsofservice', [AdminPageController::class, 'termsofservice']);
Route::get('admin/privacypolicy', [AdminPageController::class, 'privacypolicy']);

// Guest Static Pages
Route::get('/', [PageController::class, 'index']);
Route::get('about', [PageController::class, 'about']);
Route::get('contact', [PageController::class, 'contact']);
Route::get('termsofservice', [PageController::class, 'termsofservice']);
Route::get('privacypolicy', [PageController::class, 'privacypolicy']);

// Blog
Route::get('blog', [BlogController::class, 'index']);
Route::get('admin/blog', [BlogController::class, 'admin']);
Route::get('admin/blog/create', [BlogController::class, 'create']);
Route::post('admin/blog', [BlogController::class, 'store']);
Route::get('blog/{id}', [BlogController::class, 'show']);
Route::get('admin/blog/edit/{id}', [BlogController::class, 'edit']);
Route::put('admin/blog/{id}', [BlogController::class, 'update']);
Route::delete('admin/blog/{id}', [BlogController::class, 'delete']);

// Project
Route::get('project', [ProjectController::class, 'index']);
Route::get('admin/project', [ProjectController::class, 'admin']);
Route::get('admin/project/create', [ProjectController::class, 'create']);
Route::post('admin/project', [ProjectController::class, 'store']);
Route::get('project/{id}', [ProjectController::class, 'show']);
Route::get('admin/project/edit/{id}', [ProjectController::class, 'edit']);
Route::put('admin/project/{id}', [ProjectController::class, 'update']);
Route::delete('admin/project/{id}', [ProjectController::class, 'delete']);

// Template
Route::get('template', [TemplateController::class, 'index']);
Route::get('admin/template', [TemplateController::class, 'admin']);
Route::get('admin/template/create', [TemplateController::class, 'create']);
Route::post('admin/template', [TemplateController::class, 'store']);
Route::get('template/{id}', [TemplateController::class, 'show']);
Route::get('admin/template/edit/{id}', [TemplateController::class, 'edit']);
Route::put('admin/template/{id}', [TemplateController::class, 'update']);
Route::delete('admin/template/{id}', [TemplateController::class, 'delete']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
