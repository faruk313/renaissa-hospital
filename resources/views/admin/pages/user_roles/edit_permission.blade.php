@extends('layouts.master')
@section('title','Role Create')
@section('roles','active')
@section('roles_create','active')
@section('content')
<section class="section">
    {{-- <ul class="breadcrumb breadcrumb-style ">
        <li class="breadcrumb-item">
          <h4 class="page-title m-b-0">Dashboard</h4>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('home')}}">
            <i class="fas fa-home"></i></a>
        </li>
        <li class="breadcrumb-item">Role</li>
        <li class="breadcrumb-item">Set Role Permission</li>
    </ul> --}}
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form id="form" action="{{ route('role.permission.update') }}" method="POST" class="needs-validation" novalidate="">
                        @csrf
                        <div class="card-header">
                            <h6>Role Permission Edit </h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="role_id" value="{{ $role_id }}">
                                @foreach ($permissions as $i=>$permission )
                                    <div class="col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check_permission{{ $i }}" name="permission_id[]" value="{{ $permission->id }}" @foreach($role_permissions as $role_permission)
                                            @if($permission->id==$role_permission->id)
                                            checked
                                            @endif
                                            @endforeach>
                                            <label class="custom-control-label" for="check_permission{{ $i }}">{{ $permission->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection