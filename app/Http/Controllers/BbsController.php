<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Bbs;



class BbsController extends Controller
{
    public function index(){
        return view('bbs.index');
    }

    public function create(Request $request){
        
        $request->validate([
            'name'=>'required|max:10',
            'comment'=>'required|min:5|max:140',
        ]);

        $name = $request->input('name');
        $comment = $request->input('comment');
        
        Bbs::insert(["name" => $name, "comment" => $comment]);

        $bbs = Bbs::all();

        return view('bbs.index', ["bbs" => $bbs]);
    }
}
