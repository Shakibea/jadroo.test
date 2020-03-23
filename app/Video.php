<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //one to many polymorphic
    public function comments(){
        return $this->morphToMany('App\Comment', 'commentable');
    }

    public function tags(){
        return $this->morphToMany('App\Tag', 'taggable');
    }

}
