@extends('layouts.master')
@section('title','Prescription Tickets')
@section('prescription_ticket','active')
@section('prescription_ticket_list','active')
@section('template_css')
@endsection
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Prescription Ticket List</h4>
            <div class="btn-group ml-auto">
              <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
              <a href="{{ route('prescriptionTicket.create') }}" class="btn btn-primary text-white"><i class="fas fa-plus mr-2"></i>Create</a>
            </div>
          </div>
          <div class="card-body">
            <form id="search_form" autocomplete="off">
              <input type="hidden" name="_method" id="method" value="POST">
              <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
              <input type="hidden" name="invoice_id" id="invoice_id">
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
                {{-- <div class="col-md-3">
                  <div class="form-group">
                    <label for="invoice_no">Invoice No.</label>
                    <input type="text" id="invoice_no" name="invoice_no" value="{{ old('invoice_no') }}" class="form-control" placeholder="-----">
                    <div id="invoice_search_result" class="search-box" style="display:none"></div>
                  </div>
                </div> --}}
                
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
                    <tr class="text-center" id="total_count">
                      {!! $total_count !!}
                    </tr>
                    <tr class="text-center">
                      <th>#SL</th>
                      <th>INV&nbsp;Date</th>
                      <th>INV&nbsp;No</th>
                      <th>Patient&nbsp;Name</th>
                      <th>SL&nbsp;No</th>
                      <th>Doctor&nbsp;Name</th>
                      <th class="sum">Doc.&nbsp;Fees</th>
                      <th>Dis.&nbsp;(%)</th>
                      <th class="sum">Total&nbsp;Amount</th>
                      <th>Ref.&nbsp;Person</th>
                      <th data-sortable="false">Actions</th>
                    </tr>
                  </thead>

                  <tbody id="custom_table">
                  
                    @foreach($tickets as $i=>$list)
                      <tr class="text-center">
                        <td>{{ $i+1 }}</td>
                        <td>{{ $list->invoice_date }}</td>
                        <td>{{ $list->invoice_no }}</td>
                        <td>{{ $list->patient->patient_name }}</td>
                        <td>{{ $list->prescriptonTicket->serial_no }}</td>
                        <td>{{ $list->doctor->name }}</td>
                        <td>{{ $list->payable_amount }}</td>
                        <td>{{ $list->discount }}%</td>
                        <td>{{ $list->total_amount }}</td>
                        <td>{{ $list->person_id }}</td>
                        <td class="actions">
                          <a href="{{route('prescriptionTicket.view', $list->id)}}"><i class="fas fa-print text-danger"></i></a>
                          <a href="{{route('prescriptionTicket.view', $list->id)}}"><i class="fas fa-eye text-info"></i></a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot id="table_footer" style="background: #F0F3FF">
                    <tr class="text-center">
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>Column Total :</th>
                      <th class="Int"></th>
                      <th></th>
                      <th class="Int"></th>
                      <th></th>
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
    var to_date ='';
    var from_date ='';
    var invoice_id ='';

    //invoice search
    $('#invoice_no').on('keyup',function(){
      $('#invoice_search_result').css('display','none');
      $('#patient_search_result').css('display','none');
      $('#doctor_search_result').css('display','none');
      $('#broker_search_result').css('display','none');

      var action_url = "{{ route('customSearch.invoiceSearch') }}";
      var value=$(this).val();
      if(value.length >= '2'){
        $.ajax({
          type : 'get',
          url : action_url,
          data:{'search':value},

          success:function(data){
            $('#invoice_search_result').css('display','block');
            $('#invoice_search_result').html(data);
          }
        });
      }
      else{
        $('#invoice_search_result').html('');
        $('#invoice_search_result').css('display','none');
      }

    });

    //select invoice
    $(document).on('click', '#add_invoice', function(){
      var invoice_id = $(this).data('invoice_id');
      var invoice_no = $(this).data('invoice_no');
      $('#invoice_id').val(invoice_id);
      $('#invoice_no').val(invoice_no);
      $('#invoice_search_result').html('');
      $('#invoice_search_result').css('display','none');
    });


    var search_form = $('#search_form');
    var search_button = $('#search');
    search_button.removeClass('btn-progress');

    search_form.on('submit', function(event){
      event.preventDefault();
      var url = '{{ route("prescriptionCustomSearch.search") }}';
      from_date = $('#search_form #from_date').val();
      to_date = $('#search_form #to_date').val();
      invoice_id = $('#search_form #invoice_id').val();

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

      
    function dataTableFooter(){
      var table = $("#example").DataTable({
        "initComplete": function (settings, json) {
          var api = this.api();
          CalculateTableSummary(this);
        },

        "footerCallback": function ( row, data, start, end, display ) {
          var api = this.api(), data;	 
          CalculateTableSummary(this);
          return ;		
        }
      });
    }

    // datatable sum functions
    function CalculateTableSummary(table) {
      try {
        var intVal = function (i) {
        return typeof i === 'string' ?
          i.replace(/[\$,]/g, '') * 1 :
          typeof i === 'number' ?
          i : 0;
        };

        var api = table.api();
        api.columns(".sum").eq(0).each(function (index) {
          var column = api.column(index,{page:'current'});
          var sum = column
          .data()
          .reduce(function (a, b) {
            if(isNaN(a)){
              return '';
            }
            if(isNaN(b)){
              return '';
            }
          //return parseInt(a, 10) + parseInt(b, 10);
          return intVal(a) + intVal(b);
        }, 0);
              
        // if(sum==0){
        //   $('.table tfoot').hide();
        // }
        // else{
        //   $('.table tfoot').show();
        // }
        if ($(column.footer()).hasClass("Int")) {
          $(column.footer()).html('' + sum);
        } else {
          $(column.footer()).html('' + sum);
        }
        
      });
      } catch (e) {
        console.log('Error in CalculateTableSummary');
        console.log(e)
      }
    }
    
    //datatable
    dataTableFooter();

  });
</script>
@endsection


