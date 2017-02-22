<?php

namespace App;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\UserRegistered;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_admin' => 'boolean',
    ];



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin', 'verification_code', 'settings'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->is_admin;
    }





    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function Profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function Articles()
    {
        return $this->hasMany('App\Article');
    }
}
