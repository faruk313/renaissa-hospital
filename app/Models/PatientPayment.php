<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientPayment extends Model
{
    protected $fillable =
    [
        'payment_date',
        'invoice_id',
        'paid_amount',
        'due_amount',
    ];

    public function invoice(){
        return $this->belongsTo('App\Models\Invoice', 'invoice_id');
    }
}
