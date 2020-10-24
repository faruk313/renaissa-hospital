@extends('layouts.master')
@section('title','Patient Edit')
@section('patients','active')
@section('patient_create','active')
@section('template_css')
@endsection
@section('content')
<section class="section">
	<div class="section-body">
		<div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-left">Patient Info. Update</h4>
                        <div class="btn-group ml-auto">
                            <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
                            <a type="button" href="{{ route('patients.lists') }}" class="btn btn-primary text-white ml-auto float-right">
                                <i class="fas fa-list"></i>&nbsp;Patient List
                            </a>
                        </div>
                    </div>
                    <form action="{{ route('patients.update',$patient->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="patient_id" id="patient_id" value={{ $patient->id }}>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="patient_name">Full Name<span class="text-danger">&nbsp;*</span></label>
                                        <input type="text" name="patient_name" id="patient_name" class="form-control" value="{{old('patient_name',$patient->patient_name)}}" placeholder="-----" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="patient_mobile">Mobile Number<span class="text-danger">&nbsp;*</span></label>
                                        <input type="tel" name="patient_mobile" id="patient_mobile" class="form-control" value="{{old('patient_mobile',$patient->patient_mobile)}}" placeholder="-----" required="">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="patient_age">Age<span class="text-danger">&nbsp;*</span></label>
                                        <input type="number" name="patient_age" id="patient_age" class="form-control" value="{{old('patient_age',$patient->patient_age)}}" placeholder="--" min="0" max="99" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="patient_gender" class="d-block">Gender<span class="text-danger">&nbsp;*</span></label>
                                        <div class="custom-control custom-radio custom-control-inline mt-2">
                                            <input type="radio" id="patient_gender1" name="patient_gender" class="custom-control-input" value="1" {{ $patient->patient_gender==1?'checked':''}}>
                                            <label class="custom-control-label" for="patient_gender1">Female</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline  mt-2">
                                            <input type="radio" id="patient_gender2" value="0" name="patient_gender" class="custom-control-input" {{ $patient->patient_gender==0?'checked':''}}>
                                            <label class="custom-control-label" for="patient_gender2">Male</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="patient_address">Address</label>
                                        <input type="text" name="patient_address" id="patient_address" class="form-control" value="{{old('patient_address',$patient->patient_address)}}" placeholder="-----">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="patient_status" class="d-block">Status<span class="text-danger">&nbsp;*</span></label>
                                        <div class="custom-control custom-radio custom-control-inline mt-2">
                                            <input type="radio" id="patient_status1" name="patient_status" class="custom-control-input" value="1" {{ $patient->patient_status==1?'checked':''}}>
                                            <label class="custom-control-label" for="patient_status1">Active</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline  mt-2">
                                            <input type="radio" id="patient_status2" value="0" name="patient_status" class="custom-control-input" {{ $patient->patient_status==0?'checked':''}}>
                                            <label class="custom-control-label" for="patient_status2">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="patient_note">Patient's Note</label>
                                        <input type="text" name="patient_note" id="patient_note" class="form-control" value="{{old('patient_note',$patient->patient_note)}}" placeholder="-----">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" id="add_button" class="btn btn-info waves-effect float-right">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
</section>
@endsection

@section('page_js')
@endsection