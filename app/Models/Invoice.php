<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable =
    [
        'invoice_date',
        'invoice_no',
        'prescription_ticket_id',
        'patient_test_invoice_id',
        'patient_id',
        'doctor_id',
        'person_id',
        'payable_amount',
        'discount',
        'total_amount',
    ];

    public function prescriptonTicket(){
        return $this->belongsTo('App\Models\PrescriptionTicket', 'prescription_ticket_id');
    }

    public function patientTestInvoice(){
        return $this->belongsTo('App\Models\PatientTestInvoice', 'patient_test_invoice_id');
    }

    public function patient(){
        return $this->belongsTo('App\Models\Patient');
    }

    public function doctor(){
        return $this->belongsTo('App\Models\Doctor', 'doctor_id');
    }

    public function person(){
        return $this->belongsTo('App\Models\RefUser');
    }
}
