@extends('layouts.master')
@section('title','Patient Pathology Test Add')
@section('patient_tests','active')
@section('patient_test_create','active')
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
    .select2, .selectric, input, .datepicker{
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
 
    .search-box{
        z-index:4000 !important;
        position:absolute; 
        width:93%;
        overflow:auto;
        height:auto;
        max-height:220px;
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
                    </div>
                    <form action="{{ route('patientTests.store') }}" method="POST">
                        <input type="hidden" name="patient_id" id="patient_id" value="">
                        <input type="hidden" name="doctor_id" id="doctor_id" value="">
                        <input type="hidden" name="person_id" id="person_id" value="">
                        @csrf
                        <div class="card-body">
                            <div class="row mx-1" id="patientInfo" style="border: 2px solid #888">
                                <div class="col-md-7">
                                    <div class="form-group row py-2 mb-0">
                                        <label class="col-md-3 col-form-label" for="search_patient">Search Patient :</label>
                                        <div class="col-md-9">
                                            <input type="text" id="search_patient" class="form-control">
                                            <div id="patient_search_result" class="search-box" style="display:none"></div>
                                        </div>    
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-sm-4 col-form-label mx-0 px-0" for="test_date">Test's Date : </label>
                                        <div class="col-sm-8 mx-0 px-0">
                                            <input type="text" id="test_date" name="test_date" class="form-control datepicker" placeholder="--/--/----">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-1" id="patientInfo" style="border: 1px solid #888;border-top: none;">
                                <div class="col-md-4 mx-0">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-sm-4 col-form-label mx-0 px-0">Name:</label>
                                        <div class="col-sm-8 mx-0 px-0">
                                            <input type="text" id="patient_name" name="patient_name" placeholder="---" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-sm-4 col-form-label mx-0 px-0" for="patient_mobile">Mobile : </label>
                                        <div class="col-sm-8 mx-0 px-0">
                                            <input type="text" id="patient_mobile" name="patient_mobile" placeholder="---" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-sm-4 col-form-label mx-0 px-0" for="patient_age">Age : </label>
                                        <div class="col-sm-8  mx-0 px-0">
                                            <input type="number" id="patient_age" name="patient_age" placeholder="--" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mx-0">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-sm-4 col-form-label mx-0 px-0" for="patient_gender">Gender : </label>
                                        <div class="col-sm-8 mx-0 px-0">
                                            <select name="patient_gender" id="patient_gender" class="form-control selectric">
                                                <option value="">--</option>
                                                <option value="0">Male</option>
                                                <option value="1">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-1" id="patientInfo" style="border: 1px solid #888; border-top: none">
                                <div class="col-md-7">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-sm-3 col-form-label mx-0 px-0" for="patient_address">Address : </label>
                                        <div class="col-sm-9 mx-0 px-0">
                                            <input type="text" id="patient_address" name="patient_address" placeholder="---" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-sm-3 col-form-label mx-0 px-0" for="patient_note">Note : </label>
                                        <div class="col-sm-9 mx-0 px-0">
                                            <input type="text" id="patient_note" name="patient_note" placeholder="---" class="form-control">
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
                                    {{-- <div class="form-group row m-0 py-2">
                                        <label for="doctor_name" class="col-md-3 col-form-label mx-0 px-0">Doctor Name :</label>
                                        <div class="col-md-9 mx-0 px-0">
                                            <input type="text" name="doctor_name" id="doctor_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row m-0 py-2">
                                        <label for="doctor_degrees" class="col-md-3 col-form-label mx-0 px-0">Degrees :</label>
                                        <div class="col-md-9 mx-0 px-0">
                                            <input type="text" name="doctor_degrees" id="doctor_degrees" class="form-control">
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-sm-4 col-form-label mx-0 px-0" for="search_person">Ref. Person : <a type="button" id="add_ref_user" class="text-danger ml-2"><i class="fas fa-plus-circle"></i></a></label>
                                        <div class="col-sm-8 mx-0 px-0">
                                            <input type="text" id="search_person" class="form-control"  autocomplete="off">
                                            <div id="person_search_result" class="search-box" style="display:none"></div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row m-0 py-2">
                                        <label for="person_name" class="col-md-4 col-form-label mx-0 px-0">Person Name :</label>
                                        <div class="col-md-8 mx-0 px-0">
                                            <input type="text" name="person_name" id="person_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row m-0 py-2">
                                        <label for="person_mobile" class="col-md-4 col-form-label mx-0 px-0">Mobile :</label>
                                        <div class="col-md-8 mx-0 px-0">
                                            <input type="tel" name="person_mobile" id="person_mobile" class="form-control">
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
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
                                                <th class="text-center" width="20%">Test Code</th>
                                                <th class="text-center" width="40%">Test Name</th>
                                                <th class="text-center" width="10%">Room No.</th>
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
                                                <td class="text-center" width="50%"><input type="number" name='sub_total' value='00' class="form-control" min="0" id="sub_total" readonly/></td>
                                            </tr>
                                            <tr>
                                                <th class="text-right" width="50%">Discount (%):</th>
                                                <td class="text-center" width="50%"><input type="number" name='discount' value='0' class="form-control" id="discount" min="0" max="100"></td>
                                            </tr>
                                            <tr>
                                                <th class="text-right" width="50%">Grand Total :</th>
                                                <td class="text-center" width="50%"><input type="number" name='total' value='00' class="form-control" id="total" readonly/></td>
                                            </tr>
                                            <tr>
                                                <th class="text-right">Cach Received :</th>
                                                <td class="text-center">
                                                    <input type="number" class="form-control" name="payment_amount" id="payment_amount" placeholder="00" min="0">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-right">Due Amount :</th>
                                                <td class="text-center"><input type="number" name='due_amount' id="due_amount" value='00' class="form-control" readonly/></td>
                                            </tr>
                                            <tr>
                                                <th class="text-right">Return Amount :</th>
                                                <td class="text-center"><input type="number" name="return_amount" id="return_amount" value='00' class="form-control" readonly/></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mx-1" style="border: 1px solid #888;">
                                <div class="col-md-4" style="border-right: 2px solid #888">
                                    <p class="pt-2"><span class="float-left font-weight-bold mr-2">Bill Date/Time:</span> <span class="" id="invoice_date"></span></p>
                                </div>
                                <div class="col-md-4" style="border-right: 2px solid #888">
                                    <p class="pt-2"><span class="float-left font-weight-bold mr-2">Delivery Date/Time:</span> <span class="" id="delivery_date"></span></p>
                                </div>
                                <div class="col-md-4">
                                    <p class="pt-2"><span class="float-left font-weight-bold mr-2">Authorized By:</span> <span class="">{{ Auth::user()->name }}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a type="button" href="javascript:history.back()" class="btn btn-danger flaot-left text-white"><i class="fas fa-undo"></i> Back</a>
                            <button type="submit" class="btn btn-warning float-right text-white"><i class="fas fa-print"></i> Print</button>
                        </div>
                    </form>
                </div>
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
                    <h5 class="modal-title" id="user_modal">Add New Ref. Person</h5>
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
                                <label for="name">Ref. User Name<span class="text-danger">&nbsp;*</span></label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="---" required="">
                                <div class="invalid-feedback">
                                    Oh no! Ref. User Name?
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ref_user_mobile">Ref. User Mobile</label>
                                <input type="tel" id="ref_user_mobile" name="ref_user_mobile" class="form-control" placeholder="---" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ref_user_note">Note</label>
                                <input type="text" id="ref_user_note" name="ref_user_note" class="form-control" placeholder="---">
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

        
        var doctor_modal = $('#doctor_modal')
        var doctor_form = $('#doctor_form')
        var doctor_add_button = $('#doctor_add_button')

        var user_modal = $('#user_modal')
        var user_form = $('#user_form')
        var user_add_button = $('#user_add_button')

        $('.modal').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
            doctor_add_button.removeClass('btn-progress')
            user_add_button.removeClass('btn-progress')
        })

        $('#add_doctor').click(function(){
            doctor_modal.modal('show');
        });

        $('#add_ref_user').click(function(){
            user_modal.modal('show');
        });

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
                        var doctor_name =  $('#doctor_form #doctor_name').val();
                        var doctor_degrees =  $('#doctor_form #doctor_degrees').val();
                        $('#search_doctor').val(doctor_name)
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
                    <td><input type="number" name='patient_discounts[]' id="patient_discount" class="form-control" value="`+patient_discount+`" readonly/></td>
                    <td><input type="number" name='net_amounts[]' id="net_amount" class="form-control net_amount" placeholder="00" readonly/></td>
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
        $(document).on('click', '#delete_row', function () {
            $(this).closest('#addr').remove();  
            calc_total(); 
            maxDuration();
        });

        $('#discount').on('keyup change',function(){
            calc_total();
        });
        
        $('#payment_amount').on('keyup change',function(){
            calc_total();
        });

        $(document).on('click', '#add_doctor', function(){
            var doctor_id = $(this).data('id');
            var doctor_name = $(this).data('name');
           
            $('#doctor_id').val(doctor_id);
            $('#search_doctor').val(doctor_name);
            
            $('#doctor_search_result').html('');
            $('#doctor_search_result').css('display','none');
        });

        $(document).on('click', '#add_person', function(){
            var person_id = $(this).data('id');
            var person_name = $(this).data('name');
            
            $('#person_id').val(person_id);
            $('#search_person').val(person_name);
           
            $('#person_search_result').html('');
            $('#person_search_result').css('display','none');
        });

        $(document).on('click', '#add_patient', function(){
            var id = $(this).data('id');
            var patient_id = $(this).data('pid');
            var patient_name = $(this).data('name');
            var patient_mobile = $(this).data('mobile');
            var patient_age = $(this).data('age');
            var patient_gender = $(this).data('gender');
            var patient_address = $(this).data('address');
            var patient_note = $(this).data('note');

            $('#patient_id').val(id);
            $('#patient_name').val(patient_name);
            $('#patient_mobile').val(patient_mobile);
            $('#patient_age').val(patient_age);
            $('#patient_address').val(patient_address);
            $('#patient_note').val(patient_note);

            $('#patient_gender option').each(function() {
                $("#patient_gender").selectric();
                if(patient_gender=='0'){
                    $("#patient_gender option[value='0']").prop("selected", true);
                }
                if(patient_gender=='1'){
                    $("#patient_gender option[value='1']").prop("selected", true);
                }
            });
            $('#patient_search_result').html('');
            $('#patient_search_result').css('display','none');
            $('#search_patient').val(patient_id);
        });
    });

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

    function calc_total()
    {
        sub_total=0;
        total=0;
        payment_amount=0;
        due_amount=0;
        return_amount=0;

        payment_amount= $('#payment_amount').val();
        discount= $('#discount').val();

        $('.net_amount').each(function() {
            sub_total += parseInt($(this).val());
        });
        $('#sub_total').val(sub_total);

        if(discount>100){
            total = 0;
            alert('Discount Could Not Greater Than 100 %')
        }
        if(discount<0){
            total = 0;
            alert('Discount Could Not Be Negative')
        }
        if(discount>=0 && discount<100){
            total = sub_total - (sub_total/100*discount);
            total = Math.round(total);
        }
        $('#total').val(total);
        // $('#payment_amount').attr('max',total);

        due_amount = total - payment_amount;
       
        if(due_amount<0){
            due_amount=0;
            $('#due_amount').val(due_amount);
            return_amount =  payment_amount - total;
            $('#return_amount').val(return_amount);
        }
        if(due_amount>=0){
            
            $('#due_amount').val(due_amount);
            $('#return_amount').val(return_amount);
        }
    };

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
                    if (e.keyCode === 27 ) {
                        $( elem ).hide();
                    }

                }
            });
        }
        else{
            $('#doctor_search_result').html('');
            $('#doctor_search_result').css('display','none');
        }
    })

    $('#search_patient').on('keyup',function(){
        $('#test_search_result').css('display','none');
        $('#doctor_search_result').css('display','none');
        $('#person_search_result').css('display','none');

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
                + (currentdate.getMonth()+1)  + "/" 
                + currentdate.getFullYear() + " @ "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();

        var newDate = new Date(test_date);
        
        newDate.setDate(newDate.getDate() + max);
        var deliveryDate = newDate.getDate() + "/"
                + (newDate.getMonth()+1)  + "/" 
                + newDate.getFullYear() + " @ " +" After 5 PM";

       $('#invoice_date').html(invoice_date);
       $('#delivery_date').html(deliveryDate);
    }
  </script> 
@endsection
