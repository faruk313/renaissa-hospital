@extends('layouts.master')
@section('title','Rooms Chambers Cabins Desks')
@section('rooms_chambers_cabins_desks','active')
@section('template_css')

@endsection
@section('content')
<section class="section">
	<div class="section-body">
		<div class="row mt-3">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
                        <h4 class="float-left">Rooms/Chambers</h4>
                        <div class="btn-group ml-auto">
                            <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                            <a type="button" id="add" class="btn btn-primary text-white ml-auto float-right">
                                <i class="fas fa-plus"></i>&nbsp;Add New
                            </a>
                        </div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="save-stage" style="width: 100%">
								<thead>
									<tr class="text-center">
										<th>#SL</th>
										<th>Type</th>
										<th>Code</th>
										<th>Note</th>
										<th>Status</th>
										<th data-sortable="false">Actions</th>
									</tr>
                                </thead>
								<tbody>
                                    @if ($rooms->count()>0)
                                        @foreach ($rooms as $i=>$room)
                                            <tr  class="text-center">
                                                <td>{{ $i+1 }}</td>
                                                <td>
                                                    @if($room->type == 1)
                                                        <span class="badge-outline col-blue">Pathology</span>
                                                    @endif 
                                                    @if($room->type == 2)
                                                        <span class="badge-outline col-purple">Doctor</span>
                                                    @endif 
                                                </td>
                                                <td>{{ $room->code }}</td>
                                                <td>{{ $room->note }}</td>
                                                <td>
                                                    @if($room->status == 1)
                                                        <span class="badge-outline col-green">Active</span>
                                                    @endif 
                                                    @if($room->status == 0)
                                                        <span class="badge-outline col-red">Inactive</span>
                                                    @endif 
                                                </td>
                                                <td>
                                                    <a type="button" id="edit" data-id="{{ $room->id }}" class="edit"><i class="fas fa-pencil-alt text-info"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
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
<!-- view Modal -->
<div class="modal fade" id="view_modal" tabindex="-1" role="dialog" aria-labelledby="view_modal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
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
                <h5 class="modal-title" id="add_modal">Add New Room/Chamber</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="add_form" method="POST" action="{{ route('rooms.store') }}">
                @csrf
                <div class="modal-body" style="min-height: 300px !important">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="room_type">Room Category<span class="text-danger">&nbsp;*</span></label>
                                <select class="form-control selectric" name="type" id="room_type"  style="height: :40px">
                                    <option selected disabled>Select Room Category</option>
                                    <option value="1">Pathology Room</option>
                                    <option value="2">Doctor Chamber</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="output"></div>
                </div>
                <div class="modal-footer bg-white br">
                    <button type="button" class="btn btn-danger float-left" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" id="sumbit" class="btn btn-success waves-effect float-right">Submit</button>
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
                <h5 class="modal-title" id="edit_modal"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit_form">
                <input type="hidden" name="_method" id="method" value="PUT">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" id="update_id" name="update_id">
                <div class="modal-body">
                    <div class="update_output"></div>
                </div>
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                    <button type="submit" id="update" class="btn btn-primary waves-effect float-right">Update</button>
                </div>
            </form>
        </div>    
    </div>
</div>

<!-- confirm modal -->
{{-- <div class="modal fade" id="confirm_modal" tabindex="-1" role="dialog" aria-labelledby="confirm_modal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <span id="result"></span>
            <form id="confirm_form">
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
                    <button type="button" class="btn btn-success float-right" data-dismiss="modal" id="ok_button"><i class="fas fa-check"></i> Ok</button>
                    <button type="button" class="btn btn-danger float-right" id="confirm_button">Yes <i class="fas fa-check"></i></button>
                </div>
            </form>    
        </div>
    </div>
</div> --}}
@endsection

