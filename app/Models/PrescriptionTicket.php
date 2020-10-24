<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrescriptionTicket extends Model
{
    protected $fillable =
    [
        'ticket_date',
        'serial_no',
        'serial_time',
        'patient_id',
        'doctor_id',
        'person_id',
        'doctor_fees',
        'discount',
        'total_amount',
        'paid_amount',
        'due_amount',
    ];

    public function patient(){
        return $this->belongsTo('App\Models\Patient', 'patient_id');
    }

    public function doctor(){
        return $this->belongsTo('App\Models\Doctor');
    }

    public function person(){
        return $this->belongsTo('App\Models\RefUser');
    }

    public function invoice(){
        return $this->hasMany('App\Models\Invoice', 'prescription_ticket_id');
    }

}
