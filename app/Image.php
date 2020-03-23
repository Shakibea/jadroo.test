<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //one to one polymorphic
    public function imageable(){
        return $this->morphTo();
    }
}
