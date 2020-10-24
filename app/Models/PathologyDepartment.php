<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PathologyDepartment extends Model
{
    protected $fillable=[
        'pathology_department_name',
        'pathology_department_note',
        'pathology_department_status',
        'user_id'
    ];
}
