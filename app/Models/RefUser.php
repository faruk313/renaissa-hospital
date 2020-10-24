<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefUser extends Model
{
    protected $fillable =
    [
        'ref_user_id',
        'ref_user_name',
        'ref_user_mobile',
        'ref_user_note',
        'ref_user_status',
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
