@extends('layouts.master')
@section('title','Doctor Info')
@section('doctors','active')
@section('doctors_view','active')
@section('template_css')
@endsection
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row clearfix mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Doctor Info. Details</h4>
                        <div class="btn-group ml-auto">
                            <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                            <a type="button" href="{{ route('doctors.edit',$doctor->id) }}" class="btn btn-info text-white ml-auto float-right mr-2">
                                <i class="fas fa-edit"></i>&nbsp;Update Info
                            </a>
                            <a type="button" href="{{ route('doctors.lists') }}" class="btn btn-primary text-white ml-auto float-right">
                                <i class="fas fa-list"></i>&nbsp;Doctor Lists
                            </a>
                        </div>
                    </div>
                    @php
                   
                    $leave_or_present_status = '';
                    $status = 0;
                    $test_commission = 0;
                    $doctor_type = 0;
                    $department ='';
                    $gender = 0;
                    $status = 0;
                    if($doctor->chamber_id == null){
                        $chamber ='<span class="badge badge-primary badge-pill">N/A</span>';
                    }
                    else{
                        $chamber = '<span class="badge badge-secondary badge-pill">'.$doctor->chamber->code.'<span>';
                    }
                    if($doctor->gender == 1){
                        $gender ='<span class="badge badge-primary badge-pill">Male</span>';
                    }
                    if($doctor->gender == 0){
                        $gender ='<span class="badge badge-info badge-pill">Female</span>';
                    }
                    if($doctor->photo == null){
                        $photo ='default.png';
                        
                    }
                    if($doctor->photo != null){
                        $photo = $doctor->photo;
                    }

                    if($doctor->status == 1){
                       $status =' <span class="badge badge-success badge-pill">Active</span>';
                    }
                    if($doctor->status == 0){
                        $status ='<span class="badge badge-danger badge-pill">Inactive</span>';
                    }

                    if($doctor->gender == 1){
                       $gender =' <span class="badge badge-success badge-pill">Male</span>';
                    }
                    if($doctor->gender == 0){
                        $gender ='<span class="badge badge-danger badge-pill">Female</span>';
                    }
                    
                    if($doctor->test_commission == 1){
                        $test_commission ='<span class="badge badge-success badge-pill">Yes</span>';
                    }
                    if($doctor->test_commission == 0){
                        $test_commission= '<span class="badge badge-danger badge-pill">No</span>';
                    }
                    if($doctor->leave_or_present_status == 1){
                       $leave_or_present_status ='<span class="badge badge-success badge-pill">Present</span>';
                    }
                    if($doctor->leave_or_present_status == 0){
                        $leave_or_present_status= '<span class="badge badge-danger badge-pill">Leave</span>';
                    }

                    if($doctor->type == 1){
                        $doctor_type= '<span class="badge badge-success badge-pill">Indoor</span>';
                    }
                    if($doctor->type == 2){
                        $doctor_type= '<span class="badge badge-primary badge-pill">Outdoor</span>';
                    }
                    if($doctor->type == 3){
                        $doctor_type= '<span class="badge badge-info badge-pill">Contractual</span>';
                    }
                    if($doctor->type == 4){
                        $doctor_type= '<span class="badge badge-danger badge-pill">Outside</span>';
                    }

                     
                    if($doctor->salary_or_contract_fees == '')
                    {
                        $salary_or_contract_fees ='---';
                    }
                    else{
                        $salary_or_contract_fees = '<span class="badge badge-danger badge-pill">'.$doctor->salary_or_contract_fees.' BDT'.'</span>';
                    }
                    if($doctor->report_payable == '')
                    {
                        $report_payable ='---';
                    }
                    else
                    {
                        $report_payable = '<span class="badge badge-danger badge-pill">'.$doctor->report_payable.' BDT'.'</span>';
                    }
                    if($doctor->report_fees == '')
                    {
                        $report_fees ='---';
                    }else
                    {
                        $report_fees = '<span class="badge badge-danger badge-pill">'.$doctor->report_fees.' BDT'.'</span>';
                    }
                    if($doctor->prescription_payable == '')
                    {
                        $prescription_payable ='---';
                    }
                    else{
                        $prescription_payable = '<span class="badge badge-danger badge-pill">'.$doctor->prescription_payable.' BDT'.'</span>';
                    }
                    if($doctor->prescription_fees == '')
                    {
                        $prescription_fees ='---';
                    }else
                    {
                        $prescription_fees ='<span class="badge badge-danger badge-pill">'.$doctor->prescription_fees.' BDT'.'</span>';
                    }
                    if($doctor->report_fees == '')
                    {
                        $report_fees ='---';
                    }
                    if($doctor->report_fees == '')
                    {
                        $report_fees ='---';
                    }
                    @endphp
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <img alt="Doctor Photo" class="rounded-circle author-box-picture mx-auto d-block" src="{{ asset('uploads/doctors/'.$photo ) }}" style="width:80px; height:80px">
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Doctor Name : </span>
                                        {{ $doctor->name }}
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Department : </span>
                                        @if ( $doctor->department_id==null)
                                            -----
                                        @else
                                        {{ $doctor->department->doctor_department_name  }}    
                                        @endif
                                    </li>
                                    <li class="list-group-item align-items-center">
                                        <span class="font-weight-bold">Degrees/Specialities : </span>
                                        <br/>
                                        <p>{{ $doctor->degrees }}</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Prescription Fees : </span>
                                        {!! $prescription_fees !!}
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Report Fees : </span>
                                        {!! $report_fees !!}
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Chamber : </span>
                                        {!! $chamber !!}
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Gender : </span>
                                        {!! $gender !!}
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Joining Date : </span>
                                        {{ $doctor->joining_date }}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="list-group">    
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Leave/Present Status : </span>
                                        {!! $leave_or_present_status !!}
                                       
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Leave/Present Note : </span>
                                        {{ $doctor->leave_or_present_note }}
                                    </li>
                                </ul>
                                <br/>
                                <ul class="list-group">
                                    <li class="list-group-item align-items-center">
                                        <span class="font-weight-bold">Present Institute : </span>
                                        <br/>
                                        <p>{{ $doctor->present_institute }}</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Designation : </span>
                                        {{ $doctor->institute_designation }}
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Institute Address : </span>
                                        {{ $doctor->institute_address }}
                                    </li>
                                </ul>
                                <br/>
                                <ul class="list-group"> 
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Contact Number : </span>
                                        {{ $doctor->mobile }}
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Email Address : </span>
                                        {{ $doctor->email }}
                                    </li>
                                   
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Date of Birth : </span>
                                        {{ $doctor->dob }}
                                    </li>
                                    <li class="list-group-item align-items-center">
                                        <span class="font-weight-bold">Mailing Address : </span>
                                        <br/>
                                        <p>{{ $doctor->mailing_address }}</p>
                                    </li>
                                    <li class="list-group-item align-items-center">
                                        <span class="font-weight-bold">Permanent Address : </span>
                                        <br/>
                                        <p>{{ $doctor->permanent_address }}</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Doctor ID. : </span>
                                        {{ $doctor->doctor_id }}
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Doctor Type : </span>
                                        {!! $doctor_type !!}
                                    </li>        
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Salary: </span>
                                        {!! $salary_or_contract_fees !!}
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Test Commission : </span>
                                        {!! $test_commission !!}
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Doctor Status : </span>
                                        {!! $status !!}
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Created By : </span>
                                        {{ $doctor->user->name }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('page_js')
@endsection