@extends('layouts.master')
@section('title','User Add')
@section('users','active')
@section('users_create','active')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form id="form" action="{{route('user.store')}}" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                        @csrf
                        <div class="card-header">
                            <h4 class="float-left">User Form</h4>
                            <div class="btn-group ml-auto">
                                <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                                <a type="button" href="{{ route('user.list') }}" class="btn btn-primary text-white ml-auto float-right">
                                    <i class="fas fa-list"></i>&nbsp;User List
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">User Name</label>
                                        <input type="text" name="name" id="name" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            What's User Name?
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" id="email" name="email" class="form-control" required="" autocomplete="false">
                                        <div class="invalid-feedback">
                                            Oh no! Email is invalid.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input type="password" id="password" name="password" class="form-control" required="" autocomplete="false">
                                        <div class="invalid-feedback">
                                            Oh no! Password is invalid.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required="">
                                        <span id='message'></span>
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

@section('page_js')
<script>
    $(document).ready(function(){
        $('#password, #password_confirmation').on('keyup', function () {
        if ($('#password').val() == $('#password_confirmation').val()) {
            $('#message').html('Matching').css('color', 'green');
        } else 
            $('#message').html('Oh no! Password is not Matching').css('color', 'red');
        });
  
    });
  </script>
@endsection

