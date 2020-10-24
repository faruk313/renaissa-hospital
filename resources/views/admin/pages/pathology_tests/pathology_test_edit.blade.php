@extends('layouts.master')
@section('title','Pathology Test Update')
@section('tests','active')
@section('test_update','active')
@section('template_css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="{{ asset('assets/bundles/jquery-selectric/selectric.css') }}">
@endsection
@section('content')
<section class="section">
	<div class="section-body">
		<div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-indigo">
                        <h4 class="float-left text-white">Pathology Test Info. Update</h4>
                    </div>
                    <form action="{{ route('admin.pathologyTests.store') }}" id="update_form" method="POST">
                        <input type="hidden" name="_method" id="method" value="PUT">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input type="hidden" name="update_id" id="update_id" value="{{ $test->uuid }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div id="result"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="test_code">Test Code<span class="text-danger">&nbsp;*</span></label>
                                        <input type="text" name="test_code" id="test_code" class="form-control" value="{{ old('test_code',$test->test_code )}}" placeholder="Test Code" required="">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="test_name">Test Name<span class="text-danger">&nbsp;*</span></label>
                                        <input type="text" name="test_name" id="test_name" class="form-control" value="{{old('test_name',$test->test_name)}}" placeholder="Test Name" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="test_price">Test Price (BDT)<span class="text-danger">&nbsp;*</span></label>
                                        <input type="text" name="test_price" id="test_price" class="form-control" value="{{old('test_price',$test->test_price)}}" placeholder="Test Price" required="">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="test_discount">Test Discount (%)<span class="text-danger">&nbsp;*</span></label>
                                        <input type="text" name="test_discount" id="test_discount" class="form-control" value="{{old('test_discount',$test->test_discount)}}" placeholder="Discount Percent" required="">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="test_time">Delivery Time (Days)<span class="text-danger">&nbsp;*</span></label>
                                        <input type="text" name="test_time" id="test_time" class="form-control" value="{{old('test_time',$test->test_time)}}" placeholder="Delivery Time" required="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="test_room">Sample Collection Room<span class="text-danger">&nbsp;*</span></label>
                                        <select class="form-control selectric" name="test_room" id="test_room">
                                            <option selected disabled>Select Room</option>
                                            @foreach ($rooms as $room)
                                                <option value="{{ $room->room_code }}" {{$room->room_code==$room->room_code?'selected':''}}>{{ $room->room_code }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="test_status" class="d-block">Test Status<span class="text-danger">&nbsp;*</span></label>
                                        <div class="custom-control custom-radio custom-control-inline mt-2">
                                            <input type="radio" id="radio1" name="test_status" class="custom-control-input" value="1" {{$test->test_status==1?'checked':''}}>
                                            <label class="custom-control-label" for="radio1">Active</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline  mt-2">
                                            <input type="radio" id="radio2" value="0" name="test_status" class="custom-control-input" {{$test->test_status==0?'checked':''}}>
                                            <label class="custom-control-label" for="radio2">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="test_suggestion">Test Suggestion (If Any)</label>
                                    <textarea name="test_suggestion" class="form-control" id="test_suggestion" placeholder="Test Suggestion">{{old('test_suggestion',$test->test_suggestion)}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" id="update_button" class="btn btn-primary waves-effect float-right">Update</button>
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
<script src="{{ asset('assets/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#update_form').on('submit', function(event){
        event.preventDefault()
        var html=''
        var update_id = $('#update_id').val();
        var update_url = '{{ route("admin.pathologyTests.update",":update_id") }}';
        update_url = update_url.replace(':update_id',update_id);
        console.log(update_url)
        $.ajax({
            url:update_url,
            type: "PUT",
            data: $(this).serialize(),
            dataType:"json",
            beforeSend:function(){
                $('#update_button').addClass('btn-progress');
            },
            success:function(data)
            {
                if(data.errors)
                {
                    html = '<div class="alert alert-danger">'+
                            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                    for(var count = 0; count < data.errors.length; count++)
                    {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#update_button').removeClass('btn-progress');
                }
                if(data.success)
                {
                    setTimeout(function(){
                        $('#update_form')[0].reset();
                        $('#update_button').removeClass('btn-progress');

                    }, 1000);
                    html = '<div class="alert alert-success">'+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+ data.success + '</div>';
                }    
                $('#result').html(html);
            }
        })
    })
</script>
@endsection