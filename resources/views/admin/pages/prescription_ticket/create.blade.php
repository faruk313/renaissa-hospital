@extends('layouts.master')
@section('title','Prescription Ticket Add')
@section('prescription_ticket','active')
@section('prescription_ticket_create','active')
@section('template_css')

<style>
    .row{
        border-color: #888 !important;
        border-width: 2px 2px 2px 2px !important;
    }

    #testTable input, .selectric{
        border-radius: 0 !important;
        height: 35px !important;
    }

    #tab_logic td input, #tab_logic_total td input, #tab_logic_total td option{
        border-radius: 0 !important;
        height: 35px !important;
    }
  
    #tab_logic th{
        height: 40px !important;
    }
    #tab_logic td, #tab_logic_total td, #tab_logic_total th{
        height: 50px !important;
    }
    #patientInfoTable td, #invoiceFooter td{
        height: 50px !important;
    }
    #patientInfoTable tbody tr td input{
        border-radius: 0 !important;
        height: 35px !important;
    }
    .datepicker{
        border-radius: 0 !important;
        height: 35px !important;
    }
    #patientInfo input, #patientInfo select,  #patientInfo .selectric, #patientInfo .select2{
        border-radius: 0 !important;
        height: 35px !important;
        min-height: 35px !important;
        line-height: 35px !important;
    }

    #patientInfo .selectric .label, #patientInfo .selectric .button{
        min-height: 35px !important;
        line-height: 35px !important;
       
    }
    #patientInfo .selectric .button{
        display: none !important;
    }
    
    #patientInfo .select2-selection--single, #testInfo .select2-selection--single, #oldPatient .select2-selection--single{
        border-radius: 0 !important;
        min-height: 35px !important;
    }
 
    
</style>

