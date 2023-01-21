<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;



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

/**
 * Front
 */
# リダイレクト設定
Route::get('/', function () {
    return redirect('home');
});

# ログイン周り
Auth::routes();

# ホーム
Route::get('home', [HomeController::class, 'index'])->name('home');

# 投稿詳細ページ
Route::resource('posts', PostController::class)->only('show');

# ライブラリ
Route::resource('likes', LikeController::class)->only('index', 'destroy');

# 検索
Route::resource('search', SearchController::class)->only('index');


/**
 * Admin
 */
Route::middleware(['auth', 'can:isAdmin'])->group(function () {

    # 投稿一覧
    Route::resource('posts', PostController::class)->except('show');

    # カテゴリー一覧
    Route::resource('categories', CategoryController::class)->except('show');

});

/**
 * Api
 */
# ajax無限スクロール機能
Route::post('ajaxaddpost', [HomeController::class, 'ajaxaddpost'])->name('ajaxaddpost');

# ajax非同期いいね機能
Route::post('ajaxfavorite', [LikeController::class, 'ajaxfavorite'])->name('ajaxfavorite');

# ajax無限スクロール機能
Route::post('likeAjaxAddPost', [LikeController::class, 'likeAjaxAddPost'])->name('like.ajax.add.post');

# ajax無限スクロール機能
Route::post('searchAjaxAddPost', [SearchController::class, 'searchAjaxAddPost'])->name('searchAjaxAddPost');
