<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_role_id',  'department_id', 'function_id', 'first_name', 'middle_name', 'last_name', 'email', 'password', 'date_hired',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'active', 'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
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