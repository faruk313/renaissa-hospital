<?php $__env->startSection('title','Prescription Ticket List'); ?>
<?php $__env->startSection('test_invoices','active'); ?>
<?php $__env->startSection('test_invoice_list','active'); ?>
<?php $__env->startSection('template_css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Prescription Ticket List</h4>
              <div class="btn-group ml-auto">
                <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
              </div>
            </div>
            <div class="card-body">
              <form id="search_form">
                <input type="hidden" name="_method" id="method" value="POST">
                <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
                <div class="row py-2 mb-3" style="border: 1px dashed #333">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="from_date">From Date</label>
                      <input type="date" id="from_date" name="from_date" value="<?php echo e(old('from_date')); ?>" class="form-control" placeholder="-----">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="to_date">To Date</label>
                      <input type="date" id="to_date" name="to_date" value="<?php echo e(old('to_date')); ?>" class="form-control" placeholder="-----">
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
                <div class="table-responsive" id="prescriptionTable">
                    <table class="table table-striped table-hover" id="example" style="width:100%;">
                      <thead>
                        <tr class="text-center" id="total_count">
                          <?php echo $total_count; ?>

                        </tr>
                        <tr class="text-center">
                          <th>#SL</th>
                          <th>Invoice&nbsp;Date</th>
                          <th>Invoice&nbsp;No</th>
                          <th>&nbsp;&nbsp;&nbsp;Patient&nbsp;&nbsp;&nbsp;</th>
                          <th>&nbsp;&nbsp;&nbsp;Doctor&nbsp;&nbsp;&nbsp;</th>
                          <th>Ref.&nbsp;Person</th>
                          <th class="sum">Total&nbsp;Amount</th>
                          <th>Discount&nbsp;(%)</th>
                          <th class="sum">Net&nbsp;Amount</th>
                          <th data-sortable="false">Actions</th>
                        </tr>
                      </thead>
  
                      <tbody id="custom_table">
                        <?php $__currentLoopData = $patient_tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr class="text-center">
                            <td><?php echo e($i+1); ?></td>
                            <td><?php echo e($list->invoice_date); ?></td>
                            <td><?php echo e($list->invoice_no); ?></td>
                            <td><?php echo e($list->patient->patient_name); ?></td>
                            <td><?php echo e($list->doctor->name); ?></td>
                            <td><?php echo e($list->person->ref_user_name); ?></td>
                            <td><?php echo e($list->total_amount); ?></td>
                            <td><?php echo e($list->discount); ?> %</td>
                            <td><?php echo e($list->payable_amount); ?></td>
                            
                            <td class="actions">
                              <a href="<?php echo e(route('patientTests.view', $list->id)); ?>"><i class="fas fa-eye text-info"></i></a>
                            </td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                      <tfoot id="table_footer" style="background: #F0F3FF">
                        <tr class="text-center">
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th>Column&nbsp;Total: </th>
                          <th class="Int"></th>
                          <th></th>
                          <th class="Int"></th>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_js'); ?>
<script>
  $(document).ready(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  
    //invoice search
    // $('#invoice_no').on('keyup',function(){
    //   $('#invoice_search_result').css('display','none');

    //   var action_url = "<?php echo e(route('customSearch.invoiceSearch')); ?>";
    //   var value=$(this).val();
    //   if(value.length >= '2'){
    //     $.ajax({
    //       type : 'get',
    //       url : action_url,
    //       data:{'search':value},

    //       success:function(data){
    //         $('#invoice_search_result').css('display','block');
    //         $('#invoice_search_result').html(data);
    //       }
    //     });
    //   }
    //   else{
    //     $('#invoice_search_result').html('');
    //     $('#invoice_search_result').css('display','none');
    //   }

    // });

    //select invoice
    // $(document).on('click', '#add_invoice', function(){
    //   var invoice_id = $(this).data('invoice_id');
    //   var invoice_no = $(this).data('invoice_no');
    //   $('#invoice_id').val(invoice_id);
    //   $('#invoice_no').val(invoice_no);
    //   $('#invoice_search_result').html('');
    //   $('#invoice_search_result').css('display','none');
    // });

    var search_form = $('#search_form');
    var search_button = $('#search');
    search_button.removeClass('btn-progress');

    search_form.on('submit', function(event){
      event.preventDefault();
      var url = '<?php echo e(route("testInvoiceCustomSearch.search")); ?>';
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

  });
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\renaissa-hospital\resources\views/admin/pages/patient_tests/list.blade.php ENDPATH**/ ?>