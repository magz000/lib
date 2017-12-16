<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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


    public function isAdmin(){
        return $this->type == 1;
    }

    public function isStore(){
        return $this->type == 2;
    }

    public function isClient(){
        return $this->type == 3;
    }

    public function groupchat(){
        return $this->hasOne('App\Groupchat');
    }

    public function avatar(){
        return $this->belongsTo('App\Avatar');
    }
}
