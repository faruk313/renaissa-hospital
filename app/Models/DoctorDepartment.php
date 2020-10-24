<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorDepartment extends Model
{
    protected $fillable=[
        'department_name',
        'department_note',
        'department_status',
        'user_id'
    ];
}
