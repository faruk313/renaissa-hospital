@extends('layouts.master')
@section('title','List Income Report')
@section('income_report','active')
@section('income_report_list','active')
@section('template_css')

@endsection
@section('content')
<section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Income Reports</h4>
              <div class="btn-group ml-auto">
                <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left"></i>Back</a>
              </div>
            </div>
            <div class="card-body">
              <form id="search_form">
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
                        <th>Date</th>
                        <th class="sum">Total&nbsp;Income</th>
                        <th class="sum">Doctor&nbsp;Payment</th>
                        <th class="sum">Broker&nbsp;Payment</th>
                        <th class="sum">Expense</th>
                        <th class="sum">Profit/Loss</th>
                      </tr>
                    </thead>
                    <tbody id="custom_table">
                      
                      @foreach($doctor_paid as $i=>$list)
                        <tr class="text-center">
                          <td>{{$i+1}}</td>
                          <td>{{$list->invoice_date}}</td>
                          
                          @php
                          $broker_paid = App\Models\BrokerPayment::selectRaw('sum(paid_amount) as broker_paid_amount')
                          ->where('invoice_date',$list->invoice_date)
                          ->first();
  
                          $expense = App\Models\Expense::selectRaw('sum(expense_amount) as total_expense_amount')
                          ->where('expense_date',$list->invoice_date)
                          ->first();
  
                          $total_income = App\Models\Invoice::selectRaw('sum(total_amount) as total')
                          ->where('invoice_date',$list->invoice_date)
                          ->first();
                          
                          $profit_or_loss = $total_income->total - $list->doctor_paid_amount - $broker_paid->broker_paid_amount - $expense->total_expense_amount;
                          @endphp
                          
                          <td>{{ $total_income->total}}</td>
                          <td>{{ $list->doctor_paid_amount}}</td>
                          <td>
                            @if($broker_paid->broker_paid_amount != null)
                              {{ $broker_paid->broker_paid_amount }}
                            @else
                             0
                            @endif
                          </td>
                          <td>
                            @if( $expense->total_expense_amount != null)
                            {{ $expense->total_expense_amount }}
                            @else
                             0
                            @endif
                            
                          </td>
                          <td>{{ $profit_or_loss }}</td>
                          {{-- <td>{{$list->prescriptonTicket->serial_no}}</td>
                          <td>{{$list->doctor->name}}</td>
                          <td>{{$list->payable_amount}}</td>
                          <td>{{$list->discount}} %</td>
                          <td>{{$list->total_amount}}</td> --}}
                          
                          {{-- <td>{{$list->person->ref_user_name}}</td> --}}
                          {{-- <td class="actions">
                            <a href="{{route('prescriptionTicket.view', $list->id)}}"><i class="fas fa-eye text-info"></i></a>
                          </td> --}}
                        </tr>
                        
                      @endforeach
                    </tbody>
                    <tfoot id="table_footer" style="background: #F0F3FF">
                      <tr class="text-center">
                        <th></th>
                        <th>Column Total: </th>
                        <th class="Int"></th>
                        <th class="Int"></th>
                        <th class="Int"></th>
                        <th class="Int"></th>
                        <th class="Int"></th>
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
@endsection

@section('page_js')

<script>
  $(document).ready(function(){
    
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var search_form = $('#search_form');
    var search_button = $('#search');
    search_button.removeClass('btn-progress');

    search_form.on('submit', function(event){
      event.preventDefault();
      var url = '{{ route("incomeReportCustomSearch") }}';
      from_date = $('#search_form #from_date').val();
      to_date = $('#search_form #to_date').val();
  
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

  });
</script>
@endsection


