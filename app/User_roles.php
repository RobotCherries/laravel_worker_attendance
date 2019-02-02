<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_roles extends Model
{
    protected $primaryKey = 'user_role_id';
    protected $table = 'user_roles';

    /**
     * Get the user_roles that owns the functions.
     */
    public function user_roles()
    {
        return $this->belongsTo('App\Users');
    }
}
