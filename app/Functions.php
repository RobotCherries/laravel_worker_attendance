<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Functions extends Model
{
    protected $primaryKey = 'function_id';
    protected $table = 'functions';

    /**
     * Get the department that owns the functions.
     */
    public function department()
    {
        return $this->belongsTo('App\Departments');
    }
}
