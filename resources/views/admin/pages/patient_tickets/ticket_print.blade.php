@extends('layouts.master')
@section('title','Patient Pathology Ticket Print')
@section('tickets','active')
@section('template_css')
<style>
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
        width: 580px;
        height:550px;
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
</style>
@endsection
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="invoice-print-button">
                <a href="" class="btn btn-warning text-white float-right"><i class="fas fa-print-left mr-2"></i>Print</a>
            </div>
        </div>
        <div class="row">
            <div class="invoice-print">
                <div class="row" id="print_header" style="border-bottom: 1px solid #6c757d;">
                    <div class="col-md-9">
                        <h4 style="margin-bottom: 5px">Renaissa Diagnostic & Hospital</h4>
                        <address style="margin-bottom: 5px">
                            <strong>Reverview Tower, Hospital Road, Katiadi, Kishoreganj, Bangladesh</strong><br>
                            <strong>Mobile: 01998-529266, Email: renaissahospital@gmail.com</strong>
                        </address>
                    </div>
                    <div class="col-md-3">
                        <h6 style="margin-top: 15px; border:1px dashed #222; padding:10px">Ticket #10</h6>
                    </div>
                    <div class="col-md-6">
                        <span style="float:left; font-weight:700">Cash Receipt</span>
                    </div>
                    <div class="col-md-6">
                        <span style="float:right; font-weight:700" id="date">12-12-2020 6:00 PM</span>
                    </div>
                </div>
                <div class="row" id="patient_info" style="border-bottom: 1px solid #6c757d; margin-top:10px">
                    <div class="col-6">
                        <p class="clearfix">
                            <span style="float:left; font-weight:700; width:36%">Ticket No</span>
                            <span style="font-weight:700; width:4%">:</span>
                            <span style="width:60%">
                                <span style="float:right;" id="ticket_no">T0000123123</span>
                            </span>
                        </p>
                        <p class="clearfix">
                            <span style="float:left; font-weight:700; width:36%">Patient ID</span>
                            <span style="font-weight:700; width:4%">:</span>
                            <span style="width:60%">
                                <span style="float:right;" id="patient_id">P0000123123</span>
                            </span>
                        </p>
                        <p class="clearfix">
                            <span style="float:left; font-weight:700; width:36%">Patient Name</span>
                            <span style="font-weight:700; width:4%">:</span>
                            <span style="width:60%">
                                <span style="float:right;" id="patient_name">MD. Omar Faruk</span>
                            </span>
                        </p>
                        <p class="clearfix">
                            <span style="float:left; font-weight:700; width:36%">Address</span>
                            <span style="font-weight:700; width:4%">:</span>
                            <span style="width:60%">
                                <span style="float:right;" id="patient_address">Banasree, Dhaka</span>
                            </span>
                        </p>
                    </div>
                    <div class="col-6">
                        <p class="clearfix">
                            <span style="float:left; font-weight:700; width:36%">Date</span>
                            <span style="font-weight:700; width:4%">:</span>
                            <span style="width:60%">
                                <span style="float:right;" id="ticket_date">12-12-2020</span>
                            </span>
                        </p>
                        <p class="clearfix">
                            <span style="float:left; font-weight:700; width:36%">Gender/Age</span>
                            <span style="font-weight:700; width:4%">:</span>
                            <span style="width:60%">
                                <span style="float:right;" id="patient_gender_age">Male/30 Y</span>
                            </span>
                        </p>
                        <p class="clearfix">
                            <span style="float:left; font-weight:700; width:36%">Contact No.</span>
                            <span style="font-weight:700; width:4%">:</span>
                            <span style="width:60%">
                                <span style="float:right;" id="contact_number">01611425480</span>
                            </span>
                        </p>
                        <p class="clearfix">
                            <span style="float:left; font-weight:700; width:36%">Ref. Person</span>
                            <span style="font-weight:700; width:4%">:</span>
                            <span style="width:60%">
                                <span style="float:right;" id="ref_person">MD. Omar Faruk</span>
                            </span>
                        </p>
                    </div>
                    <div class="col-12" style="margin-top:0">
                        <p class="clearfix">
                            <span style="float:left; font-weight:700; width:17%">Ref. Doctor &nbsp;</span>
                            <span style="font-weight:700; width:1%">:</span>
                            <span style="width:82%">
                                <span style="float:right;" id="ref_doctor">Maj. Gen. Dr. H.R. Harun (Retd.), MBBS, FCPS, FRCS (Edin), Urologist</span>
                            </span>
                        </p>
                    </div>
                </div>    
                <div class="row" id="test_list">
                    <div class="col-md-12">
                        <table class="table">
                            <tr class="text-center">
                                <th data-width="40%">Service Particular</th>
                                <th data-width="15%">Room</th>
                                <th data-width="15%">Serial</th>
                                <th data-width="15%">Time</th>
                                <th data-width="15%">Fees</th>
                            </tr>
                            <tr class="text-center">
                                <td>Patient Pathology Report</td>
                                <td>202</td>
                                <td>10</td>
                                <td>5.00 PM</td>
                                <td>500</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row" id="bill_info">
                    <div class="col-md-7">
                        <div id="suggetion_box" style="border:1px dashed #222; height:125px">

                        </div>
                    </div>
                    <div class="col-md-5 text-right">
                        <p class="" style="border-top:1px solid #222; padding:5px 0">
                            <span style="width:70%">
                                <span style="font-weight:700; float:left">Total</span>
                            </span>
                            <span style="width:30%">
                                <span style="float:right;" id="total">55220.00</span>
                            </span>
                        </p>
                        <p class="" style="border-top:1px solid #222; padding:5px 0">
                            <span style="width:70%">
                                <span style="font-weight:700; float:left">Discount</span>
                            </span>
                            <span style="width:30%">
                                <span style="float:right;" id="discount">100</span>
                            </span>
                        </p>
                        <p class="" style="border-top:1px solid #222; padding:5px 0">
                            <span style="width:70%">
                                <span style="font-weight:700; float:left">Net Amount</span>
                            </span>
                            <span style="width:30%">
                                <span style="float:right;" id="net_total">44300.00</span>
                            </span>
                        </p>
                        <p class="" style="border-top:1px solid #222; padding:5px 0">
                            <span style="width:70%">
                                <span style="font-weight:700; float:left">Paid Amount</span>
                            </span>
                            <span style="width:30%">
                                <span style="float:right;" id="paid_amount">44220.00</span>
                            </span>
                        </p>
                        <p class="" style="border-top:1px solid #222; padding:5px 0">
                            <span style="width:70%">
                                <span style="font-weight:700; float:left">Due Amount</span>
                            </span>
                            <span style="width:30%">
                                <span style="float:right;" id="due_amount">44400.00</span>
                            </span>
                        </p>
                    </div>
                </div>
                <div class="row" id="print_footer">
                    <div class="col-md-6">
                        <p id="takeInWord" style="font-weight:700; padding:0; margin:3px 0">(Tk.) Three Hundred Only</p>
                        <p id="billStatus" style="border:1px dashed #6c757d; padding:3px; width:160px; font-weight:700">Bill Status : Paid</p>
                    </div>
                    <div class="col-md-6">
                        <p id="signature" style="text-align: right; margin-top:12px">
                            <span style="text-align:center;">---------------------------------</span>
                            <br>
                            <span style="text-align:center; font-weight:700">(MD. Omar Faruk)</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('page_js')

@endsection
