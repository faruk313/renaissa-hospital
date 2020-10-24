@extends('layouts.master')
@section('title','Doctor Departments')
@section('departments','active')
@section('doctor_departments','active')
@section('template_css')
@endsection
@section('content')
<section class="section">
	<div class="section-body">
		<div class="row mt-3">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
                        <h4 class="float-left">Doctor Departments</h4>
                        <div class="btn-group ml-auto">
                            <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                            <a type="button" id="add_btn" class="btn btn-primary text-white ml-auto float-right">
                                <i class="fas fa-plus"></i>&nbsp;Add New
                            </a>
                        </div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="example" style="width: 100%">
								<thead>
									<tr class="text-center">
										<th>#SL.</th>
										<th>Department&nbsp;Name</th>
										<th>Department&nbsp;Note</th>
										<th>Department&nbsp;Status</th>
                                        <th>Created&nbsp;At</th>
										<th sortable="false">Actions</th>
									</tr>
                                </thead>
                                
								<tbody class="text-center">
                                    @if ($doctor_departments->count()>0)
                                        @foreach ($doctor_departments as $i=>$department)
                                            <tr class="text-center">
                                                <td>{{ $i+1 }}</td>
                                                <td>{{ $department->department_name }}</td>
                                                <td>{{ $department->department_note }}</td>
                                                <td>
                                                    {!! $department->department_status == 1? '<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Inactive</span>' !!}
                                                </td>
                                                <td>
                                                    {{ $department->created_at }}
                                                </td>
                                                <td>
                                                    <a type="button" id="show_btn" data-id="{{$department->id}}" class="show"><i class="far fa-eye text-success"></i></a>
                                                    <a type="button" id="edit_btn" data-id="{{$department->id}}" class="edit"><i class="fas fa-pencil-alt text-info"></i></a>
                                                    <a type="button" id="delete_btn" data-id="{{$department->id}}" class="delete"><i class="far fa-trash-alt text-danger"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        
                                    @endif
                                   
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
<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-indigo">
                <h5 class="modal-title" id="add_modal">Add Doctor Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="add_form" method="POST" action="{{ route('doctorDepartments.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="doctor_department_name">Doctor Department Name<span class="text-danger">&nbsp;*</span></label>
                            <input type="text" id="doctor_department_name" name="doctor_department_name" class="form-control" placeholder="-----" required="">
                            <div class="invalid-feedback">
                                Oh no! Doctor Department Name?
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="doctor_department_note">Doctor Department Note (Optional)</label>
                            <input type="text" id="doctor_department_note" name="doctor_department_note" class="form-control" placeholder="-----">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="d-block">Doctor Department Status</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="doctor_department_status_1" name="doctor_department_status" class="custom-control-input" value="1" checked>
                                <label class="custom-control-label" for="doctor_department_status_1">Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="doctor_department_status_2" value="0" name="doctor_department_status" class="custom-control-input">
                                <label class="custom-control-label" for="doctor_department_status_2">Inactive</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-danger float-left" data-dismiss="modal" id="cancel_button"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" id="create" class="btn btn-success waves-effect float-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-indigo">
                <h5 class="modal-title text-white" id="edit_modal">Edit Doctor Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit_form" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="doctor_department_name">Doctor Department Name<span class="text-danger">&nbsp;*</span></label>
                            <input type="text" id="doctor_department_name" name="doctor_department_name" placeholder="Enter Department Name" class="form-control" required="">
                            <div class="invalid-feedback">
                                Oh no!Doctor Department Name?
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="doctor_department_note">Doctor Department Note (Optional)</label>
                            <input type="text" id="doctor_department_note" name="doctor_department_note" placeholder="Enter Department Note" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="d-block">Doctor Department Status</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="doctor_department_status1" name="doctor_department_status" class="custom-control-input" value="1">
                                <label class="custom-control-label" for="doctor_department_status1">Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="doctor_department_status2" value="0" name="doctor_department_status" class="custom-control-input">
                                <label class="custom-control-label" for="doctor_department_status2">Inactive</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
                    <button type="submit" id="update" class="btn btn-primary waves-effect float-right">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- delete modal -->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-body">
            <form id="delete_form" action="" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="delete_id" name="delete_id">
                <div class="modal-content">
                <div class="modal-header bg-indigo">
                    <h5 class="modal-title" id="delete_modal">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure that you want to delete this entry?
                </div>
                <div class="modal-footer bg-white br">
                    <button type="button" class="btn btn-primary float-left" data-dismiss="modal"><i class="fas fa-times"></i> No</button>
                    <button type="submit" class="btn btn-danger float-right" id="destroy">Yes <i class="fas fa-check"></i></button>
                </div>
            </form>    
        </div>
    </div>
</div>
@endsection

@section('page_js')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var add_btn = $('#add_btn');
    var edit_btn = $('#edit_btn');
    var show_btn = $('#show_btn');
    var delete_btn = $('#delete_btn');
    var create = $('#create');
    var update = $('#update');
    var destroy = $('#destroy');
    var add_modal = $('#add_modal');
    var edit_modal = $('#edit_modal');
    var delete_modal = $('#delete_modal');
    var add_form = $('#add_form');
    var edit_form = $('#edit_form');
    var delete_form = $('#delete_form');

    function reset(){
        $(this).find('form').trigger('reset');
        create.removeClass('btn-progress')
        update.removeClass('btn-progress')
        destroy.removeClass('btn-progress')
    }

    $('.modal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        create.removeClass('btn-progress')
        update.removeClass('btn-progress')
        destroy.removeClass('btn-progress')
    })

    $(document).ready(function(){
       
        add_btn.click(function(){
            reset();
            add_modal.modal('show');
        });
        
        $(document).on('click', '.edit', function(){
            reset();
            var edit_id = $(this).data('id');
            var edit_url = '{{ route("doctorDepartments.edit",":edit_id") }}';
            edit_url = edit_url.replace(':edit_id',edit_id);

            $.ajax({
                url :edit_url,
                dataType:"json",
          
                success:function(data)
                {
                    var update_url = '{{ route("doctorDepartments.update",":update_id") }}';
                    update_url = update_url.replace(':update_id',data.result.id);

                    $('#edit_form').attr("action":update_url);
                    
                    $('#edit_form #doctor_department_name').val(data.result.department_name);
                    $('#edit_form #doctor_department_note').val(data.result.department_note);
                    if (data.result.department_status == 1){
                        $('#edit_form #doctor_department_status1').prop('checked', true)
                    }
                    if (data.result.department_status == 0){
                        $('#edit_form #doctor_department_status2').prop('checked', true)
                    }   
                    edit_modal.modal('show');
                }
            })
        });

        edit_form.on('submit', function(event){
            event.preventDefault();
            var update_url = '';
            var update_id = '';
            update_id = $('#update_id').val();
            update_url = '{{ route("doctorDepartments.update",":update_id") }}';
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
                            $('#doctor_department_table').DataTable().ajax.reload();
                            $('#edit_form')[0].reset();
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

        $(document).on('click', '#delete_btn', function(){
            delete_id = $(this).attr('id');
            $('#confirmModal').modal('show');
            $('#delete').text('Are You Sure?');
            $('#delete_id').val(delete_id);
            $('#delete_result').html('');
        });

        $('#ok_button').click(function(){
            var del_id = $('#delete_id').val();
            var del_url = '{{ route("doctorDepartments.destroy",":del_id") }}';
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
                        $('#doctor_department_table').DataTable().ajax.reload();
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


