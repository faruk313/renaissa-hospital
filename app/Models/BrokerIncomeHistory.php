<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerIncomeHistory extends Model
{
    protected $fillable =
    [
        'invoice_date',
        'invoice_no',
        'prescription_ticket_id',
        'patient_test_invoice_id',
        'broker_id',
        'broker_income_amount',
        'broker_payable_amount',
    ];

    public function broker(){
        return $this->belongsTo('App\Models\RefUser', 'broker_id');
    }
}
