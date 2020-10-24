@extends('layouts.master')
@section('title','Roles List')
@section('roles','active')
@section('roles_list','active')
@section('template_css')
	<link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')

<section class="section">
	<div class="section-body">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
                        <h4 class="float-left">Roles List</h4>
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
										<th>Role Name</th>
										<th>Role Slug</th>
										<th>Permission</th>
										{{-- <th data-sortable="false">Actions</th> --}}
									</tr>
								</thead>
								<tbody>
								@foreach($roles as $i=>$role)
                                    <tr class="text-center">
                                        <td>{{$roles->firstItem()+$i}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->slug}}</td>
                                        <td><a href="{{route('role.permission.edit',['id'=>$role->id, 'name'=>$role->name])}}" class="btn btn-primary">Permission</a></td>
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
                                                    <h5 class="modal-title" id="edit">Edit Role</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="form" action="#"  class="needs-validation" novalidate="">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="dept_name">Role Name</label>
                                                                <input type="text" name="dept_name" id="dept_name" class="form-control" required="" placeholder="Role Name">
                                                                <div class="invalid-feedback">
                                                                    What's Role Name?
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="dept_role">Role Slug</label>
                                                                <input type="text" id="dept_role" name="dept_role" class="form-control" required="" placeholder="Role Slug">
                                                                <div class="invalid-feedback">
                                                                    Oh no! Role Slug?
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
                            {{-- {{ $roles->links('layouts.pagination') }} --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@section('page_js')
<script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/export-tables/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/export-tables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/export-tables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/export-tables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/export-tables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/page/datatables.js') }}"></script>
@endsection