@endsection
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Patient's Ticket</h4>
                        <div class="btn-group ml-auto">
                            <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                            <a href="{{ route('prescriptionTicket.list') }}" class="btn btn-primary text-white"><i class="fas fa-list mr-2"></i>Lists</a>
                        </div>
                    </div>
                    <form id="prescription_ticket" action="{{ route('prescriptionTicket.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="patient_id" id="patient_id">
                        <input type="hidden" name="doctor_id" id="doctor_id">
                        <input type="hidden" name="person_id" id="person_id">
                        
                        <div class="card-body">
                            <div class="row mx-1" id="patientInfo" style="border: 2px solid #888">
                                <div class="col-md-7">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-md-3 col-form-label mx-0 px-0" for="search_patient">Patient : <a type="button" id="add_new_patient" class="text-success ml-2"><i class="fas fa-plus-circle"></i></a></label>
                                        <div class="col-md-9 mx-0 px-0">
                                            <input type="text" id="search_patient" class="form-control" autocomplete="off">
                                            <div id="patient_search_result" class="search-box" style="display:none"></div>
                                        </div>    
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-sm-5 col-form-label mx-0 px-0" for="ticket_date">Ticket Date : </label>
                                        <div class="col-sm-7 mx-0 px-0">
                                            <input type="text" id="ticket_date" name="ticket_date" class="form-control datepicker" placeholder="--/--/----">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-1" id="patientInfo" style="border: 1px solid #888;border-top: none;">
                                <div class="col-md-4 mx-0">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-sm-4 col-form-label mx-0 px-0">Name:</label>
                                        <div class="col-sm-8 mx-0 px-0">
                                            <input type="text" id="patient_name" name="patient_name" placeholder="---" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-sm-4 col-form-label mx-0 px-0" for="patient_mobile">Mobile : </label>
                                        <div class="col-sm-8 mx-0 px-0">
                                            <input type="text" id="patient_mobile" name="patient_mobile" placeholder="---" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-sm-4 col-form-label mx-0 px-0" for="patient_age">Age : </label>
                                        <div class="col-sm-8  mx-0 px-0">
                                            <input type="number" id="patient_age" name="patient_age" placeholder="--" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mx-0">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-sm-4 col-form-label mx-0 px-0" for="patient_gender">Gender : </label>
                                        <div class="col-sm-8 mx-0 px-0">
                                            <input type="text" id="patient_gender" name="patient_gender" placeholder="--" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-1" id="patientInfo" style="border: 1px solid #888; border-top: none">
                                <div class="col-md-7">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-sm-3 col-form-label mx-0 px-0" for="patient_address">Address : </label>
                                        <div class="col-sm-9 mx-0 px-0">
                                            <input type="text" id="patient_address" name="patient_address" placeholder="---" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-sm-3 col-form-label mx-0 px-0" for="patient_note">Note : </label>
                                        <div class="col-sm-9 mx-0 px-0">
                                            <input type="text" id="patient_note" name="patient_note" placeholder="---" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-1" id="patientInfo" style="border: 1px solid #888; border-top: none">
                                <div class="col-md-7">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-sm-3 col-form-label mx-0 px-0" for="search_doctor">Ref. Doctor :</label>
                                        <div class="col-sm-9 mx-0 px-0">
                                            <input type="text" id="search_doctor" class="form-control" autocomplete="off">
                                            <div id="doctor_search_result" class="search-box" style="display:none"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-sm-4 col-form-label mx-0 px-0" for="search_person">Ref. Broker : <a type="button" id="add_ref_user" class="text-warning ml-2"><i class="fas fa-plus-circle"></i></a></label>
                                        <div class="col-sm-8 mx-0 px-0">
                                            <input type="text" id="search_person" class="form-control" autocomplete="off">
                                            <div id="person_search_result" class="search-box" style="display:none"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if ($doctors->count()>0)
                                <div class="row mx-1 mt-2" id="testTable" style="border: 1px solid #888">
                                    <div class="col-md-12 mt-2">
                                        <table class="table table-bordered table-hover" id="tab_logic">
                                            <thead>
                                                <tr class="text-center">
                                                    <th class="text-center" width="40%">Particular/Service</th>
                                                    <th class="text-center" width="15%">Room&nbsp;No.</th>
                                                    <th class="text-center" width="15%">Serial&nbsp;No.</th>
                                                    {{--  <th class="text-center" width="30%">Time</th>  --}}
                                                    <th class="text-center" width="30%">Fees&nbsp;(BDT)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="offset-8 col-4">
                                        <table class="table table-bordered table-hover" id="tab_logic_total">
                                            <tbody>
                                                <tr>
                                                    <th class="text-right">Discount(%) :</th>
                                                    <td class="text-center">
                                                        <input type="number" class="form-control" id="discount" name="discount" placeholder="00" min="0" max="100">
                                                        <input type="hidden" class="form-control" name="discount_amount" id="discount_amount">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="text-right" width="50%">Total Amount :</th>
                                                    <td class="text-center" width="50%"><input type="number" name='total_amount' value='00' class="form-control" id="total_amount" readonly/></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-right">Cach Received :</th>
                                                    <td class="text-center">
                                                        <input type="number" class="form-control" id="cash_received" placeholder="00" min="0" required="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="text-right">Due Amount :</th>
                                                    <td class="text-center"><input type="number" name='due_amount' id="due_amount" value='00' class="form-control" readonly/></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-right">Return Amount :</th>
                                                    <input type="hidden" name="paid_amount" id="paid_amount">
                                                    <td class="text-center"><input type="number" name="return_amount" id="return_amount" value='00' class="form-control" readonly/></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mx-1 mt-2" style="border: 1px solid #888;">
                                    <div class="col-md-8" style="border-right: 2px solid #888">
                                        <p class="pt-2"><span class="float-left font-weight-bold mr-2">Invoice Date/Time:</span> <span class="" id="invoice_date"></span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="pt-2"><span class="float-left font-weight-bold mr-2">Authorized By:</span> <span class="">{{ Auth::user()->name }}</span></p>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-center font-weight-bold py-5">No Doctor Found.. Please Create Doctor First...</p>
                                    </div>
                                </div>    
                            @endif
                        </div>
                        @if ($doctors->count()>0)
                        <div class="card-footer mb-4">
                            <button type="submit" class="btn btn-warning float-right text-white"><i class="fas fa-print"></i> Submit</button>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add New Patient -->
    <div class="modal fade" id="patient_modal" tabindex="-1" role="dialog" aria-labelledby="patient_modal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-indigo">
                    <h5 class="modal-title" id="patient_modal">Add New Patient</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="patient_form">
                    <div class="modal-body">
                        <input type="hidden" name="_method" id="method" value="POST">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="patient_name">Full Name<span class="text-danger">&nbsp;*</span></label>
                                    <input type="text" name="patient_name" id="patient_name" class="form-control" value="{{old('patient_name')}}" placeholder="-----" required="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="patient_mobile">Mobile Number<span class="text-danger">&nbsp;*</span></label>
                                    <input type="tel" name="patient_mobile" id="patient_mobile" class="form-control" value="{{old('patient_mobile')}}" placeholder="-----" required="">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="patient_age">Age<span class="text-danger">&nbsp;*</span></label>
                                    <input type="number" name="patient_age" id="patient_age" class="form-control" value="{{old('patient_age')}}" placeholder="--" required="" min="0" max="99">
                                </div>
                            </div>
                            <div class="col-md-3 p-1">
                                <div class="form-group">
                                    <label for="patient_gender" class="d-block">Gender<span class="text-danger">&nbsp;*</span></label>
                                    <div class="custom-control custom-radio custom-control-inline mt-1">
                                        <input type="radio" id="patient_gender1" name="patient_gender" class="custom-control-input" value="1" checked>
                                        <label class="custom-control-label" for="patient_gender1">Female</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mt-1">
                                        <input type="radio" id="patient_gender2" value="0" name="patient_gender" class="custom-control-input">
                                        <label class="custom-control-label" for="patient_gender2">Male</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="patient_address">Address</label>
                                    <input type="text" name="patient_address" id="patient_address" class="form-control" value="{{old('patient_address')}}" placeholder="-----">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="patient_note">Note</label>
                                    <input type="text" name="patient_note" id="patient_note" class="form-control" value="{{old('patient_note')}}" placeholder="-----">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-white">
                        <button type="button" class="btn btn-danger float-left" data-dismiss="modal" id="cancel_button"><i class="fas fa-times"></i> Close</button>
                        <button type="submit" id="patient_add_button" class="btn btn-success waves-effect float-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Ref. User -->
    <div class="modal fade" id="user_modal" tabindex="-1" role="dialog" aria-labelledby="user_modal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-indigo">
                    <h5 class="modal-title" id="user_modal">Add New Broker</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="user_form" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="_method" value="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ref_person_name">Broker Name <span class="text-danger">&nbsp;*</span></label>
                                <input type="text" id="ref_person_name" name="ref_person_name" class="form-control" placeholder="---" required="">
                                <div class="invalid-feedback">
                                    Oh no! Broker Name?
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ref_person_mobile">Broker Mobile <span class="text-danger">&nbsp;*</span></label>
                                <input type="tel" id="ref_person_mobile" name="ref_person_mobile" class="form-control" placeholder="---" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ref_person_com">Broker Commission(%) <span class="text-danger">&nbsp;*</span></label>
                                <input type="number" id="ref_person_com" name="ref_person_com" class="form-control" placeholder="--" required="" min="0" max="100">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ref_person_note">Note</label>
                                <input type="text" id="ref_person_note" name="ref_person_note" class="form-control" placeholder="---">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-white">
                        <button type="button" class="btn btn-danger float-left" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                        <button type="submit" id="user_add_button" class="btn btn-success waves-effect float-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('page_js')

