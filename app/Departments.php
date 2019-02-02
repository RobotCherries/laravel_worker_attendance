<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    protected $primaryKey = 'department_id';
    protected $table = 'departments';
}
