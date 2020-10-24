<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorIncomeHistory extends Model
{
    protected $fillable =
    [
        'invoice_date',
        'invoice_no',
        'invoice_id',
        'prescription_ticket_id',
        'patient_test_invoice_id',
        'doctor_id',
        'doctor_income_amount',
        'doctor_payable_amount',
    ];

    public function prescriptonTicket(){
        return $this->belongsTo('App\Models\PrescriptionTicket', 'prescription_ticket_id');
    }

    public function patientTestInvoice(){
        return $this->belongsTo('App\Models\PatientTestInvoice', 'patient_test_invoice_id');
    }

    public function doctor(){
        return $this->belongsTo('App\Models\Doctor', 'doctor_id');
    }


}
