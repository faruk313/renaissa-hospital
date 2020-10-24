@extends('layouts.master')
@section('title','Patient Ticket Create')
@section('tickets','active')
@section('tickets_create','active')
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
                        <h4>Patient's Report Ticket</h4>
                    </div>
                    <form action="{{ route('patientTests.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="patient_id" id="patient_id">
                        <input type="hidden" name="doctor_id" id="doctor_id">
                        <input type="hidden" name="person_id" id="person_id">
                        <div class="card-body">
                            <div class="row mx-1" id="patientInfo" style="border: 2px solid #888">
                                <div class="col-md-7">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-md-3 col-form-label mx-0 px-0" for="search_patient">Patient :</label>
                                        <div class="col-md-9 mx-0 px-0">
                                            <input type="text" id="search_patient" class="form-control" autocomplete="off">
                                            <div id="patient_search_result" class="search-box" style="display:none"></div>
                                        </div>    
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-sm-5 col-form-label mx-0 px-0" for="test_date">Date : </label>
                                        <div class="col-sm-7 mx-0 px-0">
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
                                                <option value="" selected>--</option>
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
                                        <label class="col-sm-3 col-form-label mx-0 px-0" for="search_doctor">Ref. Doctor :</label>
                                        <div class="col-sm-9 mx-0 px-0">
                                            <input type="text" id="search_doctor" value="Dr. abc xyz" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group row m-0 py-2">
                                        <label class="col-sm-4 col-form-label mx-0 px-0" for="search_person">Ref. Person : </label>
                                        <div class="col-sm-8 mx-0 px-0">
                                            <input type="text" id="search_person" value="Dr. abc xyz" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-1 mt-2" id="testTable" style="border: 1px solid #888">
                                <div class="col-md-12 mt-2">
                                    <table class="table table-bordered table-hover" id="tab_logic">
                                        <thead>
                                            <tr class="text-center">
                                                <th class="text-center" width="30%">Particular</th>
                                                <th class="text-center" width="10%">Room No.</th>
                                                <th class="text-center" width="10%">SL. No.</th>
                                                <th class="text-center" width="30%">Time</th>
                                                <th class="text-center" width="20%">Fees (BDT)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>Doctor Report Ticket</td>
                                                <td>501</td>
                                                <td>24</td>
                                                <td>7:30 PM</td>
                                                <td>300</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="offset-8 col-4">
                                    <table class="table table-bordered table-hover" id="tab_logic_total">
                                        <tbody>
                                            <tr>
                                                <th class="text-right" width="50%">Total Amount :</th>
                                                <td class="text-center" width="50%"><input type="number" name='total' value='00' class="form-control" id="total" readonly/></td>
                                            </tr>
                                            <tr>
                                                <th class="text-right">Cach Received :</th>
                                                <td class="text-center">
                                                    <input type="number" class="form-control" name="payment_amount" id="payment_amount" placeholder="00" min="0" required="">
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
                            <div class="row mx-1 mt-2" style="border: 1px solid #888;">
                                <div class="col-md-8" style="border-right: 2px solid #888">
                                    <p class="pt-2"><span class="float-left font-weight-bold mr-2">Invoice Date/Time:</span> <span class="" id="invoice_date"></span></p>
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
</section>
@endsection
@section('page_js')
<script src="{{ asset('assets/bundles/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#discount').on('keyup change',function(){
            calc_total();
        });
        
        $('#payment_amount').on('keyup change',function(){
            calc_total();
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


    $('#search_patient').on('keyup',function(){
        $('#doctor_search_result').css('display','none');
        $('#person_search_result').css('display','none');
        $('#patient_id').val('');
        $('#patient_name').val('');
        $('#patient_mobile').val('');
        $('#patient_age').val('');
        $('#patient_address').val('');
        $('#patient_note').val('');
        $("#patient_gender").selectric();
        $("#patient_gender option[value='']").prop("selected", true);

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
    }
  </script> 
@endsection
