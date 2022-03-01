<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    protected $fillable = ['user_id','filename','comment'];

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function countlike(){
        return $this->likes()->count();
    }

    public function deletePost(){
        $this->delete();
        return true;
    }

    public function likes(){
        return $this->belongsToMany(User::class,'likes','post_id','user_id')->withTimestamps();
    }

    public function is_liked(){
        return $this->likes()->count() >= 1;
    }

    public function like_users(){
        return $this->likes()->all();
    }
}
