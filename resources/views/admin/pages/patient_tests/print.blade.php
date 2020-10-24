@extends('layouts.master')
@section('title','Patient Test Invoice View')
@section('test_invoices','active')
@section('template_css')
<style>
    @page { size: auto;  margin: 5mm;}
    .invoice-print-button {
        padding: 15px;
        font-size: 13px;
        width: 595px;
        height:45px;
        margin: 0 auto;
        display: block;
        position: relative;
        margin-bottom: 15px;
    }
    .invoice-print {
        background-color: #fff;
        border-radius: 10px;
        border: none;
        position: relative;
        margin-bottom: 30px;
        box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1),0 0.9375rem 1.40625rem rgba(90,97,105,0.1),0 0.25rem 0.53125rem rgba(90,97,105,0.12),0 0.125rem 0.1875rem rgba(90,97,105,0.1);
        padding: 15px;
        font-size: 13px;
        width: 595px;
        height:842px;
        margin: 0 auto;
        display: block;
        position: relative;
    }
    .invoice-print p{
        line-height: 13px !important;

    }
    table td, table th {
        font-size: 13px;
       
    }
    .table td, .table th {
        height: 30px !important;
        vertical-align: middle !important;
    }

    .invoice-print #print_footer{
        position:absolute;
        bottom:0;
        width:100%;
        height:60px;
    }

    /* .invoice-print #bill_info{
        position:absolute;
        bottom:100px;
        width:100%;
    } */
