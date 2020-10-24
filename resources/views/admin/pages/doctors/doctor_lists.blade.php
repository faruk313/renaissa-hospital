@extends('layouts.master')
@section('title','Doctor Lists')
@section('doctors','active')
@section('doctors_list','active')
@section('template_css')

@endsection
@section('content')
<section class="section">
	<div class="section-body">
		<div class="row mt-3">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
                        <h4 class="float-left">Doctor Lists</h4>
                        <div class="btn-group ml-auto">
                            <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                            <a type="button" href="{{ route('doctors.create') }}" class="btn btn-primary text-white ml-auto float-right">
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
										<th>&nbsp;&nbsp;&nbsp;&nbsp;Full&nbsp;Name&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th data-sortable="false">&nbsp;&nbsp;&nbsp;&nbsp;Degrees&nbsp;/&nbsp;Specialities&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th>Type</th>
										<th>Leave&nbsp;/&nbsp;Present</th>
										<th data-sortable="false">Leave&nbsp;/&nbsp;Present&nbsp;Note</th>
										<th data-sortable="false">&nbsp;&nbsp;Actions&nbsp;&nbsp;</th>
									</tr>
                                </thead>
								<tbody class="text-center">
                                    @if ($doctors->count()>0)
                                       
                                        @foreach ($doctors as $i=>$doctor)
                                            @php
                                                $i=  $i+1;
                                                $type = $doctor->type;
                                                $leave_or_present_status='';
                                                if ($doctor->leave_or_present_status == 1){
                                                    $leave_or_present_status = '<a type="button" id="leavePresent" data-id="'.$doctor->id.'" class="btn btn-outline-primary">Present</a>';
                                                }
                                                elseif($doctor->leave_or_present_status == 0){
                                                    $leave_or_present_status = '  <a type="button" id="leavePresent" data-id="'.$doctor->id.'" class="btn btn-outline-danger">Leave</a>';
                                                }
                                                else{
                                                    $leave_or_present_status = 'Not Found';
                                                }

                                                if($type==1){
                                                    $type = '<span class="badge-outline col-green">Indoor</span>';
                                    
                                                }
                                                elseif($type==2){
                                                    $type = '<span class="badge-outline col-purple">Outdoor</span>';
                                                }
                                                elseif($type==3){
                                                    $type = '<span class="badge-outline col-blue">Contractual</span>';
                                                } 
                                                elseif($type==4){
                                                    $type = '<span class="badge-outline col-red">Outside</span>';
                                                    $leave_or_present_status = '<span class="badge-outline col-orange">N/A</span>';
                                                }
                                                else{
                                                    $type = "Not Found";
                                                    $leave_or_present_status = "Not Found";
                                                }
                                            @endphp
                                            <tr class="text-center">
                                                <td>{{ $i }}</td>
                                                <td>{{ $doctor->name }}</td>
                                                <td>{{ $doctor->degrees }}</td>
                                                <td>
                                                    {!! $type !!}
                                                </td>
                                                <td>
                                                    {!! $leave_or_present_status !!}
                                                </td>
                                                <td>{{ $doctor->leave_or_present_note }}</td>
                                                <td>
                                                    <a href="{{ route('doctors.show',$doctor->id) }}" class="view"><i class="far fa-eye text-success"></i></a>
                                                    <a type="button" id="edit" data-id="{{ $doctor->id }}" class="edit"><i class="fas fa-pencil-alt text-info"></i></a>
                                                    {{--  <a type="button" id="delete" data-id="{{ $doctor->id }}" class="delete"><i class="far fa-trash-alt text-danger"></i></a>  --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <p>No data</p>
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
<!-- leave or present -->
<div class="modal fade" id="leave_present_modal" tabindex="-1" role="dialog" aria-labelledby="leave_present_modal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-indigo">
                <h5 class="modal-title" id="leave_present_modal">Leave Or Present</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="leave_present_form" method="POST">
                <div class="modal-body" id="leave_present_result">
                    <div class="row">
                        <input type="hidden" name="_method" id="method" value="PUT">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input type="hidden" value="" name="update_leave_present_id" id="update_leave_present_id">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="doctor_leave_or_present_status" class="d-block">Present/Leave Status<span class="text-danger">&nbsp;*</span></label>
                                <div class="custom-control custom-radio custom-control-inline mt-2">
                                    <input type="radio" id="doctor_present_status1" name="doctor_leave_or_present_status" class="custom-control-input" value="1" checked>
                                    <label class="custom-control-label" for="doctor_present_status1">Present</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline mt-2">
                                    <input type="radio" id="doctor_present_status2" value="0" name="doctor_leave_or_present_status" class="custom-control-input">
                                    <label class="custom-control-label" for="doctor_present_status2">Leave</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="doctor_leave_or_present_note">Present/Leave Note</label>
                                <input type="text" id="doctor_leave_or_present_note" name="doctor_leave_or_present_note" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-white br">
                    <button type="button" class="btn btn-danger float-left" data-dismiss="modal" id="cancel_button"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" id="update_leave_present_button" class="btn btn-success waves-effect float-right">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- confirm modal -->
<div class="modal fade" id="confirm_modal" tabindex="-1" role="dialog" aria-labelledby="confirm_modal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="confirm_form" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                    <button type="submit" class="btn btn-danger float-right" id="confirm_button">Yes <i class="fas fa-check"></i></button>
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
    
    function reset(){
        $(this).find('form').trigger('reset');
        add_button.removeClass('btn-progress')
        update_button.removeClass('btn-progress')
        confirm_button.removeClass('btn-progress')

        leave_present_modal.find('.modal-title').text('Update Leave or Present')
    }

    $('.modal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        update_leave_present_button.removeClass('btn-progress')
        update_button.removeClass('btn-progress')
        confirm_button.removeClass('btn-progress')
    })

    var html =''
    var result = $('#result')
    var view_result = $('#view_result')
    var leave_present_modal = $('#leave_present_modal')
    var view_modal = $('#view_modal')
    var add_modal = $('#add_modal')
    var edit_modal = $('#edit_modal')
    var confirm_modal = $('#confirm_modal')

    
    var add_button = $('#add_button')
    var update_leave_present_button = $('#update_leave_present_button')
    var update_button = $('#update_button')
    var ok_update = $('#ok_update').hide()
    var update_msg = $('#update_msg')
    var confirm_button = $('#confirm_button')
    var cancel_button = $('#cancel_button')
    var ok_button = $('#ok_button').hide()
    var confirm_msg = $('#confirm_msg')

    $(document).ready(function(){
                    
        //datatable
        dataTableFooter();

        $(document).on('click', '#edit', function(){
            var id = $(this).data('id');
            var url = '{{ route("doctors.edit",":id") }}';
            url = url.replace(':id',id);
            location.replace(url);
        });

        $(document).on('click', '#leavePresent', function(){
            var id = $(this).data('id');
            var url = '{{ route("doctors.leavePresent",":id") }}';
            url = url.replace(':id',id);
            
            var update_url = '{{ route("doctors.updateLeavePresent",":id") }}';
            update_url = update_url.replace(':id',id);

            $('#leave_present_form').attr('action',update_url);
            
            $.ajax({
                url :url,
                dataType:"json",
                success:function(data)
                {
                    $('#leave_present_form #update_leave_present_id').val(id);
                    if (data.leave_or_present_status == 1){
                        $('#leave_present_form #doctor_present_status1').prop('checked', true)
                    }
                    if (data.leave_or_present_status == 0){
                        $('#leave_present_form #doctor_present_status2').prop('checked', true)
                    }
                    
                    $('#leave_present_form #doctor_leave_or_present_note').val(data.leave_or_present_note);
                    leave_present_modal.modal('show')
                }
            })
        });

        // $('#leave_present_form').on('submit', function(event){
        //     event.preventDefault()
        //     var update_id = $('#leave_present_form #update_leave_present_id').val();
        //     var update_url = '{{ route("doctors.updateLeavePresent",":update_id") }}';
        //     update_url = update_url.replace(':update_id',update_id);

        //     $('#leave_present_form').attr('action',update_url);
        // })
        
        $(document).on('click', '#delete', function(){
            reset()
            confirm_button.show();
            cancel_button.show();
            ok_button.hide();
            confirm_modal.find('.modal-title').text('Are You Sure ?')
            confirm_msg.text(' Are you sure that you want to delete this entry?')
            confirm_modal.modal('show')
            var id = $(this).data('id');
            var url = '{{ route("doctors.destroy",":id") }}';
            url = url.replace(':id',id);
            $('#confirm_form').attr('action',url);
        });

    });

</script>
@endsection


