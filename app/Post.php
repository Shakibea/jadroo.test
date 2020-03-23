<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    //if class name different, from database name. then we have to use as like below $table
//    protected $table = 'posts';
//    protected $primaryKey = 'post_id';


    protected $fillable = [
        'title',
        'content'
    ];


    use SoftDeletes;


    //Inverse one to one Relationship
    public function user(){
        return $this->belongsTo('App\User');
    }

    //one to one polymorphic
    public function image(){
        return $this->morphOne('App\Image', 'imageable');
    }

    //one to many polymorphic
    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }

    //many to many polymorphic
    public function tags(){
        return $this->morphToMany('App\Tag', 'taggable');
    }

}
