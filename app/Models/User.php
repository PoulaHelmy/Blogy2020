<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password','group'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getNameAttribute($value){
        return ucfirst($value);
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function getGravatar(){
        $hash=md5(strtolower(trim($this->attributes['email'])));
        return "https://gravatar.com/avatar/$hash";
    }
    public function getPicture()
    {
        return $this->profile->picture;
    }
    public function hasPicture()
    {
        if(preg_match('/profilesPicture/',$this->profile->picture,$match))
        {
            return true;
        }
        else
            return false;
    }
















}
