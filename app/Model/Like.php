<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['post_id','user_id'];

    public function post(){
        return $this->belongsTo('App\Model\Post','post_id','id');
    }

    public function user(){
        return $this->hasOne('App\Model\Post','user_id','id');

    }
}
