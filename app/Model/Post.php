<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id','filename','comment'];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
