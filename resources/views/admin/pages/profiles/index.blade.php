@extends('layouts.master')
@section('title','Profile')
@section('profiles','active')
@section('users_profile','active')
@section('content')
<section class="section">
  <div class="section-body">
    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-4">
        <div class="card author-box">
          <div class="card-body">
            <div class="author-box-center">
              <img id="imgFileUpload" alt="Select File" class="rounded-circle author-box-picture" title="Select File" src="{{ asset('assets/img/users/avatar_002.png') }}" style="cursor: pointer" />
              <br />
              <span id="spnFilePath"></span>
              <input type="file" id="FileUpload1" style="display: none" />
              {{-- <img alt="image" src="{{ asset('assets/img/users/avatar_002.png') }}" class="rounded-circle author-box-picture"> --}}
              <div class="clearfix"></div>
              <div class="author-box-name">
                <a href="#">{{ Auth::user()->name}}</a>
              </div>
              <div class="author-box-job">Administrator</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-8">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="{{ route('change.password') }}">
              @csrf
              @method('POST')
              <div class="card-header">
                <h4>Edit Profile</h4>
              </div>
              <div class="card-body">
                {{-- <div class="row">
                  <div class="form-group col-md-6 col-12">
                    <label for="user_name">Full Name<span class="text-danger"> *</span></label>
                    <input type="text" name="user_name" id="user_name" class="form-control" value="Full Name" placeholder="Full Name">
                    <div class="invalid-feedback">
                      Please fill in the Full name
                    </div>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label for="user_nid">NID Number<span class="text-danger"> *</span></label>
                    <input type="tel" name="user_nid" id="user_nid" class="form-control" value="19902546525">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-4 col-12">
                    <label for="user_email">Email Address<span class="text-danger"> *</span></label>
                    <input type="email" name="user_email" id="user_email" class="form-control" value="web2faruk@gmail.com" placeholder="Email Address">
                    <div class="invalid-feedback">
                      Please fill in the Email Address
                    </div>
                  </div>
                  <div class="form-group col-md-4 col-12">
                    <label for="user_mobile1">Contact Number <span class="text-danger"> *</span></label>
                    <input type="tel" name="user_mobile1" id="user_mobile1" class="form-control" value="01611425480" placeholder="Contact Number">
                    <div class="invalid-feedback">
                      Please fill in the Contact Number
                    </div>
                  </div>
                  <div class="form-group col-md-4 col-12">
                    <label for="mobile2">Contact Number <small class="text-info">(Optional)</label>
                    <input type="tel" name="mobile2" id="mobile2" class="form-control" value="01611425480" placeholder="Optional Contact Number">
                    <div class="invalid-feedback">
                      Please fill in the Contact Number
                    </div>
                  </div>
                </div> --}}
                {{-- <div class="row">
                  <div class="form-group col-md-6 col-12">
                    <label for="user_mailing_address">Mailing Address<span class="text-danger"> *</span></label>
                    <textarea name="user_mailing_address" id="user_mailing_address" rows="4" class="form-control" placeholder="Mailing Address"></textarea>
                    <div class="invalid-feedback">
                      Please fill in the Mailing Address
                    </div>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label for="user_permanent_address">Permanent Address<span class="text-danger"> *</span></label>
                    <textarea name="user_permanent_address" id="user_permanent_address" rows="4" class="form-control" placeholder="Permanent Address"></textarea>
                  </div>
                </div> --}}
                <div class="row">
                  <div class="form-group col-md-4 col-12">
                    <label for="current_password">Current Password<span class="text-danger"> *</span></label>
                    <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Current Password">
                    <div class="invalid-feedback">
                      Current Password?
                    </div>
                  </div>
                  <div class="form-group col-md-4 col-12">
                    <label for="new_password">New Password<span class="text-danger"> *</span></label>
                    <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password">
                  </div>
                  <div class="form-group col-md-4 col-12">
                    <label for="confirm_new_password">Confirm New Password<span class="text-danger"> *</span></label>
                    <input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control" placeholder="Confirm New Password">
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

