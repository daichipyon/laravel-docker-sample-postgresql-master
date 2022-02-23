<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Like;


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
