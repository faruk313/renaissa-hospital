<?php $__env->startSection('title','Patient Lists'); ?>
<?php $__env->startSection('patients','active'); ?>
<?php $__env->startSection('patient_lists','active'); ?>
<?php $__env->startSection('template_css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="section">
	<div class="section-body">
		<div class="row mt-3">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
                        <h4 class="float-left">Patient Lists </h4>
                        <div class="btn-group ml-auto">
                            <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                            <a href="<?php echo e(route('patients.create')); ?>" class="btn btn-primary text-white ml-auto float-right">
                                <i class="fas fa-plus"></i>&nbsp;Add Patient
                            </a>
                        </div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="example" style="width: 100%">
								<thead>
									<tr class="text-center">
										<th sortable="false">#SL.</th>
                                        <th>Patient ID</th>
										<th>Patient Name</th>
										<th sortable="false">Mobile</th>
										<th>Age</th>
										<th>Gender</th>
										<th>Status</th>
										<th sortable="false">Actions</th>
									</tr>
                                </thead>
								<tbody class="text-center">
                                    <?php if($patients->count()>0): ?>
                                        <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="text-center">
                                                <td><?php echo e($i+1); ?></td>
                                                <td><?php echo e($patient->patient_uid); ?></td>
                                                <td><?php echo e($patient->patient_name); ?></td>
                                                <td><?php echo e($patient->patient_mobile); ?></td>
                                                <td><?php echo e($patient->patient_age); ?></td>
                                                <td>
                                                    <?php echo $patient->patient_gender==1? '<span class="badge-outline col-purple">Female</span>':'<span class="badge-outline col-cyan">Male</span>'; ?>

                                                </td>
                                                <td>
                                                    <?php echo $patient->patient_status == 1? '<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Inactive</span>'; ?>

                                                </td>
                                                <td>
                                                    <a type="button" id="view" data-id="<?php echo e($patient->id); ?>" class="view"><i class="far fa-eye text-success"></i></a>
                                                    <a href="<?php echo e(route('patients.edit',$patient->id)); ?>"><i class="fas fa-pencil-alt text-info"></i></a>
                                                    <a type="button" id="delete" data-id="<?php echo e($patient->id); ?>" class="delete"><i class="far fa-trash-alt text-danger"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
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
                <h5 class="modal-title" id="view_modal">Patient Info. Details</h5>
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

<!-- confirm modal -->
<div class="modal fade" id="confirm_modal" tabindex="-1" role="dialog" aria-labelledby="confirm_modal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form_delete" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <input type="hidden" id="delete_id" name="delete_id">
                <div class="modal-header bg-indigo">
                    <h5 class="modal-title" id="confirm_modal">Are You Sure ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure that you want to delete this entry?
                </div>
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-primary float-left" data-dismiss="modal" id="cancel_button"><i class="fas fa-times"></i> No</button>
                    <button type="submit" class="btn btn-danger float-right" id="confirm_button">Yes <i class="fas fa-check"></i></button>
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
        confirm_button.removeClass('btn-progress')
        $('select').selectric('refresh')
    }

    $('.modal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        confirm_button.removeClass('btn-progress')
        $('select').selectric('refresh')
    })

    var html =''
    var result = $('#result')
    var view_result = $('#view_result')
    var view_modal = $('#view_modal')
    var confirm_modal = $('#confirm_modal')

  
    var ok_update = $('#ok_update').hide()
    var confirm_button = $('#confirm_button')
    var cancel_button = $('#cancel_button')
    var ok_button = $('#ok_button').hide()

    $(document).ready(function(){
                    
        //datatable
        dataTableFooter();
        //view
        $(document).on('click', '#view', function(){
            var id = $(this).data('id');
            var url = '<?php echo e(route("patients.view",":id")); ?>';
            url = url.replace(':id',id);

            $.ajax({
                url :url,
                dataType:"json",
                success:function(data)
                {
                    view_modal.modal('show')
                    var patient_status =''
                    var patient_gender =''

                    var data = data.result
                    var created_by = data.user

                    if(data.patient_status == 1){
                        patient_status =' <span class="badge-outline col-green">Active</span>'
                    }
                    if(data.patient_status == 0){
                        patient_status ='<span class="badge-outline col-red">Inactive</span>'
                    }
                    
                    if(data.patient_gender == 1){
                        patient_gender ='Female'
                    }
                    if(data.patient_gender == 0){
                        patient_gender ='Male'
                    }

                    if(data.patient_address == null){
                        patient_address = '---';
                    }
                    if(data.patient_address != null){
                        patient_address = data.patient_address;
                    }

                    if(data.patient_note == null){
                        patient_note = '---';
                    }
                    if(data.patient_note != null){
                        patient_note = data.patient_note;
                    }
                  
                    html =`
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Patient ID : </span>
                                        <span class="">`+data.patient_uid+`</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Full Name : </span>
                                        <span class="">`+data.patient_name+`</span>
                                    </li>
                                    
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Mobile Number : </span>
                                        <span class="">`+data.patient_mobile+`</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Gender/Age : </span>
                                        <span class="">`+patient_gender+`/`+data.patient_age+`</span>
                                       
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Status : </span>
                                        `+patient_status+`
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item align-items-center">
                                        <span class="font-weight-bold">Patient Address : </span>
                                        <p>`+patient_address+`</p>
                                    </li>
                                    <li class="list-group-item align-items-center">
                                        <span class="font-weight-bold">Patient Address : </span>
                                        <p>`+patient_note+`</p>
                                    </li>
                                   
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Created At : </span>
                                        <span class="">`+data.created_at+`</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold">Created By : </span>
                                        <span class="">`+created_by.name+`</span>
                                    </li>
                                    
                                </ul>
                            </div>
                           
                        </div>

                    `
                    view_result.html(html)
                }
            })
        });//view

        //delete
        $(document).on('click', '#delete', function(){
            reset()
            confirm_button.show();
            cancel_button.show();
            ok_button.hide();

            confirm_modal.modal('show')
            var id = $(this).data('id');
            $('#form_delete #delete_id').val(id);
            var url = '<?php echo e(route("patients.destroy",":id")); ?>';
            url = url.replace(':id',id);
            $('#form_delete').attr('action',url);
        });//delete

    });
</script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\renaissa-hospital\resources\views/admin/pages/patients/patient_lists.blade.php ENDPATH**/ ?>