<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable=[
        'doctor_id',
        'type',
        'prescription_fees',
        'prescription_payable',
        'report_fees',
        'report_payable',
        'salary_or_contract_fees',
        'test_commission',
        'name',
        'email',
        'mobile',
        'photo',
        'department_id',
        'chamber_id',
        'dob',
        'gender',
        'degrees',
        'mailing_address',
        'permanent_address',
        'present_institute',
        'institute_designation',
        'institute_address',
        'joining_date',
        'status',
        'leave_or_present_status',
        'to_time',
        'from_time',
        'to_date',
        'from_date',
        'leave_or_present_note',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function department(){
        return $this->belongsTo('App\Models\DoctorDepartment');
    }
    public function chamber(){
        return $this->belongsTo('App\Models\Room');
    }

    public function prescriptionTickets(){
        return $this->hasMany('App\Models\PrescriptionTicket');
    }

    public function invoices(){
        return $this->hasMany('App\Models\Invoice');
    }
}
