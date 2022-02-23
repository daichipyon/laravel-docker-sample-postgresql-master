<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id','filename','comment'];

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function likes(){
        return $this->hasMany('App\Model\Like','post_id','id');
    }

    public function countlike(){
        return $this->likes()->count();
    }

    public function deletePost(){
        $this->delete();
        return true;
    }

}
