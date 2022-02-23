<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Post;


class PostController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function postaddPage()
    {
        return view('addpost');
    }

    /**
     * ファイルアップロード処理
     */
    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png',
            ]
        ]);
        $user_id = Auth::id();
        $path = $request->file->store('public');
        $filename = basename($path);

        $comment = $request->input('comment');
        Post::insert(['user_id' => $user_id, 'filename' => $filename,'comment'=>$comment]);

        if ($request->file('file')->isValid([])) {
            return view('home')->with([
                'filename'=> basename($path),
                'comment' => $comment,
                'user_id' => $user_id,
            ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }
    }


}
