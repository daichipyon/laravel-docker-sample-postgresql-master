<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Post;


class LikeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * likeしたユーザーの一覧を表示する
     */
    public function index($post_id)
    {
        $users = Post::find($post_id)->likes;
        return view('likes',['users' => $users]);
    }
    

    /**
     * likeを追加する
     */
    public function likeAdd(Request $request)
    {
        $user =Auth::user();
        $user->addLike($request->input('post_id'));
        return back();
    }

    /**
     * likeを削除する
     */
    public function likeCancel(Request $request)
    {
        $user =Auth::user();
        $user->CancelLike($request->input('post_id'));
        return back();
    }
}
