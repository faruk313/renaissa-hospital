@extends('layouts.master')
@section('title','Create Permissions')
@section('permissions','active')
@section('permissions_create','active')
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
        <li class="breadcrumb-item">Permissions</li>
        <li class="breadcrumb-item">Add Permission</li>
      </ul>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form id="form" action="#" method="POST" class="needs-validation" novalidate="">
                        @csrf
                        <div class="card-header">
                            <h4>Permission Add Form</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dept_name">Permission Name</label>
                                        <input type="text" name="dept_name" id="dept_name" class="form-control" required="" placeholder="Permission Name">
                                        <div class="invalid-feedback">
                                            What's Role Name?
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dept_role">Permission Slug</label>
                                        <input type="text" id="dept_role" name="dept_role" class="form-control" required="" placeholder="Permission Slug">
                                        <div class="invalid-feedback">
                                            Oh no! Permission Slug?
                                        </div>
                                    </div>
                                </div>
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

