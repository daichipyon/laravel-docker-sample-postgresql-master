<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\Post;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','thumb'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){
        return $this->hasMany('App\Model\Post','user_id','id');
    }

    public function likes(){
        return $this->belongsToMany(Post::class,'likes','user_id','post_id')->withTimestamps();
    }

    public function is_liked($post_id){
        return $this->likes()->where('post_id',$post_id)->exists();
    }

    public function addLike($post_id){
        if($this->is_liked($post_id)){
            return false;
        }
        else{
            $this->likes()->attach($post_id);
            return true;
        }
    }
    
    public function cancelLike($post_id){
        if($this->is_liked($post_id)){
            $this->likes()->detach($post_id);
            return true;
        }
        else{
            return false;
        }
    }
}