<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clockings extends Model
{
    protected $primaryKey = 'clocking_id';
    protected $table = 'clockings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'clocking_type_id', 'clocking_hours', 'clocking_date', 'clocking_presence', 'clocking_overtime', 'clocking_weekend',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id', 'user_role_id',  'department_id', 'function_id',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
}
