<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientTestInvoice extends Model
{
    protected $fillable =
    [
        'test_date',
        'patient_id',
        'doctor_id',
        'person_id',
    ];

    public function patientTest(){
        return $this->hasMany('App\Models\PatientTest', 'patient_test_invoice_id');
    }

    public function patient(){
        return $this->belongsTo('App\Models\Patient');
    }

    public function doctor(){
        return $this->belongsTo('App\Models\Doctor');
    }

    public function person(){
        return $this->belongsTo('App\Models\RefUser');
    }
}
