@extends('layouts.master')
@section('title','Admission Billing')
@section('admissions','active')
@section('admissions_billing','active')
@section('template_css')
<style>
    #tab_logic td input, #tab_logic_total td input{
        border-radius: 0 !important;
        height: 35px !important;
    }
    #tab_logic th{
        height: 40px !important;
    }
    #tab_logic td, #tab_logic_total td, #tab_logic_total th{
        height: 50px !important;
    }
    #patientInfoTable td{
        height: 40px !important;
    }
    #patientInfoTable tbody tr td span{
        margin-top:5px !important
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
                        <h4>Patient's Admission</h4>
                        <a type="button" class="btn btn-primary text-white ml-auto float-right">
                            Billing ID #123456
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-hover" id="patientInfoTable">
                                    <tbody>
                                        <tr class="d-flex align-items-center">
                                            <td class="col-md-4"><span class="float-left font-weight-bold">Patient's Name :</span> <span class="float-left ml-3"> md. omar faruk</span></td>
                                            <td class="col-md-3"><span class="float-left font-weight-bold">Mobile :</span> <span class="float-right"> 01611425480</span></td>
                                            <td class="col-md-2"><span class="float-left font-weight-bold">Gender :</span> <span class="float-right"> Male</span></td>
                                            <td class="col-md-1"><span class="float-left font-weight-bold">Age :</span> <span class="float-right"> 30</span></td>
                                            <td class="col-md-2"><span class="float-left font-weight-bold">Date :</span> <span class="float-right"> 10-09-2020</span></td>
                                        </tr>
                                        <tr class="d-flex">
                                            <td class="col-md-6"><span class="float-left font-weight-bold">Patient's Address :</span> <span class="float-left ml-3">South Banasree, Dhaka</span></td>
                                            <td class="col-md-2"><span class="float-left font-weight-bold">From:</span> <span class="float-right">10-09-2020</span></td>
                                            <td class="col-md-2"><span class="float-left font-weight-bold">To:</span> <span class="float-right">10-09-2020</span></td>
                                            <td class="col-md-2"><span class="float-left font-weight-bold">Cabin No :</span> <span class="float-right">403</span></td>
                                        </tr>
                                        <tr class="d-flex">
                                            <td class="col-md-7"><span class="float-left font-weight-bold">Ref. Doctor :</span> <span class="float-left ml-3">Dr. abc xyz abc</span></td>
                                            <td class="col-md-5"><span class="float-left font-weight-bold">Ref. Person :</span> <span class="float-left ml-3">MD. Omar Faruk</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-hover" id="tab_logic">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="5%"> # </th>
                                            <th class="text-center" width="60%"> Item</th>
                                            <th class="text-center" width="10%"> Qty </th>
                                            <th class="text-center" width="10%"> Price </th>
                                            <th class="text-center" width="15%"> Total </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id='addr0'>
                                            <td class="text-center">1</td>
                                            <td><input type="text" name='product[]' value="Bed or Cabin Charge" class="form-control" readonly></td>
                                            <td><input type="number" name='qty[]' value="3" class="form-control qty" step="0" min="1" readonly></td>
                                            <td><input type="number" name='price[]' value='500' value="3000" class="form-control price"readonly></td>
                                            <td><input type="number" name='total[]' value='1500' class="form-control total" readonly/></td>
                                        </tr>
                                        <tr id='addr0'>
                                            <td class="text-center">2</td>
                                            <td><input type="text" name='product[]' value="Doctor Fees" class="form-control" readonly></td>
                                            <td><input type="number" name='qty[]' value="1" class="form-control qty" readonly></td>
                                            <td><input type="number" name='price[]' value='500' value="3000" class="form-control price" readonly></td>
                                            <td><input type="number" name='total[]' value='500' class="form-control total" readonly/></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="offset-8 col-4">
                                <table class="table table-bordered table-hover" id="tab_logic_total">
                                    <tbody>
                                        <tr>
                                            <th class="text-right" width="50%">Grand Total :</th>
                                            <td class="text-center" width="50%"><input type="number" name='sub_total' placeholder='00' class="form-control" id="sub_total" readonly/></td>
                                        </tr>
                                        <tr>
                                            <th class="text-right">Paid Amount :</th>
                                            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                                                <input type="number" class="form-control" name="payment_amount" id="payment_amount" placeholder="00">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-right">Return Amount :</th>
                                            <td class="text-center"><input type="number" name='return_amount' id="return_amount" placeholder='00' class="form-control" readonly/></td>
                                        </tr>
                                        <tr>
                                            <th class="text-right">Due Amount :</th>
                                            <td class="text-center"><input type="number" name='due_amount' id="due_amount" placeholder='00' class="form-control" readonly/></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a type="button" href="javascript:history.back()" class="btn btn-danger flaot-left text-white"><i class="fas fa-undo"></i> Back</a>
                            <a type="submit" class="btn btn-warning float-right text-white"><i class="fas fa-print"></i> Print</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('page_js')
<script>
    $(document).ready(function(){
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
        calc_total();
        calc();
        $('#tab_logic tbody').on('keyup change',function(){
            calc();
        });
        $('#payment_amount').on('keyup change',function(){
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
        payment_amount=0;
        return_amount=0;
        payment_amount= $('#payment_amount').val();;
        $('.total').each(function() {
            total += parseInt($(this).val());
        });
        $('#sub_total').val(total);
        due_amount = total - payment_amount;
        if(due_amount<0){
            return_amount = payment_amount-total;
            due_amount=0;
            $('#return_amount').val(return_amount);
            $('#due_amount').val(due_amount);
        }
        if(due_amount>=0){
            $('#due_amount').val(due_amount);
            $('#return_amount').val(return_amount);
        }
    }
  </script>
@endsection
