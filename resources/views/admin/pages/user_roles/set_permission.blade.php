@extends('layouts.master')
@section('title','Set Permissions')
@section('permissions','active')
@section('set_permissions','active')
@section('content')
<section class="section">
    <ul class="breadcrumb breadcrumb-style ">
        <li class="breadcrumb-item">
          <h4 class="page-title m-b-0">Dashboard</h4>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('home')}}">
            <i class="fas fa-home"></i></a>
        </li>
        <li class="breadcrumb-item">Roles</li>
        <li class="breadcrumb-item">Set Permissions</li>
    </ul>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form id="form" action="{{ route('role.permission') }}" method="POST" class="needs-validation" novalidate="">
                        @csrf
                        <div class="card-header">
                            <h6>Set Permissions</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="role_id" value="{{ $last_id }}">
                                @foreach ($permissions as $i=>$permission )
                                    <div class="col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check_permission{{ $i }}" name="permission_id[]" value="{{ $permission->id }}">
                                            <label class="custom-control-label" for="check_permission{{ $i }}">{{ $permission->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection