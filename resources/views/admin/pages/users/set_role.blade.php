@extends('layouts.master')
@section('title','Set Roles')
@section('roles','active')
@section('roles_set','active')
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
        <li class="breadcrumb-item">Set Roles</li>
    </ul>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('role.permission') }}" method="POST">
                        @csrf
                        <input type="text" name="role_id" value="{{ $last_id }}">
                        <div class="card-header">
                            <h6>Set Roles</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($permissions as $i=>$permission )
                                    <div class="col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="permission{{ $i }}" name="permission_id[]" value="{{ $permission->id }}">
                                            <label class="custom-control-label" for="permission{{ $i }}">{{ $permission->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">{{ trans('buttons.submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
<!-- 
@extends('layouts.master')
@section('title','Create Role')
@section('roles','nav-active')
@section('roles_exapanded','nav-expanded')
@section('roles_create','nav-active')

@section('content')


<div class="row">
    <div class="col-md-12">
       <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title text-center">Set Roles</h2>
            </header>
            <div class="panel-body">
                <form action="{{route('role.permission')}}" method="POST">
                @csrf
                    <input type="text" name="role_id" value="{{ $last_id }}">
                @foreach ($permissions as $i=>$permission )
                    <div class="col-md-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="permission_id[]" value="{{ $permission->id }}">{{ $permission->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
                
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                </div>
            </footer>
            </form> 
       </section>
    </div>
</div>

@endsection -->

