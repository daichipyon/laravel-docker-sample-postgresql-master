<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Post;

class UserController extends Controller
{
    public function index($user_id){
        $user = User::find($user_id);
        $posts = $user->posts;
        return view('profile',['user' => $user,'posts'=>$posts]);
    }

}