@extends('layouts.master')
@section('title','Permissions List')
@section('permissions','active')
@section('permissions_list','active')
@section('template_css')

@endsection

@section('content')

<section class="section">
	<div class="section-body">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
                        <h4 class="float-left">Permissions List</h4>
                        <div class="btn-group ml-auto">
                            <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                        </div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							
							<table class="table table-striped table-hover" id="save-stage" style="width:100%;">
								<thead>
									<tr class="text-center">
										<th>#SL.</th>
										<th>Permission Name</th>
										<th>Permission Slug</th>
										{{-- <th data-sortable="false">Actions</th> --}}
									</tr>
								</thead>
								<tbody>
								@foreach($permissions as $i=>$permission)
                                    <tr class="text-center">
                                        <td>{{$permissions->firstItem()+$i}}</td>
                                        <td>{{$permission->name}}</td>
                                        <td>{{$permission->slug}}</td>
                                        {{-- <td class="actions">
                                            <a type="button" data-toggle="modal" data-target="#edit"><i class="fas fa-pencil-alt text-info"></i></a>
                                            <a type="button" data-toggle="modal" data-target="#delete"><i class="far fa-trash-alt text-danger"></i></a>
                                        </td> --}}
                                    </tr>

                                    

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="edit">Edit Permission</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="form" action="#"  class="needs-validation" novalidate="">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="dept_name">Permission Name</label>
                                                                <input type="text" name="dept_name" id="dept_name" class="form-control" required="" placeholder="Permission Name">
                                                                <div class="invalid-feedback">
                                                                    What's Permission Name?
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="dept_role">Permission Slug</label>
                                                                <input type="text" id="dept_role" name="dept_role" class="form-control" required="" placeholder="Permission Slug">
                                                                <div class="invalid-feedback">
                                                                    Oh no! Permission Slug?
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- delete modal -->
                                    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="#" method="POST">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="delete">Are you sure?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure that you want to delete this entry?
                                                    </div>
                                                    <div class="modal-footer bg-whitesmoke br">
                                                        <button type="button" class="btn btn-primary float-left" data-dismiss="modal"><i class="fas fa-times"></i> No</button>
                                                        <button type="submit" class="btn btn-danger float-right">Yes <i class="fas fa-check"></i></button>
                                                    </div>
                                                </div>
                                            </form>		
                                        </div>
                                    </div>
								@endforeach	
								</tbody>
                            </table>
                            {{-- {{ $permissions->links('layouts.pagination') }} --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@section('page_js')

@endsection
