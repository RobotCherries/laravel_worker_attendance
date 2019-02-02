<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Functions extends Model
{
    protected $table = 'functions';

    /**
     * Get the department that owns the functions.
     */
    public function department()
    {
        return $this->belongsTo('App\Departments');
    }
}
