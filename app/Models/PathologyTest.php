<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PathologyTest extends Model
{
    protected $fillable =
    [
        'test_code',
        'test_name',
        'test_price',
        'patient_discount',
        'doctor_commission',
        'broker_commission',
        'test_duration',
        'test_room',
        'test_status',
        'test_suggestion',
        'user_id'
    ];
}
