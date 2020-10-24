<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorDepartment extends Model
{
    protected $fillable=[
        'doctor_department_name',
        'doctor_department_note',
        'doctor_department_status',
        'user_id'
    ];
}
