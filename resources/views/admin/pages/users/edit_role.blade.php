@extends('layouts.master')
@section('title','Set Roles')
@section('roles','active')
@section('roles_set','active')
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
        <li class="breadcrumb-item">Roles</li>
        <li class="breadcrumb-item">Set Roles</li>
    </ul> --}}
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{route('user.role.update')}}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h6>Set Roles for - {{$user_name}}</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="user_id" value="{{ $user_id }}">
                                @foreach ($roles as $i=>$role )
                                    <div class="col-md-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="role{{ $i }}" name="role_id[]" value="{{ $role->id }}"
                                            @foreach($user_roles as $user_role)
                                                @if($role->id==$user_role->id)
                                                    checked
                                                @endif
                                            @endforeach>
                                            
                                            <label class="custom-control-label" for="role{{ $i }}">{{ $role->name }}</label>
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
