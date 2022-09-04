<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;



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

Route::middleware(['auth', 'can:isAdmin'])->group(function () {
    //投稿一覧
    Route::get('posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::patch('posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    //カテゴリー一覧
    Route::resource('categories', CategoryController::class)->only('index','create','edit','update','store','destroy');
});


Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

//ホーム
Route::get('home', [HomeController::class, 'index'])->name('home');

//ajax無限スクロール機能
Route::post('ajaxaddpost', [HomeController::class, 'ajaxaddpost'])->name('ajaxaddpost');

//投稿詳細ページ
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

//ライブラリ
Route::resource('likes', LikeController::class)->only('index', 'show', 'destroy');

//検索
Route::resource('search', SearchController::class)->only('index');

//ajax非同期いいね機能
Route::post('ajaxfavorite', [LikeController::class, 'ajaxfavorite'])->name('ajaxfavorite');