@section('page_js')

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var add = $('#add');
    var edit = $('#edit');
    var show = $('#show');
    
    var submit = $('#submit');
    var update = $('#update');
    var destroy = $('#destroy');

    var add_modal = $('#add_modal');
    var edit_modal = $('#edit_modal');
    var delete_modal = $('#delete_modal');

    var add_form = $('#add_form');
    var edit_form = $('#edit_form');
    var delete_form = $('#delete_form');

    function reset(){
        $(this).find('form').trigger('reset')
        $('select').selectric('refresh')
        submit.removeClass('btn-progress')
        update.removeClass('btn-progress')
        destroy.removeClass('btn-progress')
    }

    $('.modal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset')
        $('select').selectric('refresh')
        submit.removeClass('btn-progress')
        update.removeClass('btn-progress')
        destroy.removeClass('btn-progress')
    })
  
    var doctorHtml=`
    <div class="row" id="doctorChamber">
        <div class="col-md-3">
            <div class="form-group">
                <label for="doctor_chamber_code">Doctor Chamber code<span class="text-danger">&nbsp;*</span></label>
                <input type="text" id="doctor_chamber_code" name="doctor_chamber_code" class="form-control" placeholder="---" required="">
                <div class="invalid-feedback">
                    Oh no! Chamber Code?
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="doctor_chamber_note">Doctor Chamber Note (Optional)</label>
                <input type="text" id="doctor_chamber_note" name="doctor_chamber_note" class="form-control" placeholder="---">
            </div>
        </div>
        <div class="col-md-3 px-1">
            <div class="form-group">
                <label class="d-block">Doctor Chamber Status<span class="text-danger">&nbsp;*</span></label>
                <div class="custom-control custom-radio custom-control-inline mt-2">
                    <input type="radio" id="doctor_chamber_status_1" name="doctor_chamber_status" class="custom-control-input" value="1" checked>
                    <label class="custom-control-label" for="doctor_chamber_status_1">Active</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline mt-2">
                    <input type="radio" id="doctor_chamber_status_2" value="0" name="doctor_chamber_status" class="custom-control-input">
                    <label class="custom-control-label" for="doctor_chamber_status_2">Inactive</label>
                </div>
            </div>
        </div>
    </div>
    `;
    var pathologyHtml=`
    <div class="row" id="pathologyRoom">
        <div class="col-md-3">
            <div class="form-group">
                <label for="pathology_room_code">Pathology Room code<span class="text-danger">&nbsp;*</span></label>
                <input type="text" id="pathology_room_code" name="pathology_room_code" class="form-control" placeholder="---" required="">
                <div class="invalid-feedback">
                    Oh no! Room Code?
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="pathology_room_note">Pathology Room Note (Optional)</label>
                <input type="text" id="pathology_room_note" name="pathology_room_note" class="form-control" placeholder="---">
            </div>
        </div>
        <div class="col-md-3 px-1">
            <div class="form-group">
                <label class="d-block">Pathology Room Status<span class="text-danger">&nbsp;*</span></label>
                <div class="custom-control custom-radio custom-control-inline mt-2">
                    <input type="radio" id="radio1" name="pathology_room_status" class="custom-control-input" value="1" checked>
                    <label class="custom-control-label" for="radio1">Active</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline mt-2">
                    <input type="radio" id="radio2" value="0" name="pathology_room_status" class="custom-control-input">
                    <label class="custom-control-label" for="radio2">Inactive</label>
                </div>
            </div>
        </div>
    </div>
    `;
   
    $(document).ready(function(){
      
        $('#room_type').on('change', function(){
            reset();
            $('#room_type').selectric('Refresh');
            var catValue = $(this).val(); 
            $("div.modal-footer").show();
            if(catValue=='2'){
                add_modal.find('.modal-title').text('Add New Doctor Chamber')
                $(".output").html(doctorHtml);
            }
            else if(catValue=='1'){
                add_modal.find('.modal-title').text('Add New Pathology Room')
                $(".output").html(pathologyHtml);
            }
         
           else{       
                pathologyHtml='';
                doctorHtml='';
                $(".output").html('');
            }
           
        });

        add.click(function(){
            reset()
            add_modal.modal('show')
        });

        $(document).on('click', '#edit', function(){
            reset()
            var id = $(this).data('id');
            var edit_url = '{{ route("rooms.edit",":id") }}';
            edit_url = edit_url.replace(':id',id);

            var update_url = '{{ route("rooms.update",":id") }}';
            update_url = update_url.replace(':id',id);
            $.ajax({
                url :edit_url,
                dataType:"json",
                success:function(data)
                {
                    
                    $('#update_id').val(data.result.id);
                    var code = ''
                    var note = ''
                   
                    if(data.result.status ==1){
                        var active ="checked"
                    }

                    if(data.result.status ==0){
                        var inactive ="checked"
                    }

                    var code = data.result.code

                    if(data.result.note==null){
                        note = ''
                    }
                    else{
                        note = data.result.note
                    }
                   
                    if(data.result.type=='1'){
                        edit_modal.find('.modal-title').text('Update Pathology Room Info')
                        var updatePathology=`
                        <div class="row" id="pathologyRoom">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="pathology_room_code">Pathology Room code<span class="text-danger">&nbsp;*</span></label>
                                    <input type="text" id="pathology_room_code" name="pathology_room_code" value="`+code+`" class="form-control" placeholder="---" required="">
                                    <div class="invalid-feedback">
                                        Oh no! Room Code?
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pathology_room_note">Pathology Room Note (Optional)</label>
                                    <input type="text" id="pathology_room_note" name="pathology_room_note" value="`+note+`" class="form-control" placeholder="---">
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label class="d-block">Pathology Room Status<span class="text-danger">&nbsp;*</span></label>
                                    <div class="custom-control custom-radio custom-control-inline mt-2">
                                        <input type="radio" id="pathology_room_status_1" name="pathology_room_status" class="custom-control-input" value="1" `+active+`>
                                        <label class="custom-control-label" for="pathology_room_status_1">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mt-2">
                                        <input type="radio" id="pathology_room_status_2" value="0" name="pathology_room_status" class="custom-control-input" `+inactive+`>
                                        <label class="custom-control-label" for="pathology_room_status_2">Inactive</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;

                        $(".update_output").html(updatePathology);
                    }

                    if(data.result.type=='2'){
                        edit_modal.find('.modal-title').text('Update Doctor Chamber Info')
                        var updateDoctor=`
                        <div class="row" id="doctorChamber">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="doctor_chamber_code">Doctor Chamber code<span class="text-danger">&nbsp;*</span></label>
                                    <input type="text" id="doctor_chamber_code" name="doctor_chamber_code" value="`+code+`" class="form-control" placeholder="---" >
                                    <div class="invalid-feedback">
                                        Oh no! Chamber Code?
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="doctor_chamber_note">Doctor Chamber Note (Optional)</label>
                                    <input type="text" id="doctor_chamber_note" name="doctor_chamber_note" value="`+note+`" class="form-control" placeholder="---">
                                </div>
                            </div>
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label class="d-block">Doctor Chamber Status<span class="text-danger">&nbsp;*</span></label>
                                    <div class="custom-control custom-radio custom-control-inline mt-2">
                                        <input type="radio" id="doctor_chamber_status_1" name="doctor_chamber_status" class="custom-control-input" value="1" `+active+`>
                                        <label class="custom-control-label" for="doctor_chamber_status_1">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline mt-2">
                                        <input type="radio" id="doctor_chamber_status_2" value="0" name="doctor_chamber_status" class="custom-control-input" `+inactive+`>
                                        <label class="custom-control-label" for="doctor_chamber_status_2">Inactive</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `;
                        $(".update_output").html(updateDoctor);
                    }
                    edit_modal.modal('show')
                }
            })
        })

        $('#edit_form').on('submit', function(event){
            event.preventDefault()
            var update_id = $('#update_id').val();
            var base_url = '{{ route("rooms") }}';
            var update_url = '{{ route("rooms.update",":update_id") }}';
            update_url = update_url.replace(':update_id',update_id);
            alert(update_url)
            $.ajax({
                url:update_url,
                type:"PUT",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                    edit_modal.find('.modal-title').text('Updating ...')
                    update.addClass('btn-progress');
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
                            edit_modal.modal('toggle')
                            reset()
                            window.location = base_url;
                        }, 500);

                        iziToast.success({
                            title: 'Success!',
                            message: data.success,
                            position: 'topRight'
                        });
                    }    
                }
            })
        })

        // $(document).on('click', '#delete', function(){
        //     reset()
        //     confirm_modal.find('.modal-title').text('Are You Sure ?')
        //     confirm_msg.text(' Are you sure that you want to delete this entry?')
        //     confirm_modal.modal('show')
        //     var id = $(this).data('id');
        //     confirm_button.click(function(){
        //         var url = '{{ route("rooms.destroy",":id") }}';
        //         url = url.replace(':id',id);
        //         $.ajax({
        //             url:url,
        //             type:"DELETE",
        //             data:{id:id},
        //             dataType:"json",
        //             beforeSend:function(){
        //                 confirm_modal.find('.modal-title').text('Deleting ...')
        //                 confirm_button.addClass('btn-progress');
        //             },
        //             success:function(data)
        //             {
        //                 setTimeout(function(){
        //                     confirm_button.removeClass('btn-progress');
        //                     confirm_modal.modal('toggle')
        //                     $('#roomTable').DataTable().ajax.reload();
        //                 }, 500);
                       
        //                 iziToast.warning({
        //                     title: 'Warning!',
        //                     message: data.success,
        //                     position: 'topRight'
        //                 });
        //             }
        //         })
        //     })
        // })

    });
</script>
@endsection