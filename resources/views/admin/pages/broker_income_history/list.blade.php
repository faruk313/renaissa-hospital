@extends('layouts.master')
@section('title','List Doctor Payment')
@section('broker_income_history','active')
@section('broker_income_history_list','active')
@section('template_css')
{{--  <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">  --}}

@endsection
@section('content')
<section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Broker Income History List</h4>
              <div class="btn-group ml-auto">
                <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
              </div>
            </div>
            <div class="card-body">
              <form id="search_form" autocomplete="off">
                <input type="hidden" name="broker_id" id="broker_id">
                <div class="row py-2 mb-3" style="border: 1px dashed #333">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="from_date">From Date</label>
                      <input type="date" id="from_date" name="from_date" value="{{ old('from_date') }}" class="form-control" placeholder="-----">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="to_date">To Date</label>
                      <input type="date" id="to_date" name="to_date" value="{{ old('to_date') }}" class="form-control" placeholder="-----">
                    </div>
                  </div>
                  {{-- <div class="col-md-2">
                    <div class="form-group">
                      <label for="income_type">Income Type</label>
                      <select name="income_type" id="income_type" class="form-control">
                        <option value="" selected>Select</option>
                        <option value="1">Prescription</option>
                        <option value="2">Pathology Test</option>
                      </select>
                    </div>
                  </div> --}}
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="broker_name">Broker Name</label>
                      <input type="text" id="broker_name" name="broker_name" value="{{ old('broker_name') }}" class="form-control" placeholder="-----">
                      <div id="broker_search_result" class="search-box" style="display:none"></div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <button class="btn btn-primary btn-wave text-white m-t-20" type="submit" id="search">Search</button>
                    </div>
                  </div>
                </div>
              </form>
              <div class="row">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="example" style="width:100%;">
                    <thead>
                      <tr class="text-center" id="total_count">
                      {!! $total_count !!}
                      </tr>
                      <tr class="text-center">
                        <th>#SL</th>
                        <th>Invoice Date</th>
                        <th>Invoice No</th>
                        <th>Broker</th>
                        <th>Income Type</th>
                        <th class="sum">Income Amount</th>
                        <th class="sum">Commission</th>
                      </tr>
                    </thead>
                    <tbody id="custom_table">
                      @foreach($broker_income_histories as $i=>$list)
                      <tr class="text-center">
                          <td>{{$i+1}}</td>
                          <td>{{$list->invoice_date}}</td>
                          <td>{{$list->invoice_no}}</td>
                          <td>{{$list->broker->ref_user_name}}</td>
                          <td>
                            @if($list->prescription_ticket_id != null)
                              <span class="badge-outline col-indigo">Prescription</span>
                            @else
                              <span class="badge-outline col-purple">Pathology&nbsp;Test</span>
                            @endif
                          </td>
                          
                          <td>{{$list->broker_income_amount}}</td>
                          <td>{{$list->broker_payable_amount}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr class="text-center" id="table_footer" style="background: #F0F3FF">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Column Total : </td>
                        <td class="Int"></td>
                        <td class="Int"></td>
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
    <form id="payment_form" method="POST">
      @csrf
      <input type="hidden" name="payment_id" id="payment_id">
      <input type="hidden" name="invoice_no" id="invoice_no">
      <div class="modal-content">
        <div class="modal-header bg-indigo">
          <h5 class="modal-title" id="payment_modal">Make Payment For <span class="" id="make_pament_inv">#INV1312124</span></h5>
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
{{--  <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/page/datatables.js') }}"></script>  --}}

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

      $('#payment_id').val(payment_id);
      $('#invoice_no').val(invoice_no);
    
      payment_modal.modal('show');
      $('#due_amount').val(due_amount);
      //getting cash received value
      $('#cash_received').on('keyup change',function(){
        calc_total();
      });
    });

    $('#payment_form').on('submit', function(event){
      event.preventDefault()
      var url = '{{ route("patientPayment.store") }}'
      var data = $(this).serialize();

      $.ajax({
        url:url,
        method: "POST",
        data: data,
        dataType:"json",
        beforeSend:function(){
          payment_modal.find('.modal-title').text('Sending ...')
          payment_button.addClass('btn-progress');
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
            payment_button.removeClass('btn-progress');
            payment_modal.find('.modal-title').text('Error')
          }
          if(data.success)
          {
            setTimeout(function(){
              iziToast.success({
                title: 'Success!',
                message: data.success,
                position: 'topRight'
              })
                payment_modal.find('.modal-title').text('Successful');
                payment_form[0].reset();
                payment_button.removeClass('btn-progress');
                $('#patient_payment_table').DataTable().ajax.reload();
            }, 1000);
          }    
        }
      })
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
    }
   
    //broker search
    $('#broker_name').on('keyup',function(){
      $('#broker_search_result').css('display','none');

      var action_url = "{{ route('customSearch.brokerSearch') }}";
      var value=$(this).val();
      if(value.length >= '2'){
        $.ajax({
          type : 'get',
          url : action_url,
          data:{'search':value},

          success:function(data){
            console.log(data);
            $('#broker_search_result').css('display','block');
            $('#broker_search_result').html(data);
          }
        });
      }
      else{
        $('#broker_search_result').html('');
        $('#broker_search_result').css('display','none');
      }

    });

    //select broker
    $(document).on('click', '#add_broker', function(){
      var broker_id = $(this).data('broker_id');
      var broker_name = $(this).data('broker_name');
      $('#search_form #broker_id').val(broker_id);
      $('#search_form #broker_name').val(broker_name);
      $('#search_form #broker_search_result').html('');
      $('#search_form #broker_search_result').css('display','none');
    });

    var search_form = $('#search_form');
    var search_button = $('#search');
    search_button.removeClass('btn-progress');

    search_form.on('submit', function(event){
      event.preventDefault();
      var url = '{{ route("brokerIncomeCustomSearch.search") }}';
      var from_date = $('#search_form #from_date').val();
      var to_date = $('#search_form #to_date').val();
      var broker_id = $('#search_form #broker_id').val();
  
      $.ajax({
        url:url,
        method: "POST",
        data: {from_date:from_date, to_date:to_date, broker_id:broker_id},
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
            $('#search_form #broker_id').val('');
            $('#search_form #broker_name').val('');
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
            $('#search_form #broker_id').val('');
            $('#search_form #broker_name').val('');
          }, 1000);
        }//end success
          
      }) //end ajax

    });//end submit

    //datatable
    dataTableFooter();
  })
</script>
@endsection


