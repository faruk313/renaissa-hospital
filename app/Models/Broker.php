<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Broker extends Model
{
    protected $fillable =
    [
        'broker_uid',
        'broker_name',
        'broker_mobile',
        'broker_note',
        'broker_commission',
        'broker_status',
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
