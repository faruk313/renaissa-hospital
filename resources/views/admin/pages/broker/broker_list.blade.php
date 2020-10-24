@extends('layouts.master')
@section('title','Broker List')
@section('broker_list','active')
@section('content')
<section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Broker List</h4>
              <div class="btn-group ml-auto">
                <a href="javascript:history.back()" class="btn btn-danger text-white mr-2"><i class="fas fa-arrow-left mr-2"></i>Back</a>
              </div>
            </div>
            <div class="card-body">
              {{-- <div class="row py-2 mb-3" style="border: 1px dashed #333">
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="from_date">From Date</label>
                    <input type="date" id="from_date" name="from_date" value="{{ old('from_date') }}" class="form-control" placeholder="-----">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="to_date">To Date</label>
                    <input type="date" id="to_date" name="to_date" value="{{ old('to_date') }}" class="form-control" placeholder="-----">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="doctor_name">Doctor Name</label>
                    <input type="text" id="doctor_name" name="doctor_name" value="{{ old('doctor_name') }}" class="form-control" placeholder="-----">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <button class="btn btn-danger btn-wave text-white" type="button">Search</button>
                  </div>
                </div>
              </div> --}}
              <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                <thead>
                  <tr class="text-center">
                    <th>#SL</th>
                    <th>Broker&nbsp;ID.</th>
                    <th>Broker&nbsp;Name</th>
                    <th>Contact&nbsp;Number</th>
                    <th>&nbsp;&nbsp;&nbsp;Note&nbsp;&nbsp;&nbsp;</th>
                    <th>&nbsp;Status&nbsp;</th>
                    {{-- <th>Action</th> --}}
                  </tr>
                </thead>
                <tbody>
                    @foreach($brokers as $i=>$broker)
                        <tr class="text-center">
                            <td>{{ $i+1 }}</td>
                            <td>{{ $broker->ref_user_id }}</td>
                            <td>{{ $broker->ref_user_name }}</td>
                            <td>{{ $broker->ref_user_mobile }}</td>
                            <td>{{ $broker->ref_user_note }}</td>
                            <td>
                                @if ( $broker->ref_user_status==1)
                                    <span class="badge-outline col-green">Active</span>
                                @else
                                    <span class="badge-outline col-red">Inactive</span>
                                @endif
                                
                            </td>
                        </tr>    
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

@endsection


