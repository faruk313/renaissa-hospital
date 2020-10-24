@extends('layouts.master')
@section('title','Pathology Test Lists')
@section('tests','active')
@section('test_list','active')
@section('template_css')

@endsection
@section('content')
<section class="section">
	<div class="section-body">
		<div class="row mt-3">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
                        <h4 class="float-left">Pathology Test Lists</h4>
                        <a type="button" href="{{ route('admin.pathologyTests.create') }}" class="btn btn-primary text-white ml-auto float-right">
                            <i class="fas fa-plus"></i>&nbsp;Add New
                        </a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
                            <table class="table table-striped table-hover" id="test_table" style="width:100%;">
								<thead>
									<tr class="text-center">
										<th>#SL.</th>
										<th>Test Code</th>
										<th>Test Name</th>
										<th>Room No.</th>
										<th>Test Status</th>
										<th sortable="false">Actions</th>
									</tr>
                                </thead>
								<tbody class="text-center">
                                    {{-- @foreach ($tests as $i=>$test)
                                        <tr>
                                            <td>{{ $i+1 }}</td>
                                            <td>{{ $test->test_code }}</td>
                                            <td>{{ $test->test_name }}</td>
                                            <td>{{ $test->test_status }}</td>
                                            <td class="actions">
                                                <a type="button" id="view" data-id="'.$test->uuid.'"><i class="far fa-eye text-success"></i></a>
                                                <a type="button" id="edit" href="{{ route('admin.pathologyTests.edit',$test->uuid) }}"><i class="fas fa-pencil-alt text-info"></i></a>
                                                <a type="button" id="delete{{$test->uuid}}" data-toggle="modal" data-target="#delete{{$test->uuid}}"><i class="fas fa-trash-alt text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <!-- confirm modal -->
                                        <div class="modal fade" id="delete{{$test->uuid}}" tabindex="-1" role="dialog" aria-labelledby="delete{{$test->uuid}}" aria-hidden="true" data-keyboard="false" data-backdrop="static">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <span id="result"></span>
                                                    <form id="confirm_form" action="{{ route("admin.pathologyTests.destroy",$test->uuid) }}" method="POST">
                                                        @csrf
                                                       @method('DELETE')
                                                        <div class="modal-header bg-indigo">
                                                            <h5 class="modal-title" id="delete{{$test->uuid}}">Are You Sure ?</h5>
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
                                    @endforeach --}}
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- confirm modal -->
<div class="modal fade" id="confirm_modal" tabindex="-1" role="dialog" aria-labelledby="confirm_modal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
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
</div>
@endsection

@section('page_js')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $(document).ready(function(){
        $('#test_table').DataTable({
            processing: false,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.pathologyTests') }}",
            },
            columns: [
                { data: 'DT_RowIndex', name:'DT_RowIndex'},
                { data: "test_code", name:"test_code"},
                { data: "test_name", name:"test_name"},
                { data: "test_room", name:"test_room"},
                { data: "test_status", name:"test_status"},
                { data: "actions", name:"actions", orderable: false}
            ]
        })
    })
    
    $('.modal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        confirm_button.removeClass('btn-progress')
        $(".alert").alert('close')

    })

    function reset(){
        $(this).find('form').trigger('reset');
        confirm_button.removeClass('btn-progress')
        $(".alert").alert('close')
    }

    var html =''
    var result = $('#result')
    var confirm_modal = $('#confirm_modal')
    var confirm_button = $('#confirm_button')
    var cancel_button = $('#cancel_button')
    var ok_button = $('#ok_button').hide()
    var confirm_msg = $('#confirm_msg')

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
            var url = '{{ route("admin.pathologyTests.destroy",":id") }}';
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
                        $('#test_table').DataTable().ajax.reload();
                        confirm_modal.modal('toggle')
                        // confirm_modal.find('.modal-title').text('Success ...')
                        // confirm_msg.text('Data deleted successfully')
                        // confirm_button.hide();
                        // cancel_button.hide();
                        // ok_button.show();
                    }, 1000);

                    iziToast.warning({
                        title: 'Success!',
                        message: data.success,
                        position: 'topRight'
                    });
                }
            })
        })
    })
</script>
@endsection