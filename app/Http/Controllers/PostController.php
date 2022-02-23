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
        return view('addPosts');
    }

    /**
     * 投稿
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
        $filename = basename( $request->file->store('public'));
        $comment = $request->input('comment');


        if ($request->file('file')->isValid([])) {
            $post = Post::create([
                "user_id"=>$user_id,
                "filename"=>$filename,
                "comment"=>$comment
            ]);
            return redirect('/home');
        
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }
    }

    public function postDelete($post_id){
        if(Post::find($post_id)->user_id !=Auth::id()){
            return redirect('home');
        }else{
            $post = Post::find($post_id);
            $post->delete();
            return redirect('home');

        }
    }


}
