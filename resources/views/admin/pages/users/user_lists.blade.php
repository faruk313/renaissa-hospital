@extends('layouts.master')
@section('title','Users List')
@section('users','active')
@section('users_list','active')
@section('template_css')

@endsection

@section('content')

<section class="section">
	<div class="section-body">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
                        <h4 class="float-left">Users List</h4>
                        <div class="btn-group ml-auto">
                            <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                            <a type="button" href="{{ route('user.create') }}" class="btn btn-primary text-white ml-auto float-right">
                                <i class="fas fa-plus mr-2"></i>Add User
                            </a>
                        </div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							
							<table class="table table-striped table-hover" id="save-stage"  style="width:100%;">
								<thead>
									<tr class="text-center">
										<th>#SL.</th>
										<th>User Name</th>
										<th>Email Address</th>
										<th data-sortable="false" class="text-center">Roles</th>
										<th data-sortable="false">Actions</th>
									</tr>
								</thead>
								<tbody>
								@foreach($users as $i=>$user)
                                    <tr class="text-center">
                                        <td>{{$users->firstItem()+$i}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td class="text-center">
                                            <a href="{{route('user.role.edit', ['id'=>$user->id, 'name'=>$user->name])}}" class="btn btn-primary">Roles</a>
                                            {{-- <a href="{{route('user.permission.edit', ['id'=>$user->id, 'name'=>$user->name])}}" class="btn btn-info">Permissions</a> --}}
                                        </td>
                                        <td class="actions">
                                            <a type="button" data-toggle="modal" data-target="#edit"><i class="fas fa-pencil-alt text-info"></i></a>
                                            <a type="button" data-toggle="modal" data-target="#delete"><i class="far fa-trash-alt text-danger"></i></a>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="edit">Edit User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="form" action="#" method="POST" class="needs-validation" novalidate="">
                                                        @csrf
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="name">User Name</label>
                                                                <input type="text" name="name" id="name" class="form-control" value="" required="">
                                                                <div class="invalid-feedback">
                                                                    What's User Name?
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="email">Email Address</label>
                                                                <input type="email" id="email" name="email" value="" class="form-control" required="">
                                                                <div class="invalid-feedback">
                                                                    Oh no! Email is invalid.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="password">New Password</label>
                                                                <input type="password" id="password" name="password" class="form-control" required="">
                                                                <div class="invalid-feedback">
                                                                    Oh no! Password is invalid.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="password_confirmation">Confirm Password</label>
                                                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required="">
                                                                <div class="invalid-feedback">
                                                                    Oh no! Password is invalid.
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
                                {{-- {{ $users->links('layouts.pagination') }} --}}
							</table>
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


