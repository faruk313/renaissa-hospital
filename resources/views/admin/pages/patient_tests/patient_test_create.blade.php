@extends('layouts.master')
@section('title','Patient Pathology Test Add')
@section('test_invoices','active')
@section('test_invoice_add','active')
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
                        <h4>Patient's Pathology Test</h4>
                        <div class="btn-group ml-auto">
                            <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                            <a href="{{ route('patientTests.lists') }}" class="btn btn-primary text-white"><i class="fas fa-list mr-2"></i>Lists</a>
                        </div>
                    </div>
                    <form id="patient_test" action="{{ route('patientTests.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="patient_id" id="patient_id">
                        <input type="hidden" name="doctor_id" id="doctor_id">
                        <input type="hidden" name="person_id" id="person_id">
                        <div class="card-body">
                            <div class="row mx-1" id="patientInfo" style="border: 2px solid #888">
                                <div class="col-md-7">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-md-3 col-form-label mx-0 px-0" for="search_patient">Patient : <a type="button" id="add_patient" class="text-success ml-2"><i class="fas fa-plus-circle"></i></a></label>
                                        <div class="col-md-9 mx-0 px-0">
                                            <input type="text" id="search_patient" class="form-control" autocomplete="off">
                                            <div id="patient_search_result" class="search-box" style="display:none"></div>
                                        </div>    
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-sm-4 col-form-label mx-0 px-0" for="test_date">Test's Date : </label>
                                        <div class="col-sm-8 mx-0 px-0">
                                            <input type="text" id="test_date" name="test_date" class="form-control datepicker" placeholder="--/--/----">
                                            <input type="hidden" name="delivery_date" id="delivery_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-1" id="patientInfo" style="border: 1px solid #888; border-top: none">
                                <div class="col-md-7">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-sm-3 col-form-label mx-0 px-0" for="search_doctor">Ref. Doctor : <a type="button" id="add_doctor" class="text-info ml-2"><i class="fas fa-plus-circle"></i></a></label>
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
                                            <input type="text" id="search_person" class="form-control"  autocomplete="off">
                                            <div id="person_search_result" class="search-box" style="display:none"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($tests->count()>0)
                                <div class="row my-2 mx-1" id="testTable" style="border: 1px solid #888">
                                    <div class="col-md-12 pt-2" id="testInfo">
                                        <div class="form-group mx-0 py-2 mb-2">
                                            <input type="text" id="search_test" class="form-control" placeholder="search pathology test ...">
                                            <div id="test_search_result" class="search-box" style="display:none"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <table class="table table-bordered table-hover" id="tab_logic">
                                            <thead>
                                                <tr>
                                                    {{-- <th class="text-center" width="5%"> # </th> --}}
                                                    <th class="text-center" width="20%">Test&nbsp;Code</th>
                                                    <th class="text-center" width="40%">Test&nbsp;Name</th>
                                                    <th class="text-center" width="10%">Room&nbsp;No.</th>
                                                    <th class="text-center" width="10%">Rate</th>
                                                    <th class="text-center" width="5%">Dis.(%)</th>
                                                    <th class="text-center" width="10%">Net</th>
                                                    <th class="text-center" width="5%"> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                    <div class="offset-8 col-4">
                                        <table class="table table-bordered table-hover" id="tab_logic_total">
                                            <tbody>
                                                <tr>
                                                    <th class="text-right" width="50%">Net Amount :</th>
                                                    <td class="text-center" width="50%"><input type="number" name='payable_amount' placeholder='00' class="form-control" min="0" id="sub_total" readonly/></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-right" width="50%">Discount (%):</th>
                                                    <td class="text-center" width="50%"><input type="number"  placeholder='00' class="form-control" id="discount" min="0" max="100"></td>
                                                    <input type="hidden" id="discount_amount" name="discount">
                                                </tr>
                                                <tr>
                                                    <th class="text-right" width="50%">Total Amount :</th>
                                                    <td class="text-center" width="50%"><input type="number" name='total_amount' placeholder='00' class="form-control" id="total" readonly/></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-right">Cach Received :</th>
                                                    <td class="text-center">
                                                        <input type="number" class="form-control" name="cash_received" id="cash_received" placeholder="00" min="0" required="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="text-right">Due Amount :</th>
                                                    <td class="text-center"><input type="number" name='due_amount' id="due_amount" placeholder='00' class="form-control" readonly/></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-right">Return Amount :</th>
                                                    <td class="text-center"><input type="number" name="return_amount" id="return_amount" placeholder='00' class="form-control" readonly/></td>
                                                </tr>
                                                <input type="hidden" name="paid_amount" id="paid_amount">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mx-1" style="border: 1px solid #888;">
                                    <div class="col-md-4 mx-0" style="border-right: 2px solid #888">
                                        <p class="pt-2"><span class="float-left font-weight-bold mr-2">Bill Date/Time :</span> <span class="" id="invoice_date"></span></p>
                                    </div>
                                    <div class="col-md-4 mx-0" style="border-right: 2px solid #888">
                                        <p class="pt-2 mx-0"><span class="float-left font-weight-bold mr-1 px-0 mx-0">Delivery Date/Time :</span> <span class="mx-0 px-0" id="delivery_date_time"></span></p>
                                    </div>
                                    <div class="col-md-4 mx-0">
                                        <p class="pt-2"><span class="float-left font-weight-bold mr-2">Authorized By :</span> <span class="">{{ Auth::user()->name }}</span></p>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                   <div class="col-md-12">
                                        <p class="text-center font-weight-bold py-5">No Pathlogy Test Found.. Please Create Pathlogy Test First...</p>
                                   </div>
                                </div>
                            @endif
                        </div>
                        @if($tests->count()>0)
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
    <!-- Add New Doctor -->
    <div class="modal fade" id="doctor_modal" tabindex="-1" role="dialog" aria-labelledby="doctor_modal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-indigo">
                    <h5 class="modal-title" id="doctor_modal">Add New Doctor (Outside)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="doctor_form" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="_method" value="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="doctor_name">Doctor Full Name<span class="text-danger">&nbsp;*</span></label>
                                <input type="text" id="doctor_name" name="doctor_name" class="form-control" placeholder="---" required="">
                                <div class="invalid-feedback">
                                    Doctor Full Name ?
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="doctor_degrees">Speciality/Degrees</label>
                                <input type="text" id="doctor_degrees" name="doctor_degrees" class="form-control" placeholder="---" required="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-white">
                        <button type="button" class="btn btn-danger float-left" data-dismiss="modal" id="cancel_button"><i class="fas fa-times"></i> Close</button>
                        <button type="submit" id="doctor_add_button" class="btn btn-success waves-effect float-right">Submit</button>
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
                                <label for="ref_person_com">Broker Commission <span class="text-danger">&nbsp;*</span></label>
                                <input type="number" id="ref_person_com" name="ref_person_com" class="form-control" placeholder="---" required="" min="0" max="100">
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //initialize modal, form and button
        var patient_modal = $('#patient_modal')
        var patient_form = $('#patient_form')
        var patient_add_button = $('#patient_add_button')

        
        var doctor_modal = $('#doctor_modal')
        var doctor_form = $('#doctor_form')
        var doctor_add_button = $('#doctor_add_button')

        var user_modal = $('#user_modal')
        var user_form = $('#user_form')
        var user_add_button = $('#user_add_button')

        //modal reset
        $('.modal').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
            patient_add_button.removeClass('btn-progress')
            doctor_add_button.removeClass('btn-progress')
            user_add_button.removeClass('btn-progress')
        })

        //open new patient modal
        $('#add_patient').click(function(){
            patient_modal.modal('show');
        });

        //open new doctor modal
        $('#add_doctor').click(function(){
            doctor_modal.modal('show');
        });

        //open new broker modal
        $('#add_ref_user').click(function(){
            user_modal.modal('show');
        });

        //new patient add form submit
        patient_form.on('submit', function(event){
            event.preventDefault()
            var url = '{{ route("patientTests.newPatient") }}'
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
                        $('#patient_test #patient_id').val(patient.id); 
                        $('#search_patient').val(patient.patient_name);
                      
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

        //new doctor add form submit
        doctor_form.on('submit', function(event){
            event.preventDefault()
            var url = '{{ route("patientTests.newDoctor") }}'
            $.ajax({
                url:url,
                method: "POST",
                data: $(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                    doctor_modal.find('.modal-title').text('Sending ...')
                    doctor_add_button.addClass('btn-progress');
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
                        doctor_add_button.removeClass('btn-progress');
                        doctor_modal.find('.modal-title').text('! Error ...')
                    }
                    if(data.success)
                    {
                        var doctor = data.doctor;   
                        $('#patient_test #doctor_id').val(doctor.id); 
                        $('#search_doctor').val(doctor.name);
                      
                        setTimeout(function(){
                            iziToast.success({
                                title: 'Success!',
                                message: data.success,
                                position: 'topRight'
                            })
                            doctor_modal.find('.modal-title').text('Successful')
                            doctor_form[0].reset();
                            doctor_add_button.removeClass('btn-progress')
                            doctor_modal.modal('toggle')
                        }, 500);
                    }    
                }
            })
        })

        //new broker add form submit
        user_form.on('submit', function(event){
            event.preventDefault()
            var url = '{{ route("patientTests.newUser") }}'
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
                        $('#patient_test #person_id').val(broker.id); 
                        $('#search_person').val(broker.ref_user_name);
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

        //add test
        $(document).on('click', '#add_test', function(){
            var test_id = $(this).data('id');
            var test_code = $(this).data('code');
            var test_name = $(this).data('name');
            var test_room = $(this).data('room');
            var test_duration = $(this).data('duration');
            var test_price = $(this).data('price');
            var patient_discount = $(this).data('discount');
            
            var trOutput = 
            `   <tr id="addr">
                    <td class="test-duration d-none">`+test_duration+`</td>
                    <input type="hidden" name="test_ids[]" value="`+test_id+`">
                    <td><input type="text" name='test_codes[]' id="test_code" class="form-control" value="`+test_code+`" readonly></td>
                    <td><input type="text" name='test_names[]' id="test_name" class="form-control" value="`+test_name+`" readonly></td>
                    <td><input type="text" name='test_rooms[]' id="test_room" class="form-control" value="`+test_room+`" readonly></td>
                    <td><input type="number" name='test_prices[]' id="test_price" class="form-control rate" value="`+test_price+`" readonly/></td>
                    <td><input type="number" name='test_discounts[]' id="patient_discount" class="form-control" value="`+patient_discount+`" readonly/></td>
                    <td><input type="number" name='test_net_amounts[]' id="net_amount" class="form-control net_amount" placeholder="00" readonly/></td>
                    <td class="text-center"><a type="button" id="delete_row"><i class="fas fa-minus-circle text-danger"></i></a></td>
                </tr>
            `;
            $('#tab_logic tbody').append(trOutput);
            $('#test_search_result').html('');
            $('#test_search_result').css('display','none');
            $('#search_test').val('');
            calc();
            calc_total();
            maxDuration();
        });

        //delete test
        $(document).on('click', '#delete_row', function () {
            $(this).closest('#addr').remove();  
            calc_total(); 
            maxDuration();
        });

        //add new doctor
        $(document).on('click', '#add_doctor', function(){
            var doctor_id = $(this).data('id');
            var doctor_name = $(this).data('name');
           
            $('#patient_test #doctor_id').val(doctor_id);
            $('#patient_test #search_doctor').val(doctor_name);
            
            $('#doctor_search_result').html('');
            $('#doctor_search_result').css('display','none');
        });


        //add new broker
        $(document).on('click', '#add_person', function(){
            var person_id = $(this).data('id');
            var person_name = $(this).data('name');
            
            $('#patient_test #person_id').val(person_id);
            $('#patient_test #search_person').val(person_name);
           
            $('#person_search_result').html('');
            $('#person_search_result').css('display','none');
        });


        //add new patient
        $(document).on('click', '#add_patient', function(){
            var patient_id = $(this).data('id');
            var patient_name = $(this).data('name');

            $('#patient_test #patient_id').val(patient_id);
            $('#patient_test #search_patient').val(patient_name);
            
            $('#patient_search_result').html('');
            $('#patient_search_result').css('display','none');
        });

        //getting discount value
        $('#discount').on('keyup change',function(){
            calc_total();
        });
        
        //getting cash received value
        $('#cash_received').on('keyup change',function(){
            calc_total();
        });

    });

    //searching test
    $('#search_test').on('keyup',function(){
        $('#patient_search_result').css('display','none');
        $('#doctor_search_result').css('display','none');
        $('#person_search_result').css('display','none');

        var action_url = "{{ route('patientTests.searchTest') }}";
        var value=$(this).val();
        if(value.length >= '2'){
            $.ajax({
                type : 'get',
                url : action_url,
                data:{'search':value},

                success:function(data){
                    $('#test_search_result').css('display','block');
                    $('#test_search_result').html(data);
                }
            });
        }
        else{
            $('#test_search_result').css('display','none');
            $('#test_search_result').html('');
        }
        
    })

    //searching doctor
    $('#search_doctor').on('keyup',function(){
        $('#patient_search_result').css('display','none');
        $('#test_search_result').css('display','none');
        $('#person_search_result').css('display','none');

        var action_url = "{{ route('patientTests.searchDoctor') }}";
        var value=$(this).val();
        if(value.length >= '2'){
            $.ajax({
                type : 'get',
                url : action_url,
                data:{'search':value},

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
        $('#test_search_result').css('display','none');
        $('#doctor_search_result').css('display','none');
        $('#person_search_result').css('display','none');

        $('#patient_id').val('');
       
        var action_url = "{{ route('patientTests.searchPatient') }}";
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

    //searching broker
    $('#search_person').on('keyup',function(){
        $('#test_search_result').css('display','none');
        $('#doctor_search_result').css('display','none');
        $('#patient_search_result').css('display','none');

        var action_url = "{{ route('patientTests.searchPerson') }}";
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

    //calculate test 
    function calc()
    {
        $('#tab_logic tbody tr').each(function(i, element) {
            var html = $(this).html();
            var net_amount=0;
            if(html!='')
            {
                var patient_discount = $(this).find('#patient_discount').val();
                var rate = $(this).find('.rate').val();
                net_amount = rate - (rate/100*patient_discount);
                net_amount = Math.round(net_amount);
                $(this).find('#net_amount').val(net_amount);
                calc_total();
            }
        });
    }

    //calculate total
    function calc_total()
    {
        var sub_total=0;
        var total=0;
        var cash_received=0;
        var due_amount=0;
        var return_amount=0;
        var paid_amount=0;
        var discount=0;

        $('.net_amount').each(function() {
            sub_total += parseInt($(this).val());
        });
        $('#sub_total').val(sub_total);

        discount= $('#discount').val();

        if(discount==''){
            discount = 0;
        }
        if(discount>100){
            total = 0;
            alert('Discount Could Not Greater Than 100 %')
        }
        if(discount<0){
            total = 0;
            discount = 0;
            alert('Discount Could Not Be Negative')
        }
        if(discount>=0 && discount<100){
            total = sub_total - (sub_total/100*discount);
            total = Math.round(total);
        }
        $('#total').val(total);

        cash_received= $('#cash_received').val();

        due_amount = total - cash_received;
       
        if(due_amount<0){
            due_amount=0;
            $('#due_amount').val(due_amount);
            return_amount =  cash_received - total;
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
    
    
    //get test date and calling delivery date
    $('#test_date').on('change',function() { 
        maxDuration();
    });

    //calculate delivery date and invoice date
    function maxDuration() {
        var max=0,el,val;
        $(".test-duration").each(function(){
            val = parseInt($(this).text());
            if(val>max) {
            max = val;
            el = $(this);
            }
        });
        var test_date = $('#test_date').val();
        var currentdate = new Date(); 
        var invoice_date = currentdate.getDate() + "/"
                + ( '0' + (currentdate.getMonth()+1) ).slice( -2 ) + "/" 
                + currentdate.getFullYear() + " @ "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();

        var newDate = new Date(test_date);
        
        if(max==0){
            $('#delivery_date').html('');
        }
        if(max>0){
            newDate.setDate(newDate.getDate() + max);
            
            var deliveryDate = newDate.getFullYear()+"-"
                + ( '0' + (newDate.getMonth()+1) ).slice( -2 )+"-" 
                +  ( '0' + (newDate.getDate()+1) ).slice( -2 );
                
            var deliveryDateTime = ( '0' + (newDate.getDate()+1) ).slice( -2 ) + "/"
                + ( '0' + (newDate.getMonth()+1) ).slice( -2 )  + "/" 
                + newDate.getFullYear() + " @ " +"5 PM";
        }

       $('#delivery_date').val(deliveryDate);
       $('#invoice_date').html(invoice_date);
       $('#delivery_date_time').html(deliveryDateTime);
    }

  </script> 
@endsection
