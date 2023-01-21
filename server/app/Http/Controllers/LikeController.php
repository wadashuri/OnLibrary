<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;

class LikeController extends Controller
{

    //未ログイン時はログインさせない
    public function __construct()
    {
        
    }

    //投稿追加機能
    public function likeAjaxAddPost(Request $request)
    {
        $offset = isset($_POST['post_num_now']) ? $_POST['post_num_now'] : 1;
        $posts_per_page = isset($_POST['post_num_add']) ? $_POST['post_num_add'] : 0;
        $auth_id=Auth::id();
        $likes = User::find($auth_id)->likes()->withPivot('created_at AS joined_at')->offset($offset)->limit($posts_per_page)->orderBy('joined_at', 'desc')->take(6)->get();
        return view('likeAjaxAddPost', ['likes' =>  $likes,]);
    }

    //いいねしている投稿の一覧ページ
    public function index()
    {
        // $likes = Auth::user()->likes->withPivot('created_at')->orderBy('created_at', 'desc')->take(6)->get();
        $auth_id=Auth::id();
        $likes = User::find($auth_id)->likes()->withPivot('created_at AS joined_at')->orderBy('joined_at', 'desc')->take(6)->get();
        return view('likes.index', [
            'title' => 'ライブラリ',
            'likes' => $likes,
        ]);
    }

    //いいね機能
    public function ajaxfavorite(Request $request)
    {
        $user_id = Auth::user()->id;
        $post_id = $request->post_id;
        $already_liked = Like::where('user_id', $user_id)->where('post_id', $post_id)->first();
        if (!$already_liked) {
            Like::create([
                'user_id' => $user_id,
                'post_id' => $post_id,
            ]);
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            Like::where('post_id', $post_id)->where('user_id', $user_id)->delete();
        }
    }

    public function destroy(Request $request)
    {
        Auth::user()->likes->find($request->like)->delete();
        session()->flash('success', '投稿を削除しました');
        return redirect()->route('likes.index');
    }
}
