<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'name','type','image', 'email', 'password'
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
    const ADMIN_TYPE = 1;
    const DEFAULT_TYPE = 0;
    const ADMIN_TYPE_NAME = 'ผู้ดูแลระบบ';
    const DEFAULT_TYPE_NAME = 'ผู้ใช้ทั่วไป';

    public function isAdmin(){
        return $this->type === self::ADMIN_TYPE;
    }
    public function isUser(){
        return $this->type === self::DEFAULT_TYPE;
    }

    static public function typeIntToString($type){
        if ($type == 0)
        {
            return $type = 'ผู้ใช้ทั่วไป';
        }
        elseif ($type == 1){
            return $type = 'ผู้ดูแลระบบ';
        }
    }
    static public function typeStringToInt($text){
        if ($text == 'ผู้ใช้ทั่วไป')
        {
            return $type = 0;
        }
        elseif ($text == 'ผู้ดูแลระบบ'){
            return $type = 1;
        }
    }


    public function getTypeuser(){
        return [self::ADMIN_TYPE => self::ADMIN_TYPE_NAME,self::DEFAULT_TYPE => self::DEFAULT_TYPE_NAME];
    }
    public function cart(){
        return $this->hasMany('App\Cart');
    }
}
