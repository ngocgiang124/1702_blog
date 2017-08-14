<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';

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

    public function GetInfo(){
        return $this->hasOne('App\Models\UserInfo', 'id', 'id');
        // 
        // return \App\Models\UserInfo::find($this->id);
    }

    public function roles(){
        return $this->belongsToMany('App\Models\Role', 'user_role_xref');
    }
}
