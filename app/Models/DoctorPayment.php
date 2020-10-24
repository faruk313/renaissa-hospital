<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorPayment extends Model
{
    protected $fillable =
    [
        'invoice_date',
        'doctor_id',
        'paid_amount',
        'due_amount',
        'user_id'
    ];

    public function doctor(){
        return $this->belongsTo('App\Models\Doctor', 'doctor_id');
    }
}
