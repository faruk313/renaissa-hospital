<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PathologyDepartment extends Model
{
    protected $fillable=[
        'department_name',
        'department_note',
        'department_status',
        'user_id'
    ];
}