<script>
    $(document).ready(function(){
        invoice_date();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#ticket_date").on('change', function(event) {
            event.preventDefault();
            var ticket_date = $('#ticket_date').val();
            $('#doctor_search_result').css('display','none');
            $('#patientInfo #search_doctor').val('');
            $('#doctor_id').val('');
            $('#tab_logic tbody').addClass('d-none');
            reset_calc();
            
        });
        //searching doctor
        $('#search_doctor').on('keyup',function(){
            $('#patient_search_result').css('display','none');
            $('#person_search_result').css('display','none');
            $('#tab_logic tbody').addClass('d-none');
            reset_calc();

            var action_url = "{{ route('prescriptionTicket.searchDoctor') }}";
            var value=$(this).val();
            var ticket_date = $('#ticket_date').val();
            
            if(value.length >= '2'){
                $.ajax({
                    type : 'get',
                    url : action_url,
                    data:{'search':value, 'ticket_date':ticket_date},

                    success:function(data){
                        $('#doctor_search_result').css('display','block');
                        $('#doctor_search_result').html(data);
                    }
                });
            }
            else{
                $('#doctor_search_result').html('');
                $('#doctor_search_result').css('display','none');
            }
        })

        //searching patient
        $('#search_patient').on('keyup',function(){
            $('#doctor_search_result').css('display','none');
            $('#person_search_result').css('display','none');
            $('#patient_id').val('');
            $('#patient_name').val('');
            $('#patient_mobile').val('');
            $('#patient_age').val('');
            $('#patient_address').val('');
            $('#patient_note').val('');
            $("#patient_gender").val('');

            var action_url = "{{ route('prescriptionTicket.searchPatient') }}";
            var value=$(this).val();
            if(value.length >= '2'){
                $.ajax({
                    type : 'get',
                    url : action_url,
                    data:{'search':value},

                    success:function(data){
                        $('#patient_search_result').css('display','block');
                        $('#patient_search_result').html(data);
                    }
                });
            }
            else{
                $('#patient_search_result').html('');
                $('#patient_search_result').css('display','none');
            } 
        })

        //searching broker person
        $('#search_person').on('keyup',function(){
            $('#doctor_search_result').css('display','none');
            $('#patient_search_result').css('display','none');

            var action_url = "{{ route('prescriptionTicket.searchPerson') }}";
            var value=$(this).val();
            if(value.length >= '2'){
                $.ajax({
                    type : 'get',
                    url : action_url,
                    data:{'search':value},

                    success:function(data){
                        $('#person_search_result').css('display','block');
                        $('#person_search_result').html(data);
                    }
                });
            }
            else{
                $('#person_search_result').html('');
                $('#person_search_result').css('display','none');
            } 
        })
        
        //initialize variables for adding new patient and broker
        var patient_modal = $('#patient_modal')
        var patient_form = $('#patient_form')
        var patient_add_button = $('#patient_add_button')

        var user_modal = $('#user_modal')
        var user_form = $('#user_form')
        var user_add_button = $('#user_add_button')

        //modal reset
        $('.modal').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
            patient_add_button.removeClass('btn-progress')
            user_add_button.removeClass('btn-progress')
        })

        //add new patient
        $('#add_new_patient').click(function(){
            patient_modal.modal('show');
            $('#patient_search_result').html('');
            $('#patient_search_result').css('display','none');
        });

        //add new broker
        $('#add_ref_user').click(function(){
            user_modal.modal('show');
            $('#person_search_result').html('');
            $('#person_search_result').css('display','none');

        });

        //new patient add form
        patient_form.on('submit', function(event){
            event.preventDefault()
            var url = '{{ route("prescriptionTicket.newPatient") }}'
            $.ajax({
                url:url,
                method: "POST",
                data: $(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                    patient_modal.find('.modal-title').text('Sending ...')
                    patient_add_button.addClass('btn-progress');
                },
                success:function(data)
                {
                    if(data.errors)
                    {
                        for(var count = 0; count < data.errors.length; count++)
                        {
                            iziToast.error({
                                title: 'Error!',
                                message: data.errors[count],
                                position: 'topRight'
                            });
                        }
                        patient_add_button.removeClass('btn-progress');
                        patient_modal.find('.modal-title').text('! Error ...')
                    }
                    if(data.success)
                    {
                        var patient = data.patient;
                        var patient_gender = patient.patient_gender;
                        if(patient_gender==1){
                            var gender = 'Male'
                        }
                        if(patient_gender==0){
                            var gender = 'Female'
                        }
                        var patient_name =  $('#patient_form #patient_name').val();
                        $('#prescription_ticket #search_patient').val(patient.patient_id);
                        $('#prescription_ticket #patient_name').val(patient.patient_name);
                        $('#prescription_ticket #patient_id').val(patient.id);
                        $('#prescription_ticket #patient_mobile').val(patient.patient_mobile);
                        $('#prescription_ticket #patient_age').val(patient.patient_age);
                        $('#prescription_ticket #patient_note').val(patient.patient_note);
                        $('#prescription_ticket #patient_address').val(patient.patient_address);
                        $('#prescription_ticket #patient_gender').val(gender);
                       
                        setTimeout(function(){
                            iziToast.success({
                                title: 'Success!',
                                message: data.success,
                                position: 'topRight'
                            })
                            patient_modal.find('.modal-title').text('Successful')
                            patient_form[0].reset();
                            patient_add_button.removeClass('btn-progress')
                            patient_modal.modal('toggle')
                        }, 500);
                    }    
                }
            })
        })

        //new broker add form action
        user_form.on('submit', function(event){
            event.preventDefault()
            var url = '{{ route("prescriptionTicket.newBroker") }}'
            $.ajax({
                url:url,
                method: "POST",
                data: $(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                    user_modal.find('.modal-title').text('Sending ...')
                    user_add_button.addClass('btn-progress');
                },
                success:function(data)
                {
                    if(data.errors)
                    {
                        for(var count = 0; count < data.errors.length; count++)
                        {
                            iziToast.error({
                                title: 'Error!',
                                message: data.errors[count],
                                position: 'topRight'
                            });
                        }
                        user_add_button.removeClass('btn-progress');
                        user_modal.find('.modal-title').text('! Error ...')
                    }
                    if(data.success)
                    {
                        var broker = data.broker;
                        var ref_user_name =  $('#user_form #ref_person_name').val();
                        $('#search_person').val(ref_user_name);
                        $('#prescription_ticket #person_id').val(broker.id);
                        $('#prescription_ticket #search_person').val(broker.ref_user_name);
                
                        setTimeout(function(){
                            iziToast.success({
                                title: 'Success!',
                                message: data.success,
                                position: 'topRight'
                            })
                            user_modal.find('.modal-title').text('Successful')
                            user_form[0].reset();
                            user_add_button.removeClass('btn-progress')
                            user_modal.modal('toggle')
                        }, 500);
                    }    
                }
            })
        })

        //adding doctor after search select 
        $(document).on('click', '#add_doctor', function(){
            var doctor_id = $(this).data('id');
            var doctor_name = $(this).data('name');
            var doctor_fees = $(this).data('fees');
            var doctor_chamber = $(this).data('chamber');
            var serial_no = $(this).data('serial_no');
         
            $('#prescription_ticket #doctor_id').val(doctor_id);
            $('#prescription_ticket #search_doctor').val(doctor_name);
            
            $('#doctor_search_result').html('');
            $('#doctor_search_result').css('display','none');
            
            var trOutput = 
            ` 
            <tr class="text-center">
                <td>Doctor Prescription</td>
                <td>`+doctor_chamber+`</td>
                <td>`+serial_no+`</td>
                <td id="doctor_fees">`+doctor_fees+`</td>
                <input type="hidden" id="doctor_fees" name="doctor_fees" value="`+doctor_fees+`" class="form-control">
            </tr>
            `;
            $('#tab_logic tbody').removeClass('d-none');
            $('#tab_logic tbody').html(trOutput);
            calc_total();
        });

        //broker search select
        $(document).on('click', '#add_person', function(){
            var person_id = $(this).data('id');
            var person_name = $(this).data('name');
            
            $('#prescription_ticket #person_id').val(person_id);
            $('#prescription_ticket #search_person').val(person_name);
           
            $('#person_search_result').html('');
            $('#person_search_result').css('display','none');
        });

        //patient search select
        $(document).on('click', '#add_patient', function(){
            var id = $(this).data('id');
            var patient_id = $(this).data('pid');
            var patient_name = $(this).data('name');
            var patient_mobile = $(this).data('mobile');
            var patient_age = $(this).data('age');
            var patient_gender = $(this).data('gender');
            var patient_address = $(this).data('address');
            var patient_note = $(this).data('note');

            if(patient_gender ==0){
                gender ="Female";
            }
            if(patient_gender ==1){
                gender = "Male";
            }
        
            $('#prescription_ticket #patient_id').val(id);
            $('#prescription_ticket #patient_name').val(patient_name);
            $('#prescription_ticket #patient_mobile').val(patient_mobile);
            $('#prescription_ticket #patient_age').val(patient_age);
            $('#prescription_ticket #patient_address').val(patient_address);
            $('#prescription_ticket #patient_note').val(patient_note);
            $('#prescription_ticket #patient_gender').val(gender);
            $('#patient_search_result').html('');
            $('#patient_search_result').css('display','none');
            $('#search_patient').val(patient_id);
        });

        //call total function on change discount
        $('#discount').on('keyup change',function(){
            calc_total();
        });
        
        //call total function on change cash amount received
        $('#cash_received').on('keyup change',function(){
            calc_total();
        });

    });
    function reset_calc(){
        $('#cash_received').val('');
        $('#due_amount').val('');
        $('#return_amount').val('');
        $('#paid_amount').val('');
        $('#total_amount').val('');
        $('#discount').val('');
    }

    function calc_total()
    {
        var cash_received = 0
        var due_amount= 0
        var return_amount= 0
        var paid_amount= 0
        var total_amount= 0
        var discount = 0

        var doctor_fees= $('#doctor_fees').text();
        doctor_fees= parseInt(doctor_fees);
        $('#total_amount').val(doctor_fees);

        var discount= $('#discount').val();
        var total_amount= $('#total_amount').val();
        
        discount= $('#discount').val();

        if(discount==''){
            discount = 0;
        }

        if(discount>100){
            alert('Discount Could Not Greater Than 100 %')
        }
        if(discount<0){
            alert('Discount Could Not Be Negative')
        }
        if(discount>=0 && discount<=100){
            total_amount = total_amount - (total_amount/100*discount);
            total_amount = Math.round(total_amount);
        }
        $('#total_amount').val(total_amount);

        cash_received= $('#cash_received').val();
        due_amount = total_amount - cash_received;
        if(due_amount<0){
            due_amount=0;
            $('#due_amount').val(due_amount);
            return_amount =  cash_received - total_amount;
            $('#return_amount').val(return_amount);
        }
        if(due_amount>=0){
            $('#due_amount').val(due_amount);
            $('#return_amount').val(return_amount);
        }
        
        paid_amount = cash_received - return_amount;
        $('#paid_amount').val(paid_amount);
        $('#discount_amount').val(discount);
    };

    //invoice date generate
    function invoice_date() {
        var currentdate = new Date(); 
        var invoice_date = currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/" 
                + currentdate.getFullYear() + " @ "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();
       $('#invoice_date').html(invoice_date);
    };
  </script> 
@endsection
