<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<title>RENAISSA HOSPITAL :: @yield('title')</title>

		<link rel='shortcut icon' type='image/x-icon' href="{{ asset('assets/img/favicon.ico') }}" >

		<!-- General CSS Files -->
		<link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/bundles/izitoast/css/iziToast.min.css') }}">

		<!-- Template CSS -->
		@yield('template_css')
		<link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/bundles/jquery-selectric/selectric.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-daterangepicker/daterangepicker.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

		<!-- Custom style CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
	</head>

	<body>
		<div class="loader"></div>
		<div id="app">
			<div class="main-wrapper main-wrapper-1">
				<div class="navbar-bg"></div>
				@include('layouts.inc.navbar')
				@include('layouts.inc.sidebar')
				<!-- Main Content -->
				<div class="main-content">
					@yield('content')
				</div>
				<footer class="main-footer">
					<div class="footer-left">
						Copyright &copy; 2020 <div class="bullet"></div>Developed By <a href="http://www.e-gobltd.com" target="_blank">E-GOB Ltd.</a>
					</div>
					<div class="footer-right">
						V 1.0.0
					</div>
				</footer>
			</div>
		</div>
		<!-- General JS Scripts -->
		<script src="{{ asset('assets/js/app.min.js') }}"></script>
		<!-- JS Libraies -->
		<script src="{{ asset('assets/bundles/izitoast/js/iziToast.min.js') }}"></script>
		<script src="{{ asset('assets/js/page/toastr.js') }}"></script>
		<script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
		<script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('assets/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
		<script src="{{ asset('assets/bundles/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
		<script src="{{ asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
		<script src="{{ asset('assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>

		@yield('js_libraries')
		<!-- Page Specific JS File -->
		@yield('page_js')
		<!-- Template JS File -->
		<script src="{{ asset('assets/js/scripts.js') }}"></script>
		<script src="{{ asset('assets/js/page/datatables.js') }}"></script>
		<!-- Custom JS File -->
        <script src="{{ asset('assets/js/custom.js') }}"></script>

		<script type="text/javascript">
			jQuery(document).keypress(function(e) {
			 if (e.keyCode === 27) {
			  jQuery("#confirm_modal").modal('toggle');
							OR
			  jQuery("#confirm_modal").modal('hide');
			 }
			});
		</script>

		<script>
			@if (Session::has('success'))
				var message = '{{ Session::get('success') }}';
				iziToast.success({
					title: 'Success !',
					message: message,
					position: 'topRight'
				});
			@endif
		
			@if (Session::has('info'))
				var message = '{{ Session::get('info') }}';
				iziToast.info({
					title: 'Info !',
					message: message,
					position: 'topRight'
				});
			@endif
		
			@if (Session::has('warning'))
				var message = '{{ Session::get('warning') }}';
				iziToast.warning({
					title: 'Warning !',
					message: message,
					position: 'topRight'
				});
			@endif
		
			@if (Session::has('error'))
				var message = '{{ Session::get('error') }}';
				iziToast.error({
					title: 'Error !',
					message: message,
					position: 'topRight'
				});
			@endif
    		@if(count($errors) > 0)
				@foreach($errors->all() as $error)
					iziToast.error({
						title: 'Error !',
						message: "{{ $error }}",
						position: 'topRight'
					});
				@endforeach
			@endif
		</script>
	
	</body>
</html>
