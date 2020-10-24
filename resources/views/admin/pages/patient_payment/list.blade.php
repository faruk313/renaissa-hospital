@extends('layouts.master')
@section('title','List Patient Payment')
@section('patient_payment','active')
@section('patient_payment_list','active')
@section('template_css')

@endsection
@section('content')
<section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Patient Payment List</h4>
              <div class="btn-group ml-auto">
                <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
              </div>
            </div>
            <div class="card-body">
              <form id="search_form" autocomplete="off">
                <input type="hidden" name="_method" id="method" value="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <div class="row py-2 mb-3" style="border: 1px dashed #333">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="from_date">From Date</label>
                      <input type="date" id="from_date" name="from_date" value="{{ old('from_date') }}" class="form-control" placeholder="-----">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="to_date">To Date</label>
                      <input type="date" id="to_date" name="to_date" value="{{ old('to_date') }}" class="form-control" placeholder="-----">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <button id="search" type="submit" class="btn btn-primary btn-wave text-white m-t-20" type="button">Search</button>
                    </div>
                  </div> 
                </div>
              </form>
              <div class="row">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="example" style="width:100%;">
                    <thead>
                      <tr class="text-center" id="total_count">{!!$total_count!!}</tr>
                      <tr class="text-center">
                        <th>#SL</th>
                        <th>Payment&nbsp;Date</th>
                        <th>Invoice&nbsp;No</th>
                        <th>Invoice&nbsp;Type</th>
                        <th class="sum">Paid&nbsp;Amount</th>
                        <th class="">Due&nbsp;Amount</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody id="custom_table">
                      @foreach($patient_payments as $i=>$list)
                      <tr class="text-center">
                          <td>{{$i+1}}</td>
                          <td>{{$list->payment_date}}</td>
                          <td>{{$list->invoice->invoice_no}}</td>
                          <td>
                            @if($list->invoice->prescription_ticket_id != null)
                                <span class="badge-outline col-indigo">Prescription</span>
                            @else
                                <span class="badge-outline col-purple">Pathology Test</span>
                            @endif
                          </td>
                          <td>{{$list->paid_amount}}</td>
                          <td>{{$list->due_amount}}</td>
                          <td>
                            
                            @if($list->due_amount == 0)
                              
                              <span class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i></span>
                            @else
                              @php
                              $payment_check = App\Models\PatientPayment::where('invoice_id', $list->invoice_id)->orderBy('id','desc')->first();
                          
                              @endphp
                              @if($payment_check->due_amount == 0)
                              <span class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i></span>
                              @else
                              <a type="button" id="make_payment_btn" data-id="{{$list->invoice_id}}" data-due="{{$list->due_amount}}" data-invoice="{{$list->invoice->invoice_no}}" class="btn btn-outline-info">Make Payment</a>
                              @endif
                            @endif
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot id="table_footer" style="background: #F0F3FF">
                      <tr class="text-center">
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Column Total :</th>
                        <th class="Int"></th>
                        <th class=""></th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- payment modal -->
<div class="modal fade" id="payment_modal" tabindex="-1" role="dialog" aria-labelledby="payment_modal" aria-hidden="true">
  <div class="modal-dialog modal-xs" role="document">
    <form action="{{ route("patientPayment.store") }}" method="POST">
      @csrf
      <input type="hidden" name="payment_id" id="payment_id">
      <input type="hidden" name="invoice_no" id="invoice_no">
      <div class="modal-content">
        <div class="modal-header bg-indigo">
          <h5 class="modal-title" id="payment_modal">Make Payment For <span class="ml-2" id="title_invoice_no"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group row">
                <label class="col-md-5 col-form-label" for="total_amount">Due Amount (BDT) :</label>
                <div class="col-md-7">
                  <input type="number" name="due_amount" id="due_amount" class="form-control" readonly>
                </div>    
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group row">
                <label class="col-md-5 col-form-label" for="cash_received">Cash Received (BDT) :</label>
                <div class="col-md-7">
                  <input type="number" name="cash_received" id="cash_received" class="form-control" min="0" autocomplete="off" required="">
                </div>    
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group row">
                <label class="col-md-5 col-form-label" for="return_amount">Return Amount (BDT) :</label>
                <div class="col-md-7">
                  <input type="number" name="return_amount" id="return_amount" class="form-control" readonly>
                </div>    
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-primary float-left" data-dismiss="modal"><i class="fas fa-times"></i> No</button>
          <button type="submit" class="btn btn-danger float-right" id="payment_button">Payment <i class="fas fa-check"></i></button>
        </div>
      </div>
    </form>		
  </div>
