<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable =
    [
        'patient_uid',
        'patient_name',
        'patient_mobile',
        'patient_age',
        'patient_gender',
        'patient_address',
        'patient_note',
        'patient_status',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function prescriptionTickets(){
        return $this->hasMany('App\Models\PrescriptionTicket');
    }

    public function invoices(){
        return $this->hasMany('App\Models\Invoice');
    }
}
