<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientTest extends Model
{
    protected $fillable =
    [
        'test_date',
        'patient_test_invoice_id',
        'delivery_date',
        'test_id',
        'test_price',
        'test_discount',
        'test_net_amount',
    ];

    public function patientTestInvoice(){
        return $this->belongsTo('App\Models\PatientTestInvoice', 'patient_test_invoice_id');
    }

    public function pathologyTest(){
        return $this->belongsTo('App\Models\PathologyTest', 'test_id');
    }

}
