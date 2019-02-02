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
     * Get the roles that the user can have.
     */
    public function user_role()
    {
        return $this->hasMany('App\Departments');
    }

    /**
     * Get the departments that the user can have.
     */
    public function user_department()
    {
        return $this->hasMany('App\Departments');
    }

    /**
     * Get the functionss that the user can have.
     */
    public function user_function()
    {
        return $this->hasMany('App\Functions');
    }
}