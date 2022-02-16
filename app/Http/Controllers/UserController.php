<?php

namespace App\Http\Controllers;
use App\User;

class UserController extends Controller
{
    public function index(){
        $email = substr(str_shuffle('abcdefgijklmnopqrstuvwxyz'), 0, 8) . '@yyyyy.com';
        User::insert(['name' => 'yamada taro', 'email' => $email, 'password' => 'xxxxxxx']);

        $users = User::all();

        return view('user',['users' => $users]);
    }
}
