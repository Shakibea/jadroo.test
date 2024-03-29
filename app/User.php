<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    //One to One relation
    public function post(){
        return $this->hasOne('App\Post');
    }
    //one to many relation
    public function posts(){
        return $this->hasMany('App\Post');
    }
    //many to many relation
//    public function roles(){
//        return $this->belongsToMany('App\Role');
//    }
    //Intermediate Table with pivot
    public function roles(){
        return $this->belongsToMany('App\Role')->withPivot('created_at');
    }

    //one to one polymorphic
    public function image(){
        return $this->morphOne('App\Image', 'imageable');
    }

    public function getNameAttribute($value){
        return strtoupper($value);
    }



}
