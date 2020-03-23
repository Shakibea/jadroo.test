<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //one to many polymorphic
    public function commentable(){
        return $this->morphTo();
    }
}
