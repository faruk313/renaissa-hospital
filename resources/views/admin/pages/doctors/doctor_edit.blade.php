@extends('layouts.master')
@section('title','Update Doctor')
@section('doctors','active')
@section('doctors_edit','active')
@section('template_css')

@endsection
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row clearfix mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Doctor Edit Form</h4>
                        <div class="btn-group ml-auto">
                            <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                            <a type="button" href="{{ route('doctors.lists') }}" class="btn btn-primary text-white ml-auto float-right">
                                <i class="fas fa-list"></i>&nbsp;Doctor Lists
                            </a>
                        </div>
                    </div>
                    <form action="{{ route('doctors.update',$doctor->id) }}" method="POST" autocomplete="on" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $doctor->id }}" name="doctor_update_id" id="doctor_update_id">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="doctor_type">Doctor Type <span class="text-danger">*</span></label>
                                        <select name="doctor_type" id="doctor_type" class="form-control selectric" required="">
                                            <option value="1" {{ ($doctor->type)==1?'selected':'' }}>Indoor Doctor</option>
                                            <option value="2" {{ ($doctor->type)==2?'selected':'' }}>Outdoor Doctor</option>
                                            <option value="3" {{ ($doctor->type)==3?'selected':'' }}>Contractual Doctor</option>
                                            <option value="4" {{ ($doctor->type)==4?'selected':'' }}>Outside Doctor</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Oh no! Doctor Type ?
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row" id="doctorPayment">
                                <div class="col-md-3" id="doctor_prescription_fees">
                                    <div class="form-group">
                                        <label for="doctor_prescription_fees">Prescription Fees <span class="text-danger">*</span></label>
                                        <input type="number" id="doctor_prescription_fees" name="doctor_prescription_fees" value="{{ old('doctor_prescription_fees',$doctor->prescription_fees) }}" class="form-control" placeholder="---">
                                    </div>
                                </div>
                                <div class="col-md-3" id="doctor_prescription_payable">
                                    <div class="form-group">
                                        <label for="doctor_prescription_payable">Prescription Payable</label>
                                        <input type="number" id="doctor_prescription_payable" name="doctor_prescription_payable" value="{{ old('doctor_prescription_payable',$doctor->prescription_payable) }}" placeholder="---" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3" id="doctor_report_fees">
                                    <div class="form-group">
                                        <label for="doctor_report_fees">Report Fees <span class="text-danger">*</span></label>
                                        <input type="number" id="doctor_report_fees" name="doctor_report_fees" value="{{ old('doctor_report_fees',$doctor->report_fees) }}" class="form-control" placeholder="---">
                                    </div>
                                </div>
                                <div class="col-md-3" id="doctor_report_payable">
                                    <div class="form-group">
                                        <label for="doctor_report_payable">Report Payable</label>
                                        <input type="number" id="doctor_report_payable" name="doctor_report_payable" value="{{ old('doctor_report_payable',$doctor->report_payable) }}" placeholder="---" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3" id="doctor_salary_or_contract_fees">
                                    <div class="form-group">
                                        <label for="doctor_salary_or_contract_fees">Contract Fess/ Salary</label>
                                        <input type="number" id="doctor_salary_or_contract_fees" name="doctor_salary_or_contract_fees" value="{{ old('doctor_salary_or_contract_fees',$doctor->salary_or_contract_fees) }}" placeholder="---" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3"  id="doctor_test_commission">
                                    <div class="form-group">
                                        <label for="doctor_test_commission" class="d-block">Test Commission<span class="text-danger">&nbsp;*</span></label>
                                        <div class="custom-control custom-radio custom-control-inline mt-2">
                                            <input type="radio" id="doctor_test_commission1" name="doctor_test_commission" class="custom-control-input" value="1" {{ $doctor->test_commision==1?'checked':'' }}>
                                            <label class="custom-control-label" for="doctor_test_commission1">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mt-2">
                                            <input type="radio" id="doctor_test_commission2" name="doctor_test_commission" class="custom-control-input" value="0" {{ $doctor->test_commision==0?'checked':'' }}>
                                            <label class="custom-control-label" for="doctor_test_commission2">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="imgFileUpload">Doctor Photo</label>
                                        <div class="author-box-center text-center">
                                            @if(empty($doctor->photo))
                                            <img id="imgFileUpload" alt="Select File" class="rounded-circle author-box-picture mx-auto d-block" title="Select File" src="{{ asset('assets/img/users/avatar_002.png') }}" style="cursor: pointer; width:50px; height:50px" />
                                            @else
                                            <img id="imgFileUpload" alt="Select File" class="rounded-circle author-box-picture mx-auto d-block" title="Select File" src="{{ asset('uploads/doctors/'.$doctor->photo ) }}" style="cursor: pointer; width:50px; height:50px" />
                                            <input type="hidden" name="old_photo" value="{{ $doctor->photo }}">
                                            @endif
                                            <span class="text-center" id="spnFilePath"></span>
                                            <input type="file" id="FileUpload1" name="doctor_photo" style="display: none" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="doctor_name">Doctor Name <span class="text-danger">*</span></label>
                                        <input type="text" id="doctor_name" name="doctor_name" value="{{ old('doctor_name',$doctor->name) }}" class="form-control" placeholder="-----" required="">
                                        <div class="invalid-feedback">
                                            Oh no! Doctor Name?
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="doctor_mobile">Contact Number <span class="text-danger">*</span></label>
                                        <input type="tel" id="doctor_mobile" name="doctor_mobile" value="{{ old('doctor_mobile',$doctor->mobile) }}" placeholder="Contact Number" class="form-control">
                                        <div class="invalid-feedback">
                                            Oh no! Contact Number?
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="doctor_email">Email Address</label>
                                        <input type="email" id="doctor_email" value="{{ old('doctor_email',$doctor->email) }}" name="doctor_email" placehplder="-----" class="form-control" autocomplete="false">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="doctor_department">Select Department <span class="text-danger">*</span></label>
                                        <select name="doctor_department" id="doctor_department" class="form-control selectric">
                                        @foreach ($doctor_departments as $department)
                                            <option value="" >Select One</option>
                                            <option value="{{ $department->id }}" {{ $doctor->department_id==$department->id?'selected':'' }}>{{ $department->doctor_department_name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="doctor_chamber">Select Chamber <span class="text-danger">*</span></label>
                                        <select name="doctor_chamber" id="doctor_chamber" class="form-control selectric">
                                            @foreach ($doctor_chambers as $chamber)
                                            <option value="" >Select One</option>
                                            <option value="{{ $chamber->id }}" {{ $doctor->chamber_id==$chamber->id?'selected':'' }}>{{ $chamber->code }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="doctor_dob">Doctor DOB <span class="text-danger">*</span></label>
                                        <input type="text" id="doctor_dob" name="doctor_dob" value="{{ old('doctor_dob',$doctor->dob) }}" placeholder="{{ old('doctor_dob',$doctor->dob) }}" class="form-control datepicker">
                                        <div class="invalid-feedback">
                                            Oh no! Doctor DOB?
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="doctor_gender" class="d-block">Doctor Gender<span class="text-danger">&nbsp;*</span></label>
                                        <div class="custom-control custom-radio custom-control-inline mt-2">
                                            <input type="radio" id="doctor_gender1" name="doctor_gender" class="custom-control-input" value="1" {{ $doctor->gender==1?'checked':'' }}>
                                            <label class="custom-control-label" for="doctor_gender1">Male</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline  mt-2">
                                            <input type="radio" id="doctor_gender2" name="doctor_gender" class="custom-control-input" value="0" {{ $doctor->gender==0?'checked':'' }}>
                                            <label class="custom-control-label" for="doctor_gender2">Female</label>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="doctor_degrees">Professional Degrees <span class="text-danger">*</span></label>
                                        <input type="text" name="doctor_degrees" id="doctor_degrees" value="{{ old('doctor_degrees',$doctor->degrees) }}" class="form-control" placeholder="-----" required="">
                                        <div class="invalid-feedback">
                                            Oh no! Professional Degrees.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="doctor_mailing_address">Mailing Address <span class="text-danger">*</span></label>
                                        <input type="text" name="doctor_mailing_address" id="doctor_mailing_address" value="{{ old('doctor_mailing_address',$doctor->mailing_address) }}" class="form-control" placeholder="-----">
                                        <div class="invalid-feedback">
                                            Oh no! Mailing Address.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="doctor_permanent_address">Permanent Address <span class="text-danger">*</span></label>
                                        <input type="text" name="doctor_permanent_address" id="doctor_permanent_address" class="form-control" value="{{ old('doctor_permanent_address',$doctor->permanent_address) }}" placeholder="-----">
                                        <div class="invalid-feedback">
                                            Oh no! Permanent Address.
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="doctor_present_institute">Present Institute<span class="text-danger">*</span></label>
                                        <input type="text" name="doctor_present_institute" id="doctor_present_institute" value="{{ old('doctor_present_institute',$doctor->present_institute) }}" class="form-control" placeholder="-----">
                                        <div class="invalid-feedback">
                                            Oh no! Institute?
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="doctor_institute_designation">Designation <span class="text-danger">*</span></label>
                                        <input type="text" name="doctor_institute_designation" id="doctor_institute_designation" value="{{ old('doctor_institute_designation',$doctor->institute_designation) }}" class="form-control" placeholder="-----">
                                        <div class="invalid-feedback">
                                            Oh no! Designation?
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="doctor_institute_address">Institute Address <span class="text-danger">*</span></label>
                                        <input type="text" name="doctor_institute_address" id="doctor_institute_address" class="form-control" value="{{ old('doctor_institute_address',$doctor->institute_address) }}" placeholder="-----">
                                        <div class="invalid-feedback">
                                            Oh no! Permanent Address.
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="doctor_joining_date">Date of Joining <span class="text-danger">*</span></label>
                                        <input type="text" id="doctor_joining_date" name="doctor_joining_date" value="{{ old('doctor_joining_date',$doctor->joining_date) }}" placeholder="1990-08-17" class="form-control datepicker">
                                        <div class="invalid-feedback">
                                            Oh no! Doctor Date of Joining?
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="doctor_status" class="d-block">Doctor Status<span class="text-danger">&nbsp;*</span></label>
                                        <div class="custom-control custom-radio custom-control-inline mt-2">
                                            <input type="radio" id="doctor_status1" name="doctor_status" class="custom-control-input" value="1" {{ $doctor->status==1?'checked':'' }}>
                                            <label class="custom-control-label" for="doctor_status1">Active</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline  mt-2">
                                            <input type="radio" id="doctor_status2" name="doctor_status" class="custom-control-input" value="0" {{ $doctor->status==0?'checked':'' }}>
                                            <label class="custom-control-label" for="doctor_status2">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="doctor_leave_or_present_status" class="d-block">Present/Leave Status<span class="text-danger">&nbsp;*</span></label>
                                        <div class="custom-control custom-radio custom-control-inline mt-2">
                                            <input type="radio" id="doctor_present_status1" name="doctor_leave_or_present_status" class="custom-control-input" value="1" {{ $doctor->leave_or_present_status==1?'checked':'' }}>
                                            <label class="custom-control-label" for="doctor_present_status1">Present</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mt-2">
                                            <input type="radio" id="doctor_present_status2" name="doctor_leave_or_present_status" class="custom-control-input" value="0" {{ $doctor->leave_or_present_status==0?'checked':'' }}>
                                            <label class="custom-control-label" for="doctor_present_status2">Leave</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="doctor_leave_or_present_note">Present/Leave Note</label>
                                        <input type="text" id="doctor_leave_or_present_note" name="doctor_leave_or_present_note" value="{{ old('doctor_leave_or_present_note',$doctor->leave_or_present_note) }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary" id="update_button">Update Doctor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('page_js')

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    var update_form =$('#update_form');
    var update_button =$('#update_button');

    function reset(){
        $('select').selectric('refresh');
        $(this).find('form').trigger('reset');
        update_button.removeClass('btn-progress')
    }
  
    $(document).ready(function(){
        var prescription_fees =  $('#doctorPayment #doctor_prescription_fees');
        var prescription_payable =  $('#doctorPayment #doctor_prescription_payable');
        var report_fees =  $('#doctorPayment #doctor_report_fees');
        var report_payable =  $('#doctorPayment #doctor_report_payable');
        var salary_or_contract_fees =  $('#doctorPayment #doctor_salary_or_contract_fees');
        var test_commission =  $('#doctorPayment #doctor_test_commission');
        var select_type = $('select[name=doctor_type] option:selected').val();
        if(select_type=='1'){
            prescription_fees.show().find('input').prop('disabled', false);
            prescription_payable.hide().find('input').prop('disabled', true);
            report_fees.show().find('input').prop('disabled', false);
            report_payable.show().hide('input').prop('disabled', true);
            salary_or_contract_fees.show().find('input').prop('disabled', false);
            test_commission.show();
        }
        else if(select_type=='2'){
            prescription_fees.show().find('input').prop('disabled', false);
            prescription_payable.show().find('input').prop('disabled', false);
            report_fees.show().find('input').prop('disabled', false);
            report_payable.show().find('input').prop('disabled', false);
            salary_or_contract_fees.hide().find('input').prop('disabled', true);
            test_commission.show();
        }
        else if(select_type=='3'){
            prescription_fees.show().find('input').prop('disabled', false);
            prescription_payable.hide().find('input').prop('disabled', true);
            report_fees.show().find('input').prop('disabled', false);
            report_payable.hide().find('input').prop('disabled', true);
            salary_or_contract_fees.show().find('input').prop('disabled', false);
            test_commission.show();
        }
        else if(select_type=='4'){
            prescription_fees.hide().find('input').prop('disabled', true);
            prescription_payable.hide().find('input').prop('disabled', true);
            report_fees.hide().find('input').prop('disabled', true);
            report_payable.hide().find('input').prop('disabled', true);
            salary_or_contract_fees.hide().find('input').prop('disabled', true);
            test_commission.show();
        }
        else{
            prescription_fees.hide()
            prescription_payable.hide()
            report_fees.hide()
            report_payable.hide()
            test_commission.hide();
            salary_or_contract_fees.hide()
        }

        $('#doctor_type').on('change', function(){
            var typeVal = $(this).val(); 
            if(typeVal=='1'){
                prescription_fees.show().find('input').prop('disabled', false);
                prescription_payable.hide().find('input').prop('disabled', true);
                report_fees.show().find('input').prop('disabled', false);
                report_payable.show().hide('input').prop('disabled', true);
                salary_or_contract_fees.show().find('input').prop('disabled', false);
                test_commission.show();
            }
            else if(typeVal=='2'){
                prescription_fees.show().find('input').prop('disabled', false);
                prescription_payable.show().find('input').prop('disabled', false);
                report_fees.show().find('input').prop('disabled', false);
                report_payable.show().find('input').prop('disabled', false);
                salary_or_contract_fees.hide().find('input').prop('disabled', true);
                test_commission.show();
            }
            else if(typeVal=='3'){
                prescription_fees.show().find('input').prop('disabled', false);
                prescription_payable.hide().find('input').prop('disabled', true);
                report_fees.show().find('input').prop('disabled', false);
                report_payable.hide().find('input').prop('disabled', true);
                salary_or_contract_fees.show().find('input').prop('disabled', false);
                test_commission.show();
            }
            else if(typeVal=='4'){
                prescription_fees.hide().find('input').prop('disabled', true);
                prescription_payable.hide().find('input').prop('disabled', true);
                report_fees.hide().find('input').prop('disabled', true);
                report_payable.hide().find('input').prop('disabled', true);
                salary_or_contract_fees.hide().find('input').prop('disabled', true);
                test_commission.show();
            }
            else{
                prescription_fees.hide()
                prescription_payable.hide()
                report_fees.hide()
                report_payable.hide()
                test_commission.hide();
                salary_or_contract_fees.hide()
            }
        });

        $('#update_form').on('submit', function(event){
            event.preventDefault();
            var update_id = $('#update_form #update_id').val();
            var update_url = '{{ route("doctors.update",":update_id") }}';
            update_url = update_url.replace(':update_id',update_id);
            $('#update_form').attr('action',update_url);

        })
    })
</script>
@endsection