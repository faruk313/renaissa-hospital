@extends('layouts.master')
@section('title','Doctor Create')
@section('doctors','active')
@section('doctors_create','active')
@section('template_css')

@endsection
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row clearfix mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Doctor Add Form</h4>
                        <div class="btn-group ml-auto">
                            <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                            <a type="button" href="{{ route('doctors.lists') }}" class="btn btn-primary text-white ml-auto float-right">
                                <i class="fas fa-list"></i>&nbsp;Doctor Lists
                            </a>
                        </div>
                    </div>
                    <form action="{{ route("doctors.storeDoctor") }}" method="POST" autocomplete="on" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body pb-5 mb-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="doctor_type">Doctor Type <span class="text-danger">*</span></label>
                                        <select name="doctor_type" id="doctor_type" class="form-control selectric" required="">
                                            <option disabled selected>Select one...</option>
                                            <option value="1">Indoor Doctor</option>
                                            <option value="2">Outdoor Doctor</option>
                                            <option value="3">Contractual Doctor</option>
                                            <option value="4">Outside Doctor</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Oh no! Doctor Type ?
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-0 p-0" id="doctorPayment"></div>
                            <div class="m-0 p-0" id="doctorInfo">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="imgFileUpload">Doctor Photo</label>
                                            <div class="author-box-center text-center">
                                                <img id="imgFileUpload" alt="Select File" class="rounded-circle author-box-picture mx-auto d-block" title="Select File" src="{{ asset('assets/img/users/avatar_002.png') }}" style="cursor: pointer; width:50px; height:50px" />
                                                <span class="text-center" id="spnFilePath"></span>
                                                <input type="file" id="FileUpload1" name="doctor_photo" style="display: none" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="doctor_name">Doctor Name <span class="text-danger">*</span></label>
                                            <input type="text" id="doctor_name" name="doctor_name" value="{{ old('doctor_name') }}" class="form-control" placeholder="-----" required="">
                                            <div class="invalid-feedback">
                                                Oh no! Doctor Name?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="doctor_mobile">Contact Number <span class="text-danger">*</span></label>
                                            <input type="tel" id="doctor_mobile" name="doctor_mobile" value="{{ old('doctor_mobile') }}" placeholder="Contact Number" class="form-control">
                                            <div class="invalid-feedback">
                                                Oh no! Contact Number?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="doctor_email">Email Address</label>
                                            <input type="email" id="doctor_email" value="{{ old('doctor_email') }}" name="doctor_email" placehplder="-----" class="form-control" autocomplete="false">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="doctor_department">Select Department <span class="text-danger">*</span></label>
                                            <select name="doctor_department" id="doctor_department" class="form-control selectric">
                                                <option value="" selected data-default>Select Department</option>
                                                @foreach ($doctor_departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->doctor_department_name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="doctor_chamber">Select Chamber <span class="text-danger">*</span></label>
                                            <select name="doctor_chamber" id="doctor_chamber" class="form-control selectric">
                                                <option value="" selected data-default>Select Chamber</option>
                                                @foreach ($doctor_chambers as $chamber)
                                                    <option value="{{ $chamber->id }}">{{ $chamber->code }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="doctor_dob">Doctor DOB <span class="text-danger">*</span></label>
                                            <input type="text" id="doctor_dob" name="doctor_dob" value="{{ old('doctor_dob','1990-08-17') }}" placeholder="1990-08-17" class="form-control datepicker">
                                            <div class="invalid-feedback">
                                                Oh no! Doctor DOB?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="doctor_gender" class="d-block">Doctor Gender<span class="text-danger">&nbsp;*</span></label>
                                            <div class="custom-control custom-radio custom-control-inline mt-2">
                                                <input type="radio" id="doctor_gender1" name="doctor_gender" class="custom-control-input" value="1" checked>
                                                <label class="custom-control-label" for="doctor_gender1">Male</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline  mt-2">
                                                <input type="radio" id="doctor_gender2" value="0" name="doctor_gender" class="custom-control-input">
                                                <label class="custom-control-label" for="doctor_gender2">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="doctor_degrees">Professional Degrees <span class="text-danger">*</span></label>
                                            <input type="text" name="doctor_degrees" id="doctor_degrees" value="{{ old('doctor_degrees') }}" class="form-control" placeholder="-----" required="">
                                            <div class="invalid-feedback">
                                                Oh no! Professional Degrees.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="doctor_mailing_address">Mailing Address <span class="text-danger">*</span></label>
                                            <input type="text" name="doctor_mailing_address" id="doctor_mailing_address" value="{{ old('doctor_mailing_address') }}" class="form-control" placeholder="-----">
                                            <div class="invalid-feedback">
                                                Oh no! Mailing Address.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="doctor_permanent_address">Permanent Address <span class="text-danger">*</span></label>
                                            <input type="text" name="doctor_permanent_address" id="doctor_permanent_address" class="form-control" value="{{ old('doctor_permanent_address') }}" placeholder="-----">
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
                                            <input type="text" name="doctor_present_institute" id="doctor_present_institute" value="{{ old('doctor_present_institute') }}" class="form-control" placeholder="-----">
                                            <div class="invalid-feedback">
                                                Oh no! Institute?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="doctor_institute_designation">Designation <span class="text-danger">*</span></label>
                                            <input type="text" name="doctor_institute_designation" id="doctor_institute_designation" value="{{ old('doctor_institute_designation') }}" class="form-control" placeholder="-----">
                                            <div class="invalid-feedback">
                                                Oh no! Designation?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="doctor_institute_address">Institute Address <span class="text-danger">*</span></label>
                                            <input type="text" name="doctor_institute_address" id="doctor_institute_address" class="form-control" value="{{ old('doctor_institute_address') }}" placeholder="-----">
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
                                            <input type="text" id="doctor_joining_date" name="doctor_joining_date" value="{{ old('doctor_joining_date') }}" class="form-control datepicker">
                                            <div class="invalid-feedback">
                                                Oh no! Doctor Date of Joining?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="doctor_leave_or_present_status" class="d-block">Present/Leave Status<span class="text-danger">&nbsp;*</span></label>
                                            <div class="custom-control custom-radio custom-control-inline mt-2">
                                                <input type="radio" id="doctor_present_status1" name="doctor_leave_or_present_status" class="custom-control-input" value="1" checked>
                                                <label class="custom-control-label" for="doctor_present_status1">Present</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline mt-2">
                                                <input type="radio" id="doctor_present_status2" value="0" name="doctor_leave_or_present_status" class="custom-control-input">
                                                <label class="custom-control-label" for="doctor_present_status2">Leave</label>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-3 d-none" id="present1">
                                        <div class="form-group">
                                            <label>Present From</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-clock"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="from_time" id="to_time" class="form-control timepicker">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 d-none" id="present2">
                                        <div class="form-group">
                                            <label>Present To</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                    <i class="fas fa-clock"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="to_time" id="to_time" class="form-control timepicker">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 d-none" id="leave1">
                                        <div class="form-group">
                                            <label for="from_date">Leave From</label>
                                            <input type="text" id="from_date" name="from_date" value="{{ old('from_date') }}" class="form-control datepicker">
                                        </div>
                                    </div>
                                    <div class="col-md-3 d-none" id="leave2">
                                        <div class="form-group">
                                            <label for="to_date">Leave To</label>
                                            <input type="text" id="to_date" name="to_date" value="{{ old('to_date') }}" class="form-control datepicker">
                                        </div>
                                    </div> --}}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="doctor_leave_or_present_note">Present/Leave Note</label>
                                            <input type="text" id="doctor_leave_or_present_note" name="doctor_leave_or_present_note" value="{{ old('doctor_leave_or_present_note') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="doctor_status" class="d-block">Doctor Status<span class="text-danger">&nbsp;*</span></label>
                                            <div class="custom-control custom-radio custom-control-inline mt-2">
                                                <input type="radio" id="doctor_status1" name="doctor_status" class="custom-control-input" value="1" checked>
                                                <label class="custom-control-label" for="doctor_status1">Active</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline  mt-2">
                                                <input type="radio" id="doctor_status2" value="0" name="doctor_status" class="custom-control-input">
                                                <label class="custom-control-label" for="doctor_status2">Inactive</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary" id="add_button">Add Doctor</button>
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

    $(document).ready(function(){

        //ajax setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        function reset(){
            $('select').selectric('refresh');
            $(this).find('form').trigger('reset');
            $('#doctorInfo input[type="text"]').removeAttr('disabled');
            $('#doctorInfo input[type="number"]').removeAttr('disabled');
            $('#doctorInfo input[type="email"]').removeAttr('disabled');
            $('#doctorInfo input[type="radio"]').removeAttr('disabled');
            $('#doctorInfo select').removeAttr('disabled');
        }

        var indoorDoctor =`
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="doctor_prescription_fees">Prescription Fees <span class="text-danger">*</span></label>
                    <input type="number" id="doctor_prescription_fees" name="doctor_prescription_fees" value="{{ old('doctor_prescription_fees') }}" class="form-control" placeholder="---" required="">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="doctor_report_fees">Report Fees <span class="text-danger">*</span></label>
                    <input type="number" id="doctor_report_fees" name="doctor_report_fees" value="{{ old('doctor_report_fees') }}" class="form-control" placeholder="---"  required="">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="doctor_salary_or_contract_fees">Salary</label>
                    <input type="number" class="form-control" id="doctor_salary_or_contract_fees" name="doctor_salary_or_contract_fees" value="{{ old('doctor_salary_or_contract_fees') }}" placeholder="---"  required="">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="doctor_test_commission" class="d-block">Test Commission<span class="text-danger">&nbsp;*</span></label>
                    <div class="custom-control custom-radio custom-control-inline mt-2">
                        <input type="radio" id="doctor_test_commission1" name="doctor_test_commission" class="custom-control-input" value="1" checked>
                        <label class="custom-control-label" for="doctor_test_commission1">Yes</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline mt-2">
                        <input type="radio" id="doctor_test_commission2" value="0" name="doctor_test_commission" class="custom-control-input">
                        <label class="custom-control-label" for="doctor_test_commission2">No</label>
                    </div>
                </div>
            </div>
        </div>
        `;

        var outdoorDoctor =`
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="doctor_prescription_payable">Prescription Fees <span class="text-danger">*</span></label>
                    <input type="number" id="doctor_prescription_fees" name="doctor_prescription_fees" value="{{ old('doctor_prescription_fees') }}" class="form-control" placeholder="---" required="">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="doctor_prescription_payable" class="mx-0 px-0">Prescription&nbsp;Payable</label>
                    <input type="number"  class="form-control" id="doctor_prescription_payable" name="doctor_prescription_payable" value="{{ old('doctor_prescription_payable') }}" placeholder="---">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="doctor_report_fees">Report Fees <span class="text-danger">*</span></label>
                    <input type="number" id="doctor_report_fees" name="doctor_report_fees" value="{{ old('doctor_report_fees') }}" class="form-control" placeholder="---" required="">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="doctor_report_payable">Report Payable</label>
                    <input type="number" id="doctor_report_payable" name="doctor_report_payable" value="{{ old('doctor_report_payable') }}" placeholder="---" class="form-control">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="doctor_test_commission" class="d-block">Test Commission<span class="text-danger">&nbsp;*</span></label>
                    <div class="custom-control custom-radio custom-control-inline mt-2">
                        <input type="radio" id="doctor_test_commission1" name="doctor_test_commission" class="custom-control-input" value="1" checked>
                        <label class="custom-control-label" for="doctor_test_commission1">Yes</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline mt-2">
                        <input type="radio" id="doctor_test_commission2" value="0" name="doctor_test_commission" class="custom-control-input">
                        <label class="custom-control-label" for="doctor_test_commission2">No</label>
                    </div>
                </div>
            </div>
        </div>
        `;
        var contractDoctor =`
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="doctor_prescription_fees">Prescription Fees <span class="text-danger">*</span></label>
                    <input type="number" id="doctor_prescription_fees" name="doctor_prescription_fees" value="{{ old('doctor_prescription_fees') }}" class="form-control" placeholder="---" required="">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="doctor_report_fees">Report Fees <span class="text-danger">*</span></label>
                    <input type="number" id="doctor_report_fees" name="doctor_report_fees" value="{{ old('doctor_report_fees') }}" class="form-control" placeholder="---" required="">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="doctor_salary_or_contract_fees">Contract Fess/ Salary</label>
                    <input type="number" id="doctor_salary_or_contract_fees" name="doctor_salary_or_contract_fees" value="{{ old('doctor_salary_or_contract_fees') }}" placeholder="---" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="doctor_test_commission" class="d-block">Test Commission<span class="text-danger">&nbsp;*</span></label>
                    <div class="custom-control custom-radio custom-control-inline mt-2">
                        <input type="radio" id="doctor_test_commission1" name="doctor_test_commission" class="custom-control-input" value="1" checked>
                        <label class="custom-control-label" for="doctor_test_commission1">Yes</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline mt-2">
                        <input type="radio" id="doctor_test_commission2" value="0" name="doctor_test_commission" class="custom-control-input">
                        <label class="custom-control-label" for="doctor_test_commission2">No</label>
                    </div>
                </div>
            </div>
        </div>
        `;

        var outsideDoctor =`
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="doctor_name">Doctor Name <span class="text-danger">*</span></label>
                    <input type="text" id="doctor_name" name="doctor_name" value="{{ old('doctor_name') }}" class="form-control" placeholder="-----" required="">
                    <div class="invalid-feedback">
                        Oh no! Doctor Name?
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="doctor_degrees">Professional Degrees <span class="text-danger">*</span></label>
                    <input type="text" id="doctor_degrees" name="doctor_degrees" value="{{ old('doctor_degrees') }}" class="form-control" placeholder="-----" required="">
                    <div class="invalid-feedback">
                        Oh no! Doctor Name?
                    </div>
                </div>
            </div>
             <div class="col-md-3">
                <div class="form-group">
                    <label for="doctor_mobile">Contact Number</label>
                    <input type="tel" id="doctor_mobile" name="doctor_mobile" value="{{ old('doctor_mobile') }}" class="form-control" placeholder="-----">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="doctor_test_commission" class="d-block">Test Commission<span class="text-danger">&nbsp;*</span></label>
                    <div class="custom-control custom-radio custom-control-inline mt-2">
                        <input type="radio" id="doctor_test_commission1" name="doctor_test_commission" class="custom-control-input" value="1">
                        <label class="custom-control-label" for="doctor_test_commission1">Yes</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline mt-2">
                        <input type="radio" id="doctor_test_commission2" value="0" name="doctor_test_commission" class="custom-control-input" checked>
                        <label class="custom-control-label" for="doctor_test_commission2">No</label>
                    </div>
                </div>
            </div>
        </div>
        `;

        //onchange
        $('#doctorInfo').addClass('d-none');
        $('#doctorPayment').addClass('d-none');
        $('#doctor_type').on('change', function(){

            reset();
            $('select').selectric();
            var typeVal = $(this).val(); 
            if(typeVal=='1'){
                $("#doctorPayment").html(indoorDoctor);
                $('#doctorInfo').removeClass('d-none');
                $('#doctorPayment').removeClass('d-none');   
            }
            else if(typeVal=='2'){
                $("#doctorPayment").html(outdoorDoctor);
                $('#doctorInfo').removeClass('d-none');
                $('#doctorPayment').removeClass('d-none');   
            }
            else if(typeVal=='3'){
                $("#doctorPayment").html(contractDoctor);
                $('#doctorInfo').removeClass('d-none');
                $('#doctorPayment').removeClass('d-none');   
            }
            else if(typeVal=='4'){
                $("#doctorPayment").html(outsideDoctor);
                $('#doctorInfo').addClass('d-none');
                $('#doctorPayment').removeClass('d-none');
                
                $('#doctorInfo input[type="text"]').attr('disabled', 'disabled');
                $('#doctorInfo input[type="number"]').attr('disabled', 'disabled');
                $('#doctorInfo input[type="email"]').attr('disabled', 'disabled');
                $('#doctorInfo input[type="radio"]').attr('disabled', 'disabled');
                $('#doctorInfo select').attr('disabled', 'disabled');
      
            }
            else{
                indoorDoctor='';
                outdoorDoctor='';
                contractDoctor='';
                outsideDoctor='';
                $("#doctorPayment").html('');
            }
        });//change 


        //doctor leave or present
        $("input[name='doctor_leave_or_present_status']").click(function() {
            if ($("#doctor_present_status1").is(":checked")) {
                $("#present1").removeClass('d-none');
                $("#present2").removeClass('d-none');
                $("#leave1").addClass('d-none');
                $("#leave2").addClass('d-none');
            } else {
                $("#present1").addClass('d-none');
                $("#present2").addClass('d-none');
                $("#leave1").removeClass('d-none');
                $("#leave2").removeClass('d-none');
            }
        });


        //time picker
        $('input.timepicker').timepicker({
            timeFormat: 'HH:mm',
            showMeridian: false     
        });

    });
</script>
@endsection