@extends('layouts.master')
@section('title','Pathology Departments')
@section('departments','active')
@section('pathology_departments','active')
@section('template_css')
{{--  <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">  --}}
@endsection
@section('content')
<section class="section">
	<div class="section-body">
		<div class="row mt-3">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
                        <h4 class="float-left">Pathology Departments</h4>
                        <div class="btn-group ml-auto">
                            <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                            <a type="button" name="create_record" id="create_record" class="btn btn-primary text-white ml-auto float-right">
                                <i class="fas fa-plus"></i>&nbsp;Add New
                            </a>
                        </div>
					</div>
					<div class="card-body">
						<div class="table-responsive" id="">
							<table class="table table-striped table-hover" id="pathology_department_table" style="width: 100%">
								<thead>
									<tr class="text-center">
										<th>#SL.</th>
										<th>Department Name</th>
										<th>Department Note</th>
										<th>Department Status</th>
                                        <th>Created At</th>
										<th sortable="false">Actions</th>
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
<!-- Add Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-indigo">
                <h5 class="modal-title" id="formModal">Add Pathology Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="add_form" method="post">
                <div class="modal-body">
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pathology_department_name">Pathology Department Name<span class="text-danger">&nbsp;*</span></label>
                            <input type="text" id="pathology_department_name" name="pathology_department_name" class="form-control" placeholder="Enter Department Name" required="">
                            <div class="invalid-feedback">
                                Oh no! Pathology Department Name?
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pathology_department_note">Pathology Department Note (Optional)</label>
                            <input type="text" id="pathology_department_note" name="pathology_department_note" class="form-control" placeholder="Enter Department Note">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="d-block">Pathology Department Status</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pathology_department_status_1" name="pathology_department_status" class="custom-control-input" value="1" checked>
                                <label class="custom-control-label" for="pathology_department_status_1">Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pathology_department_status_2" value="0" name="pathology_department_status" class="custom-control-input">
                                <label class="custom-control-label" for="pathology_department_status_2">Inactive</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-danger float-left" data-dismiss="modal" id="cancel_button"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" id="add_button" class="btn btn-success waves-effect float-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-indigo">
                <h5 class="modal-title text-white" id="edit">Edit Pathology Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="update_form">
                <div class="modal-body">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="update_id" name="update_id">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pathology_department_name">Pathology Department Name<span class="text-danger">&nbsp;*</span></label>
                            <input type="text" id="pathology_department_name" name="pathology_department_name" placeholder="Enter Department Name" class="form-control" required="">
                            <div class="invalid-feedback">
                                Oh no!Pathology Department Name?
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pathology_department_note">Pathology Department Note (Optional)</label>
                            <input type="text" id="pathology_department_note" name="pathology_department_note" placeholder="Enter Department Note" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="d-block">Pathology Department Status</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pathology_department_status1" name="pathology_department_status" class="custom-control-input" value="1">
                                <label class="custom-control-label" for="pathology_department_status1">Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pathology_department_status2" value="0" name="pathology_department_status" class="custom-control-input">
                                <label class="custom-control-label" for="pathology_department_status2">Inactive</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
                    <button type="submit" id="action_update" class="btn btn-primary waves-effect float-right">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- delete modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-body">
            <form id="delete_form">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="delete_id" name="delete_id">
                <div class="modal-content">
                <div class="modal-header bg-indigo">
                    <h5 class="modal-title" id="delete">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure that you want to delete this entry?
                </div>
                <div class="modal-footer bg-white br">
                    <button type="button" class="btn btn-primary float-left" data-dismiss="modal"><i class="fas fa-times"></i> No</button>
                    <button type="button" class="btn btn-danger float-right" id="ok_button">Yes <i class="fas fa-check"></i></button>
                </div>
            </form>    
        </div>
    </div>
</div>
@endsection

@section('page_js')
{{--  <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/page/datatables.js') }}"></script>  --}}

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
        $('.modal').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
        })
        $('#pathology_department_table').DataTable({
            processing: false,
            serverSide: true,
            ajax: {
                url: "{{ route('pathologyDepartments') }}",
            },
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: true
                },
                {
                    data: 'pathology_department_name',
                    name: 'pathology_department_name'
                },
                {
                    data: 'pathology_department_note',
                    name: 'pathology_department_note'
                },
                {
                    data: 'pathology_department_status',
                    name: 'pathology_department_status'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false
                }
            ]
        });

        $('#create_record').click(function(){
            $('#add_result').html('');
            $('#formModal').modal('show');
        });
        
        $('#add_form').on('submit', function(event){
            event.preventDefault();
            var action_url = '';
            action_url = "{{ route('pathologyDepartments.store') }}";
            $.ajax({
                url: action_url,
                method:"POST",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                    $('#add_button').text('Sending...');
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
                        $('#add_button').text('Submit');
                    }
                    if(data.success)
                    {
                        setTimeout(function(){
                            $('#add_form')[0].reset();
                            $('#add_button').text('Submit');
                            $('#pathology_department_table').DataTable().ajax.reload();
                            $('#formModal').modal('toggle');
                        }, 1000);
                        iziToast.success({
                            title: 'Success!',
                            message: data.success,
                            position: 'topRight'
                        });
                    }  
                }
            });
        });

        $(document).on('click', '.edit', function(){
            var id = $(this).attr('id');
            var url = '{{ route("pathologyDepartments.edit",":id") }}';
            url = url.replace(':id',id);
            $('#update_result').html('');
            $.ajax({
                url :url,
                dataType:"json",
                success:function(data)
                {
                    $('#update_id').val(data.result.id);
                    $('#update_form #pathology_department_name').val(data.result.pathology_department_name);
                    $('#update_form #pathology_department_note').val(data.result.pathology_department_note);
                    if (data.result.pathology_department_status == 1){
                        $('#update_form #pathology_department_status1').prop('checked', true)
                    }
                    if (data.result.pathology_department_status == 0){
                        $('#update_form #pathology_department_status2').prop('checked', true)
                    }   
                    $('#editModal').modal('show');
                }
            })
        });
        $('#update_form').on('submit', function(event){
            event.preventDefault();
            var update_url = '';
            var update_id = '';
            update_id = $('#update_id').val();
            update_url = '{{ route("pathologyDepartments.update",":update_id") }}';
            update_url = update_url.replace(':update_id',update_id);
            $.ajax({
                url: update_url,
                type:"PUT",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                    $('#action_update').text('Updating...');
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
                        $('#action_update').text('Update');
                    }

                    if(data.success)
                    {
                        setTimeout(function(){
                            $('#pathology_department_table').DataTable().ajax.reload();
                            $('#update_form')[0].reset();
                            $('#action_update').text('Update');
                            $('#editModal').modal('hide');
                            
                        }, 1000);
                        iziToast.success({
                        title: 'Success!',
                        message: data.success,
                        position: 'topRight'
                    });
                    }    
                }
            });
        });

        $(document).on('click', '.delete', function(){
            id = $(this).attr('id');
            $('#confirmModal').modal('show');
            $('#delete').text('Are You Sure?');
            $('#delete_id').val(id);
            $('#delete_result').html('');
        });

        $('#ok_button').click(function(){
            var del_id = $('#delete_id').val();
            var del_url = '{{ route("pathologyDepartments.destroy",":del_id") }}';
            del_url = del_url.replace(':del_id',id);

            $.ajax({
                url:del_url,
                type:"DELETE",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                    $('#delete').text('Deleting...');
                    $('#ok_button').addClass('btn-progress');
                },
                success:function(data)
                {
                    setTimeout(function(){
                        $('#pathology_department_table').DataTable().ajax.reload();
                        $('#delete').text('Successfully');
                        $('#ok_button').removeClass('btn-progress');
                        $('#confirmModal').modal('toggle');
                    }, 500);
                    iziToast.warning({
                        title: 'Warning!',
                        message: data.success,
                        position: 'topRight'
                    });
                }
            })
           
        });
    });
</script>
@endsection