</style>
@endsection
@section('content')
<section class="section">
    <div class="section-body">
        @php
            $total_amount =0;
            $discount =0;
            $net_amount =0;
            $total_amount = $test_invoice->payable_amount;
            $discount_amount = $test_invoice->discount;

            $discount = ($total_amount/100*$discount_amount);
            $net_amount = $total_amount - $discount;
        @endphp
        <div class="row">
            <div class="invoice-print-button">
                <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                <a href="#" id="test_invoice_print" class="btn btn-warning text-white float-right"><i class="fas fa-print-left mr-2"></i>Print</a>
            </div>
        </div>
        <div class="row">
            <div class="invoice-print" id="testInvoicePrintView">
                <div class="row" id="print_header" style="border-bottom: 1px solid #6c757d;">
                    <div class="col-8">
                        <h4 style="margin-bottom: 5px">Renaissa Diagnostic & Hospital</h4>
                        <address style="margin-bottom: 5px">
                            <strong>Riverview Tower, Hospital Road, Katiadi, Kishoreganj</strong><br>
                            <strong>Mobile: 01998-529266, Email: renaissahospital@gmail.com</strong>
                        </address>
                    </div>
                    <div class="col-4">
                        <div style="margin-top: 0px; border:1px dashed #222; padding:10px; text-align:center;">
                            <h6>Bill</h6>
                            <p style="margin:0px;">Invoice No: <strong>#{{ $test_invoice->invoice_no }}</strong></p>
                            <p style="margin:0px;">Date: <strong>{{ $test_invoice->invoice_date }}</strong></p>
                        </div>
                    </div>
                    <div class="col-12" style="text-align:center; margin-top:7px; margin-bottom:7px;">
                        <span style="font-weight:700; border:1px dashed #222; padding:0px;">Cash Receipt</span>
                    </div>
                </div>
                <div class="row" id="patient_info" style="border-bottom: 1px solid #6c757d; margin-top:10px">
                    <div class="col-6">
                        <p class="clearfix">
                            <span style="float:left; font-weight:700; width:36%">Patient ID</span>
                            <span style="font-weight:700; width:4%">:</span>
                            <span style="width:60%">
                                <span style="float:right;" id="patient_id">{{ $test_invoice->patient->patient_id }}</span>
                            </span>
                        </p>
                        <p class="clearfix">
                            <span style="float:left; font-weight:700; width:36%">Patient Name</span>
                            <span style="font-weight:700; width:4%">:</span>
                            <span style="width:60%">
                                <span style="float:right;" id="patient_name">{{ $test_invoice->patient->patient_name }}</span>
                            </span>
                        </p>
                    </div>
                    <div class="col-6">
                        <p class="clearfix">
                            <span style="float:left; font-weight:700; width:36%">Gender/Age</span>
                            <span style="font-weight:700; width:4%">:</span>
                            <span style="width:60%">
                                <span style="float:right;" id="patient_gender_age">{{ ($test_invoice->patient->patient_gender==1?'Male':'Female').'/'.$test_invoice->patient->patient_age }}</span>
                            </span>
                        </p>
                        <p class="clearfix">
                            <span style="float:left; font-weight:700; width:36%">Contact No.</span>
                            <span style="font-weight:700; width:4%">:</span>
                            <span style="width:60%">
                                <span style="float:right;" id="contact_number">{{ $test_invoice->patient->patient_mobile }}</span>
                            </span>
                        </p>
                    </div>
                    <div class="col-12" style="margin-top:0">
                        <p class="clearfix">
                            <span style="float:left; font-weight:700; width:17%">Ref. Doctor &nbsp;</span>
                            <span style="float:left;font-weight:700; width:1%">:</span>
                            <span style="width:82%">
                                <span style="float:left; margin-left:10px" id="ref_doctor">{{ $test_invoice->doctor->name.', '.$test_invoice->doctor->degrees}}</span>
                            </span>
                        </p>
                    </div>
                </div>    
                <div class="row" id="test_list">
                    <div class="col-12">
                        <table class="table">
                            <tr class="text-center">
                                <th width="5%">#</th>
                                <th data-width="55%">Test Name</th>
                                <th data-width="10%">Room</th>
                                <th data-width="10%">Rate</th>
                                <th data-width="10%">Dis.(%)</th>
                                <th data-width="10%">Net</th>
                            </tr>
                            @foreach($patient_tests as $i=>$test)
                            <tr class="text-center">
                                <td>{{$i+1}}</td>
                                <td>{{$test->pathologyTest->test_name}}</td>
                                <td>22</td>
                                <td>{{$test->test_price}}</td>
                                <td>{{$test->test_discount}}</td>
                                <td>{{$test->test_net_amount}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="row" id="bill_info">
                    <div class="col-7">
                        <div id="suggetion_box" style="border:1px dashed #222; height:125px">
                            <p></p>
                        </div>
                    </div>
                    <div class="col-5 text-right">
                        <p class="" style="border-top:1px solid #222; padding:5px 0">
                            <span style="width:70%">
                                <span style="font-weight:700; float:left">Total</span>
                            </span>
                            <span style="width:30%">
                                <span style="float:right;" id="total">{{ $test_invoice->total_amount }}</span>
                            </span>
                        </p>
                        <p class="" style="border-top:1px solid #222; padding:5px 0">
                            <span style="width:70%">
                                <span style="font-weight:700; float:left">Discount</span>
                            </span>
                            <span style="width:30%">
                                <span style="float:right;" id="discount">{{ $discount }}</span>
                            </span>
                        </p>
                        <p class="" style="border-top:1px solid #222; padding:5px 0">
                            <span style="width:70%">
                                <span style="font-weight:700; float:left">Net Amount</span>
                            </span>
                            <span style="width:30%">
                                <span style="float:right;" id="net_total">{{ $net_amount }}</span>
                            </span>
                        </p>
                        <p class="" style="border-top:1px solid #222; padding:5px 0">
                            <span style="width:70%">
                                <span style="font-weight:700; float:left">Paid Amount</span>
                            </span>
                            <span style="width:30%">
                                <span style="float:right;" id="paid_amount">{{ $patient_payments->sum('paid_amount') }}</span>
                            </span>
                        </p>
                        <p class="" style="border-top:1px solid #222; padding:5px 0">
                            <span style="width:70%">
                                <span style="font-weight:700; float:left">Due Amount</span>
                            </span>
                            <span style="width:30%">
                                <span style="float:right;" id="due_amount">{{ $patient_payments->sum('due_amount') }}</span>
                            </span>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p id="amountInWord" style="font-weight:700; padding:0; margin:3px 0; text-align:center;">In Words : <strong>{{takaInWord($patient_payments->sum('paid_amount'))}}</strong></p>
                    </div>
                </div>
                <div class="row" id="print_footer">
                    <div class="col-6">
                        
                        <p id="billStatus" style="border:1px dashed #6c757d; padding:3px; width:160px; font-weight:700">
                            Bill Status : {{ $patient_payments->sum('due_amount') == 0 ? 'Paid' : 'Due'}}
                        </p>
                    </div>
                    <div class="col-6">
                        <p id="signature" style="text-align: right; margin-top:12px">
                            <span style="text-align:center;">---------------------------------</span>
                            <br>
                            <span style="text-align:center; font-weight:700">(Signature)</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('page_js')
<script src="{{ asset('assets/js/printThis.js') }}"></script>
<script>
	$(document).ready(function(){
		$(document).on('click','#test_invoice_print', function(){
                
			$("#testInvoicePrintView").printThis({
				debug: false,                
				importCSS: true,  
                importStyle: true,
                printContainer: false,
				pageTitle: null ,          

			});
        });
	});	
</script>
@endsection