</div>
@endsection

@section('page_js')

<script>
  $(document).ready(function(){

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    //initialize 
    var payment_modal =  $('#payment_modal');
    var payment_form =  $('#payment_form');
    var payment_button =  $('#payment_button');

    //modal reset
    $('.modal').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
      payment_button.removeClass('btn-progress');
      $('#payment_id').val('');
      $('#invoice_no').val('');
      $('#due_amount').val('');
      $('#cash_received').val('');
    })
    
    //open new payment modal
    $(document).on('click', '#make_payment_btn', function(){
      var payment_id = $(this).data('id');
      var due_amount = $(this).data('due');
      var invoice_no = $(this).data('invoice');

      $('#payment_modal #payment_id').val(payment_id);
      $('#payment_modal #invoice_no').val(invoice_no);
      $('#payment_modal #title_invoice_no').text(invoice_no);
    
      payment_modal.modal('show');
      $('#due_amount').val(due_amount);
      //getting cash received value
      $('#cash_received').on('keyup change',function(){
        calc_total();
      });
    });
 

    function calc_total(){
      // var cash_received =0;
      var return_amount =0;
      // var due_amount =0;
      
      due_amount = $('#due_amount').val();
      $('#cash_received').attr('min',due_amount);
     
      cash_received = $('#cash_received').val();

      return_amount = cash_received - due_amount;
      $('#return_amount').val(return_amount);
      if(return_amount<0){
        $('#return_amount').val('0');
      }
    };

    var search_form = $('#search_form');
    var search_button = $('#search');
    search_button.removeClass('btn-progress');

    search_form.on('submit', function(event){
      event.preventDefault();
      var url = '{{ route("patientPaymentCustomSearch") }}';
      var from_date = $('#search_form #from_date').val();
      var to_date = $('#search_form #to_date').val();

      $.ajax({
        url:url,
        method: "POST",
        data: {from_date:from_date, to_date:to_date},
        beforeSend:function(){
          search_button.addClass('btn-progress');
          $("#custom_table").html('');
          $('#example').DataTable().clear().destroy();
          $("#custom_table").addClass('d-none');
          
          $("#total_count").addClass('d-none');
          $("#table_footer").addClass('d-none');
        },
        success:function(data){
          if(data.errors){
            $('#search_form #from_date').val('');
            $('#search_form #to_date').val('');
            $('#example').DataTable().clear().destroy();
            $("#total_count").addClass('d-none');
            $("#custom_table").addClass('d-none');
            $("#table_footer").addClass('d-none');

            $("#custom_table").html('');
            $("#total_count").html('');
            search_button.removeClass('btn-progress');
          }

          setTimeout(function(){
            search_button.removeClass('btn-progress');
      
            $("#custom_table").removeClass('d-none');
            $("#custom_table").html(data.tbody);
            dataTableFooter();
            $("#table_footer").removeClass('d-none');

            $("#total_count").removeClass('d-none');
            $("#total_count").html(data.tfoot);


            $('#search_form #from_date').val('');
            $('#search_form #to_date').val('');
          }, 1000);
        }//end success
          
      }) //end ajax

    });//end submit

    //datatable
    dataTableFooter();
    

  }); //ready
</script>
@endsection


