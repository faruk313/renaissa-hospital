@extends('layouts.master')
@section('title','Admission Add')
@section('admissions','active')
@section('admissions_create','active')
@section('template_css')

@endsection
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form id="form" action="#" class="needs-validation" novalidate="" autocomplete="off">
                        <div class="card-header">
                            <h4>Hospital's Info</h4>
                        </div>
                        <div class="card-body py-1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="doctor_name">Ref. Doctor Name<span class="text-danger">*</span></label>
                                            <select name="doctor_name" id="doctor_name" class="form-control select2" required="">
                                                <option value="" selected data-default disabled>Select Doctor</option>
                                                @foreach ($doctors as $doctor)
                                                    <option value="{{$doctor->id}}">{{ $doctor->name.', '.$doctor->degrees }}</option>    
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="reserved_date">Admission Date Range <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control daterange" id="" name="reserved_date" required="">
                                        </div>
                                    </div>
                                </div>
            
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="reserved_days">Day(s)<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="reserved_days" name="reserved_days"  readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cabin_bed" class="d-block">Choose Cabin/Bed <span class="text-danger">*</span></label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="option_cabin" name="cabin_bed" class="custom-control-input">
                                            <label class="custom-control-label" for="option_cabin">Cabin</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="option_bed" name="cabin_bed" class="custom-control-input">
                                            <label class="custom-control-label" for="option_bed">Bed</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cabin_bed_type" class="d-block">Cabin/Bed Type <span class="text-danger">*</span></label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="cabin_bed_type1" name="cabin_bed_type" class="custom-control-input">
                                            <label class="custom-control-label" for="cabin_bed_type1">AC</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="cabin_bed_type2" name="cabin_bed_type" class="custom-control-input">
                                            <label class="custom-control-label" for="cabin_bed_type2">Non AC</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cabin_type" class="d-block">Select Cabin Number :<span class="text-danger">*</span></label>
                                        <div class="radio-toolbar">
                                            <label for="cabin_type" class="d-block">AC Cabin: (1000 Tk./Day)</label>
                                            <input type="radio" id="radio1" name="serial" value="1" disabled>
                                            <label for="radio1" rel="tooltip" title="6:45 PM">401</label>
                                        
                                            <input type="radio" id="radio2" name="serial" value="2" disabled>
                                            <label for="radio2">402</label>
                                        
                                            <input type="radio" id="radio3" name="serial" value="3" checked>
                                            <label for="radio3">403</label> 
                        
                                            <input type="radio" id="radio4" name="serial" value="4">
                                            <label for="radio4">404</label> 
                        
                                            <input type="radio" id="radio5" name="serial" value="5" disabled>
                                            <label for="radio5">405</label> 
                        
                                            <input type="radio" id="radio6" name="serial" value="6">
                                            <label for="radio6">406</label> 
                        
                                            <input type="radio" id="radio7" name="serial" value="7">
                                            <label for="radio7">407</label> 
                        
                                            <input type="radio" id="radio8" name="serial" value="8">
                                            <label for="radio8">408</label> 
                        
                                            <input type="radio" id="radio9" name="serial" value="9">
                                            <label for="radio9">409</label> 
                        
                                            <input type="radio" id="radio10" name="serial" value="10">
                                            <label for="radio10">410</label> 
                                        </div>
                                        <div class="radio-toolbar">
                                            <label for="cabin_type" class="d-block">Non AC Cabin: (700 Tk./Day)</label>
                                            <input type="radio" id="radio1" name="serial" value="1" disabled>
                                            <label for="radio1" rel="tooltip" title="6:45 PM">401</label>
                                        
                                            <input type="radio" id="radio2" name="serial" value="2" disabled>
                                            <label for="radio2">402</label>
                                        
                                            <input type="radio" id="radio3" name="serial" value="3" checked>
                                            <label for="radio3">403</label> 
                        
                                            <input type="radio" id="radio4" name="serial" value="4">
                                            <label for="radio4">404</label> 
                        
                                            <input type="radio" id="radio5" name="serial" value="5" disabled>
                                            <label for="radio5">405</label> 
                        
                                            <input type="radio" id="radio6" name="serial" value="6">
                                            <label for="radio6">406</label> 
                        
                                            <input type="radio" id="radio7" name="serial" value="7">
                                            <label for="radio7">407</label> 
                        
                                            <input type="radio" id="radio8" name="serial" value="8">
                                            <label for="radio8">408</label> 
                        
                                            <input type="radio" id="radio9" name="serial" value="9">
                                            <label for="radio9">409</label> 
                        
                                            <input type="radio" id="radio10" name="serial" value="10">
                                            <label for="radio10">410</label> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cabin_type" class="d-block">Select Bed <span class="text-danger">*</span></label>
                                        <div class="radio-toolbar">
                                            <label for="cabin_type" class="d-block">Ward 02: (500 Tk./Day)</label>
                                            <input type="radio" id="radio1" name="serial" value="1" disabled>
                                            <label for="radio1" rel="tooltip" title="6:45 PM">Bed-01</label>
                                        
                                            <input type="radio" id="radio2" name="serial" value="2" disabled>
                                            <label for="radio2">Bed-02</label>
                                        
                                            <input type="radio" id="radio3" name="serial" value="3" checked>
                                            <label for="radio3">Bed-03</label> 
                        
                                            <input type="radio" id="radio4" name="serial" value="4">
                                            <label for="radio4">Bed-04</label> 
                        
                                            <input type="radio" id="radio5" name="serial" value="5" disabled>
                                            <label for="radio5">Bed-05</label> 
                        
                                            <input type="radio" id="radio6" name="serial" value="6">
                                            <label for="radio6">Bed-06</label> 
                        
                                            <input type="radio" id="radio7" name="serial" value="7">
                                            <label for="radio7">Bed-07</label> 
                                        </div>
                                        <div class="radio-toolbar">
                                            <label for="cabin_type" class="d-block">Ward 10: (300 Tk./Day)</label>
                                            <input type="radio" id="radio1" name="serial" value="1" disabled>
                                            <label for="radio1" rel="tooltip" title="6:45 PM">Bed-01</label>
                                            <input type="radio" id="radio2" name="serial" value="2" disabled>
                                            <label for="radio2">Bed-02</label>
                                            <input type="radio" id="radio3" name="serial" value="3" checked>
                                            <label for="radio3">Bed-03</label> 
                                            <input type="radio" id="radio4" name="serial" value="4">
                                            <label for="radio4">Bed-04</label> 
                                            <input type="radio" id="radio5" name="serial" value="5" disabled>
                                            <label for="radio5">Bed-05</label> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <form id="form" action="#" autocomplete="off">
                        <div class="card-header">
                            <h4>Patient's Info.</h4>
                        </div>
                        <div class="card-body py-1">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" required="">
                                        <div class="invalid-feedback">
                                            What's Full Name?
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender" class="mb-3">Select Gender <span class="text-danger">*</span></label>
                                        <br>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="female" name="gender" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="female">Female</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="male" name="gender" class="custom-control-input">
                                            <label class="custom-control-label" for="male">Male</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Mobile Number <span class="text-danger">*</span></label>
                                        <input type="tel" id="mobile" name="mobile" class="form-control" required="" autocomplete="false" placeholder="Mobile Number">
                                        <div class="invalid-feedback">
                                            Oh no! Mobile Number.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="age">Age <span class="text-danger">*</span></label>
                                        <input type="text" id="age" name="age" class="form-control" required="" autocomplete="false" placeholder="Age">
                                        <div class="invalid-feedback">
                                            Oh no! age.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Address</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Address" required="">
                                        <div class="invalid-feedback">
                                            What's Full Name?
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="ref_id">Reference Person <small>(Optional)</small><a type="button" id="add_ref_user" class="text-danger ml-3"><i class="fas fa-plus-circle fa-3x"></i></a></label>
                                        <select name="ref_id" id="ref_id" class="form-control select2">
                                            <option value="" selected data-default disabled>Select Person</option>
                                            <option value="1">Omar Faruk (01611425480)</option>
                                            <option value="2">Abdul Faruk (01911425480)</option>
                                            <option value="3">Mohammad Faruk (01811425480)</option>
                                            <option value="4">Dr. Doctor One (01511425480)</option>
                                            <option value="5">Dr. Doctor Two (01711425480)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="note">Note <small>(Optional)</small></label>
                                        <textarea name="note" id="note" rows="10" class="form-control" placeholder="special note..."></textarea>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('patientAdmissions.billing') }}" class="btn btn-primary">Submit</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-indigo">
                    <h5 class="modal-title" id="formModal">Add Ref. User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="add_form" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="_method" value="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Ref. User Name<span class="text-danger">&nbsp;*</span></label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Ref. User Name" required="">
                                <div class="invalid-feedback">
                                    Oh no! Ref. User Name?
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ref_user_mobile">Ref. User Mobile</label>
                                <input type="tel" id="ref_user_mobile" name="ref_user_mobile" class="form-control" placeholder="Ref. User Mobile">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-white">
                        <button type="button" class="btn btn-danger float-left" data-dismiss="modal" id="cancel_button"><i class="fas fa-times"></i> Close</button>
                        <button type="submit" id="add_button" class="btn btn-success waves-effect float-right">Submit</button>
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
        $(function() {
            $('#daterange').daterangepicker();

            $('.daterange').on('apply.daterangepicker', function(ev, picker) {
                $('#reserved_days').val(picker.endDate.diff(picker.startDate, "days"));
            });
        });

        // $(function() {
        //     $("input[name='bed_cabin_type']").click(function() {
        //         if ($("#bed_cabin_type1").is(":checked")) {
        //             $("#bed_cabin_div1").show();
        //         }
        //         if ($("#bed_cabin_type2").is(":checked")) {
        //             $("#bed_cabin_div2").show();
        //         } else
        //     });
        // });

        // $(function() {
        //     $("input[name='bed_or_cabin']").click(function() {
        //         if ($("#chkYes").is(":checked")) {
        //         $("#dvPinNo").show();
        //         } else {
        //         $("#dvPinNo").hide();
        //         }
        //     });
        // });

        $('#add_ref_user').click(function(){
            $('#add_result').html('');
            $('#formModal').modal('show');
            
        });
        var i=1;
        $("#add_row").click(function(){b=i-1;
            $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
            $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
            i++; 
        });
        $("#delete_row").click(function(){
            if(i>1){
            $("#addr"+(i-1)).html('');
            i--;
            }
            calc();
        });
        
        $('#tab_logic tbody').on('keyup change',function(){
            calc();
        });
        $('#tax').on('keyup change',function(){
            calc_total();
        });
    });

    function calc()
    {
        $('#tab_logic tbody tr').each(function(i, element) {
            var html = $(this).html();
            if(html!='')
            {
                var qty = $(this).find('.qty').val();
                var price = $(this).find('.price').val();
                $(this).find('.total').val(qty*price);
                
                calc_total();
            }
        });
    }

    function calc_total()
    {
        total=0;
        $('.total').each(function() {
            total += parseInt($(this).val());
        });
        $('#sub_total').val(total.toFixed(2));
        tax_sum=total/100*$('#tax').val();
        $('#tax_amount').val(tax_sum.toFixed(2));
        $('#total_amount').val((tax_sum+total).toFixed(2));
    }
  </script>
@endsection
