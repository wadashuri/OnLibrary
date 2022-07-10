<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LikeController;
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

Route::middleware(['auth','can:isAdmin'])->group(function(){
    //管理者投稿追加ページtest
Route::resource('posts', PostController::class);
});


Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

//ホーム
Route::get('home', [HomeController::class, 'index'])->name('home');

//カテゴリー別一覧
Route::resource('categories', CategoryController::class)->only('index');

//いいね一覧、削除
Route::resource('likes', LikeController::class)->only('index','destroy');

//ajax非同期いいね機能
Route::post('ajaxfavorite', [LikeController::class, 'ajaxfavorite'])->name('ajaxfavorite');