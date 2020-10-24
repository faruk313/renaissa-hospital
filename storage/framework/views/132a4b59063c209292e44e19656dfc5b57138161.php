<?php $__env->startSection('title','Pathology Test Lists'); ?>
<?php $__env->startSection('tests','active'); ?>
<?php $__env->startSection('template_css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="section">
	<div class="section-body">
		<div class="row mt-3">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
                        <h4 class="float-left">Pathology Tests</h4>
                        <div class="btn-group ml-auto">
                            <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                            <a type="button" id="add_new" class="btn btn-primary text-white ml-auto float-right">
                                <i class="fas fa-plus"></i>&nbsp;Add New
                            </a>
                        </div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="testTable" style="width: 100%">
								<thead>
									<tr class="text-center">
										<th>#SL.</th>
										<th>&nbsp;&nbsp;&nbsp;Test&nbsp;Code&nbsp;&nbsp;&nbsp;</th>
										<th>&nbsp;&nbsp;&nbsp;Test&nbsp;Name&nbsp;&nbsp;&nbsp;</th>
										<th>Unit&nbsp;Price(BDT)</th>
										<th>Patient&nbsp;Dis.(%)</th>
										<th>Delivery&nbsp;(Days)</th>
										<th>Actions</th>
									</tr>
                                </thead>
								<tbody class="text-center">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- view Modal -->
<div class="modal fade" id="view_modal" tabindex="-1" role="dialog" aria-labelledby="view_modal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-indigo">
                <h5 class="modal-title" id="view_modal">Pathology Test Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="view_result">
                
            </div>
            <div class="modal-footer bg-white br">
                <button type="button" data-dismiss="modal" class="btn btn-danger waves-effect float-right">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Add Modal -->
<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="add_modal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-indigo">
                <h5 class="modal-title" id="add_modal">Add New Pathology Test</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="add_form">
                <div class="modal-body">
                    <input type="hidden" name="_method" id="method" value="POST">
                    <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="test_code">Test Code<span class="text-danger">&nbsp;*</span></label>
                                <input type="text" name="test_code" id="test_code" class="form-control" value="<?php echo e(old('test_code')); ?>" placeholder="Code ..." required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="test_name">Test Name<span class="text-danger">&nbsp;*</span></label>
                                <input type="text" name="test_name" id="test_name" class="form-control" value="<?php echo e(old('test_name')); ?>" placeholder="Name ..." required="">
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label for="test_room">Sample Collection Room<span class="text-danger">&nbsp;*</span></label>
                                <select class="form-control selectric" name="test_room" id="test_room" required="" style="height: :40px">
                                    <option selected disabled>Select Room</option>
                                    <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($room->code); ?>"><?php echo e($room->code); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="test_price">Unit&nbsp;Price&nbsp;(BDT)<span class="text-danger">&nbsp;*</span></label>
                                <input type="number" name="test_price" id="test_price" class="form-control" value="<?php echo e(old('test_price')); ?>" placeholder="Tk." min="0" required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="patient_discount">Patient Discount&nbsp;(%)<span class="text-danger">&nbsp;*</span></label>
                                <input type="number" name="patient_discount" id="patient_discount" class="form-control" value="<?php echo e(old('patient_discount')); ?>" placeholder="%" min="0" max="100" required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="doctor_discount">Doctor Discount&nbsp;(%)<span class="text-danger">&nbsp;*</span></label>
                                <input type="number" name="doctor_discount" id="doctor_discount" class="form-control" value="<?php echo e(old('doctor_discount')); ?>" placeholder="%" min="0" max="100" required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="test_duration">Delivery&nbsp;Time&nbsp;(Days)<span class="text-danger">&nbsp;*</span></label>
                                <input type="number" name="test_duration" id="test_duration" class="form-control" value="<?php echo e(old('test_duration')); ?>" placeholder="Days .." min="0" max="30" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <label for="test_suggestion">Test Suggestion (If Any)</label>
                            <textarea name="test_suggestion" class="form-control" id="test_suggestion" placeholder="Test Suggestion"><?php echo e(old('test_suggestion')); ?></textarea>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="test_status" class="d-block">Test Status<span class="text-danger">&nbsp;*</span></label>
                                <div class="custom-control custom-radio custom-control-inline mt-3">
                                    <input type="radio" id="radio1" name="test_status" class="custom-control-input" value="1" checked>
                                    <label class="custom-control-label" for="radio1">Active</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline mt-3">
                                    <input type="radio" id="radio2" value="0" name="test_status" class="custom-control-input">
                                    <label class="custom-control-label" for="radio2">Inactive</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-white br">
                    <button type="button" class="btn btn-danger float-left" data-dismiss="modal" id="cancel_button"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" id="add_button" class="btn btn-success waves-effect float-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="edit_modal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-indigo">
                <h5 class="modal-title" id="edit_modal">Update Pathology Test</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit_form">
                <div class="modal-body">
                    <input type="hidden" name="_method" id="method" value="POST">
                    <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
                    <input type="hidden" name="update_id" id="update_id" value="">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="test_code">Test Code<span class="text-danger">&nbsp;*</span></label>
                                <input type="text" name="test_code" id="test_code" class="form-control" value="<?php echo e(old('test_code')); ?>" placeholder="Code ..." required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="test_name">Test Name<span class="text-danger">&nbsp;*</span></label>
                                <input type="text" name="test_name" id="test_name" class="form-control" value="<?php echo e(old('test_name')); ?>" placeholder="Name ..." required="">
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label for="test_room2">Sample Collection Room<span class="text-danger">&nbsp;*</span></label>
                                <select class="form-control selectric" name="test_room" id="test_options" required="" style="height: :40px">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="test_price">Unit Price (BDT)<span class="text-danger">&nbsp;*</span></label>
                                <input type="number" name="test_price" id="test_price" class="form-control" value="<?php echo e(old('test_price')); ?>" placeholder="Tk." min="0" required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="patient_discount">Patient Discount (%)<span class="text-danger">&nbsp;*</span></label>
                                <input type="number" name="patient_discount" id="patient_discount" class="form-control" value="<?php echo e(old('patient_discount')); ?>" placeholder="%" min="0" max="100" required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="doctor_discount">Doctor Discount (%)<span class="text-danger">&nbsp;*</span></label>
                                <input type="number" name="doctor_discount" id="doctor_discount" class="form-control" value="<?php echo e(old('doctor_discount')); ?>" placeholder="%" min="0" max="100" required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="test_duration">Delivery Time (Days)<span class="text-danger">&nbsp;*</span></label>
                                <input type="number" name="test_duration" id="test_duration" class="form-control" value="<?php echo e(old('test_duration')); ?>" placeholder="Days" min="0" max="30" required="">
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <label for="test_suggestion">Test Suggestion (If Any)</label>
                            <textarea name="test_suggestion" class="form-control" id="test_suggestion" placeholder="Test Suggestion"><?php echo e(old('test_suggestion')); ?></textarea>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="test_status" class="d-block">Test Status<span class="text-danger">&nbsp;*</span></label>
                                <div class="custom-control custom-radio custom-control-inline mt-3">
                                    <input type="radio" id="test_status1" name="test_status" class="custom-control-input" value="1">
                                    <label class="custom-control-label" for="test_status1">Active</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline mt-3">
                                    <input type="radio" id="test_status2" value="0" name="test_status" class="custom-control-input">
                                    <label class="custom-control-label" for="test_status2">Inactive</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-white br">
                    <button type="button" class="btn btn-danger float-left" data-dismiss="modal" id="cancel_button"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" id="update_button" class="btn btn-success waves-effect float-right">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- confirm modal -->
<div class="modal fade" id="confirm_modal" tabindex="-1" role="dialog" aria-labelledby="confirm_modal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="confirm_form">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <input type="hidden" id="delete_id" name="delete_id">
                <div class="modal-header bg-indigo">
                    <h5 class="modal-title" id="confirm_modal"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="confirm_msg"></span>
                </div>
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-primary float-left" data-dismiss="modal" id="cancel_button"><i class="fas fa-times"></i> No</button>
                    <button type="button" class="btn btn-danger float-right" id="confirm_button">Yes <i class="fas fa-check"></i></button>
                </div>
            </form>    
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_js'); ?>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    function reset(){
        $(this).find('form').trigger('reset');
        add_button.removeClass('btn-progress')
        update_button.removeClass('btn-progress')
        confirm_button.removeClass('btn-progress')
        $('select').selectric('refresh')
    }

    $('.modal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        add_button.removeClass('btn-progress')
        update_button.removeClass('btn-progress')
        confirm_button.removeClass('btn-progress')
        $('select').selectric('refresh')
    })

    var html =''
    var result = $('#result')
    var view_result = $('#view_result')
    var view_modal = $('#view_modal')
    var add_modal = $('#add_modal')
    var edit_modal = $('#edit_modal')
    var confirm_modal = $('#confirm_modal')

    
    var add_button = $('#add_button')
    var update_button = $('#update_button')
    var ok_update = $('#ok_update').hide()
    var update_msg = $('#update_msg')
    var confirm_button = $('#confirm_button')
    var cancel_button = $('#cancel_button')
    var ok_button = $('#ok_button').hide()
    var confirm_msg = $('#confirm_msg')

    $(document).ready(function(){
        $('#testTable').DataTable({
            processing: false,
            serverSide: true,
            responsive: true,
            dom: '<"toolbar">frtip',
            ajax: {
                url: "<?php echo e(route('pathologyTests')); ?>",
            },
           
            columns: [
                { data: 'DT_RowIndex', name:'DT_RowIndex'},
                { data: "test_code", name:"test_code"},
                { data: "test_name", name:"test_name"},
                { data: "test_price", name:"test_price"},
                { data: "patient_discount", name:"patient_discount", orderable: false, searchable: false},
                { data: "test_duration", name:"test_duration", orderable: false, searchable: false},
                { data: "actions", name:"actions", orderable: false, searchable: false}
            ]
        })
        
        $(document).on('click', '#view', function(){
            var test =''
            var rooms =''

            var id = $(this).data('id');
            var url = '<?php echo e(route("pathologyTests.view",":id")); ?>';
            url = url.replace(':id',id);

            $.ajax({
                url :url,
                dataType:"json",
                success:function(data)
                {
                    view_modal.modal('show')

                    test = data.test
                    rooms = data.rooms

                    var status =''
                    var test_suggestion =''

                    if(test.test_status == 1){
                       status =' <span class="badge badge-success badge-pill">Active</span>'
                    }
                    if(test.test_status == 0){
                        status ='<span class="badge badge-danger badge-pill">Inactive</span>'
                    }
                    
                    if(test.test_suggestion == null){
                        test_suggestion ='<span class="badge badge-danger badge-pill">N/A</span>'
                    }
                    else{
                        test_suggestion= test.test_suggestion
                    }
                  
                    html =`
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item align-items-center">
                                        <span class="font-weight-bold">Test Code: </span>
                                        <p class="mt-2">`+test.test_code+`</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Unit Price: </span>
                                        <span class="badge badge-danger badge-pill">`+test.test_price+` BDT</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Collection Room: </span>
                                        <span class="badge badge-info badge-pill">`+test.test_room+`</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Delivery Time: </span>
                                        <span class="badge badge-success badge-pill">`+test.test_duration+` Day(s)</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item align-items-center">
                                        <span class="font-weight-bold">Test Name: </span>
                                        <p class="mt-2">`+test.test_name+`</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Patient Discount: </span>
                                        <span class="badge badge-primary badge-pill">`+test.patient_discount+` %</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Doctor Discount: </span>
                                        <span class="badge badge-primary badge-pill">`+test.doctor_commission+` %</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Test Status: </span>
                                        `+status+`
                                    </li>
                                    
                                </ul>  
                            </div>
                            <div class="col-md-12 mt-2">
                                <ul class="list-group">
                                    <li class="list-group-item align-items-center">
                                        <span class="font-weight-bold">Suggestion: </span>
                                        <p class="mt-2">`+test_suggestion+`</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    `
                    view_result.html(html)
                }
            })
        })

        $('#add_new').click(function(){
            reset()
            add_modal.modal('show')
        });

        $('#add_form').on('submit', function(event){
            event.preventDefault()
            var url = '<?php echo e(route("pathologyTests.store")); ?>'
            $.ajax({
                url:url,
                method: "POST",
                data: $(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                    add_modal.find('.modal-title').text('Sending ...')
                    add_button.addClass('btn-progress');
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
                    
                        $('#add_button').removeClass('btn-progress');
                        add_modal.find('.modal-title').text('Error')
                    }
                    if(data.success)
                    {
                        
                        setTimeout(function(){
                            iziToast.success({
                                title: 'Success!',
                                message: data.success,
                                position: 'topRight'
                            })
                            add_modal.find('.modal-title').text('Successful')
                            $('#add_form')[0].reset();
                            $('select').selectric('refresh');
                            $('#test_room').prop('selectedIndex',0);
                            $('#add_button').removeClass('btn-progress');
                            $('#testTable').DataTable().ajax.reload();
                            add_modal.modal('toggle')

                        }, 1000);
                
                    }    
                }
            })
            
        })

        $(document).on('click', '#edit', function(){
            reset()
            update_msg.text('')
            edit_modal.modal('show')
            update_button.show()
            ok_update.hide()
            edit_modal.find('.modal-title').text('Update Pathology Test')
            var id = $(this).data('id');
            var url = '<?php echo e(route("pathologyTests.edit",":id")); ?>';
            url = url.replace(':id',id);

            $.ajax({
                url :url,
                dataType:"json",
                success:function(data)
                {
                    var test = data.test
                    var rooms = data.rooms
                    var options = ''
                    
                    console.log(test.doctor_commision)
                    $('#edit_form #update_id').val(test.id);
                    $('#edit_form #test_code').val(test.test_code)
                    $('#edit_form #test_name').val(test.test_name)
                    $('#edit_form #test_price').val(test.test_price)
                    $('#edit_form #patient_discount').val(test.patient_discount)
                    $('#edit_form #doctor_discount').val(test.doctor_commission)
                    $('#edit_form #test_duration').val(test.test_duration)
                    $('#edit_form #test_suggestion').val(test.test_suggestion)
                   
                    $("#edit_form #test_room option[value='1']").attr('selected', 'selected')
                    if (test.test_status == 1){
                        $('#edit_form #test_status1').prop('checked', true)
                    }
                    if (test.test_status == 0){
                        $('#edit_form #test_status2').prop('checked', true)
                    }
                  
                    var text = ''
                    var selected = ''      
                    text+='<option disabled> — Select Room — </option>'
                    $.each(rooms, function(key, val){
                        if(val.code== test.test_room){
                            selected ="selected"
                        }
                        else{
                            selected=""
                        }
                        text+='<option value="'+val.code+'" '+selected+'>'+val.code+'</option>'
                    })
                    $('#test_options').html(text);
                    $('select').selectric();
                    edit_modal.modal('show')
                }
            })
        })

        $('#edit_form').on('submit', function(event){
            event.preventDefault()
            var update_id = $('#edit_form #update_id').val();
            var update_url = '<?php echo e(route("pathologyTests.update",":update_id")); ?>';
            update_url = update_url.replace(':update_id',update_id);

            $.ajax({
                url:update_url,
                type:"PUT",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                    edit_modal.find('.modal-title').text('Updating ...')
                    update_button.addClass('btn-progress');
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
                        edit_modal.find('.modal-title').text('Failed ...')
                        update_button.removeClass('btn-progress');
                    }
                    if(data.success)
                    {
                        setTimeout(function(){
                            $('#testTable').DataTable().ajax.reload()
                            edit_modal.modal('toggle')
                            reset()
                        }, 1000);

                        iziToast.success({
                            title: 'Success!',
                            message: data.success,
                            position: 'topRight'
                        });
                    }    
                }
            })
        })

        $(document).on('click', '#delete', function(){
            reset()
            confirm_button.show();
            cancel_button.show();
            ok_button.hide();
            confirm_modal.find('.modal-title').text('Are You Sure ?')
            confirm_msg.text(' Are you sure that you want to delete this entry?')
            confirm_modal.modal('show')
            var id = $(this).data('id');
            confirm_button.click(function(){
                var url = '<?php echo e(route("pathologyTests.destroy",":id")); ?>';
                url = url.replace(':id',id);
                $.ajax({
                    url:url,
                    type:"DELETE",
                    data:{id:id},
                    dataType:"json",
                    beforeSend:function(){
                        confirm_modal.find('.modal-title').text('Deleting ...')
                        confirm_button.addClass('btn-progress');
                    },
                    success:function(data)
                    {
                        setTimeout(function(){
                            confirm_button.removeClass('btn-progress');
                            confirm_modal.modal('toggle')
                            $('#testTable').DataTable().ajax.reload();
                        }, 500);
                       
                        iziToast.warning({
                            title: 'Warning!',
                            message: data.warning,
                            position: 'topRight'
                        });
                    }
                })
            })
        })

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\renaissa-hospital\resources\views/admin/pages/pathology_tests/pathology_test_lists.blade.php ENDPATH**/ ?>