<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerPayment extends Model
{
    protected $fillable =
    [
        'invoice_date',
        'broker_id',
        'paid_amount',
        'due_amount',
    ];

    public function broker(){
        return $this->belongsTo('App\Models\RefUser', 'broker_id');
    }
}
