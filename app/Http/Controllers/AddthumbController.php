<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Post;


class AddthumbController extends Controller
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
     * Show add thumbnail page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('addthumb');
    }

        /**
     *ファイルアップロード処理
     *
     * @return void
     */
    public function thumbUpdate(Request $request){
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
        $user = Auth::user();

        $path = $request->file->store('public');
        $filename = basename($path);

        $user->filename = $filename;
        $user->save();

        return redirect('home');
    }    
}
