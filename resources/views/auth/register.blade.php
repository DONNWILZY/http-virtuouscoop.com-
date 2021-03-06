
@extends('layouts.app')
@section('title', 'Register')
@section('content')
@if($settings->userregister == 0)

<? 
 print "
				<script language='javascript'>
					window.location = 'lockedsignup';
				</script>
			";
 ?>

@endif
<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="msapplication-TileColor" content="#0061da">
		<meta name="theme-color" content="#1643a3">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <script src="{{asset('process/countries.js')}}"></script>
		<!-- Title -->
		<title>{{config('app.name')}} | New User</title>
		 <script src='https://www.google.com/recaptcha/api.js'></script>
		 
  		  <!-- CSRF Token -->
   		 <meta name="csrf-token" content="{{ csrf_token() }}">
		 <link href="{{asset('assets\fonts\fonts\font-awesome.min.css')}}" rel="stylesheet" />
		 
		<link href="{{asset('assets\plugins\select2\select2.min.css')}}" rel="stylesheet" />
        
		 <link href="{{asset('assets\plugins\sweet-alert\sweetalert.css')}}" rel="stylesheet" />
		<!-- Font Family -->
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
		
		<link href="{{asset('assets\plugins\select2\select2.min.css')}}" rel="stylesheet" />
		<!-- Sidemenu Css -->
		 <link href="{{asset('assets\plugins\fullside-menu\css\style.css')}}" rel="stylesheet" />
		 <link href="{{asset('assets\plugins\fullside-menu\waves.min.css')}}" rel="stylesheet" />
		
		<!-- Dashboard Css -->
		 <link href="{{asset('assets\css\dashboard.css')}}" rel="stylesheet" />
		<link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		<!-- c3.js Charts Plugin -->
		 <link href="{{asset('assets\plugins\charts-c3\c3-chart.css')}}" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		 <link href="{{asset('assets\plugins\scroll-bar\jquery.mCustomScrollbar.css')}}" rel="stylesheet" />

		<!---Font icons-->
		 <link href="{{asset('assets\css\icons.css')}}" rel="stylesheet" />


</head>
	<body>
		<div class="login-img">
			<div id="global-loader"></div>
			<div class="page">
				<div class="page-single">
					<div class="container">
					<br>
					<br>
					<div class="text-center mb-6">
					<img src="assets\images\brand\logo.png" class="h-8" alt="">
					</div>
						<div class="row">
							<div class="col-lg-12">
								<form class="card authentication" method="post" action="{{ route('register') }}">
								 {{ csrf_field() }}
									<br><br>
										<center><strong><h1 class="card-title">Create New Customer's Account<br><br>
										<span> @if(Cookie::get('code'))
										<p style="color:red;">You Were Referred By: <b>{{ Cookie::get('code') }}</b>. <br>Remember to share your referral link when you register too. It will fetch you {{config('app.currency_symbol')}} {{$settings->referral_signup}}</p></code>
											@endif</h1><br>
										</strong></center>
									     
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="form-label">Your Name </label>
												<input type="text" class="form-control" placeholder="First name and last name"  name="name" value="{{ old('name') }}" required autofocus >
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="form-label">Phone </label>
											<input type="text" class="form-control" placeholder="(+000)0000000000"  name="mobile" value="{{ old('mobile') }}" required autofocus >
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Email</label>
													<input type="text" class="form-control" placeholder="yourname@domain.com" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Username</label>
													<input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}" required autofocus>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Password</label>
													<input type="password" class="form-control mb-0" id="exampleInputPassword1" placeholder="Enter Password" type="password" class="form-control" name="password" required>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Confirm Password</label>
													<input type="password" class="form-control mb-0" id="exampleInputPassword1" placeholder="Enter Password Again" type="password" class="form-control" name="confirm-password" required>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">House Address</label>
													<input type="text" class="form-control" name ="address" placeholder="Enter Address">
												</div>
											</div>
											<div class="col-sm-6 col-md-4">
												<div class="form-group">
													<label class="form-label">Country</label>
													<select onchange="print_state('state', this.selectedIndex);" id="country" required  name ="country" class="form-control select2"/></select>
											 <script language="javascript">print_country("country");</script>
												</div>
											</div>
											
											<div class="col-sm-6 col-md-3">
												<div class="form-group">
													<label class="form-label">State</label>
													<select  name ="state" required  id ="state" class="form-control select2">
													<option value="">Select state</option></select>
												</div>
											</div>
											<div class="col-md-5">
												<div class="form-group">
													<label class="form-label">Zip Code</label>
													<input type="number" class="form-control" name ="zip" placeholder="Enter Zip Code" value="{{ old('zip') }}">
												</div>
											</div>
											 @if(Cookie::get('code'))
													<input type="text" hidden class="form-control mb-0" id="exampleInputPassword1" placeholder="Sponsor Username" name="referred" value="{{ Cookie::get('code') }}" disabled required autofocus>
												
											@endif
											<div class="col-md-12">
											{!! Recaptcha::render() !!}
											</div>
										</div>
									</div>
									<div class="col-md-3">
											<label class="custom-switch">
														<input type="checkbox" required  class="custom-switch-input">
														<span class="custom-switch-indicator"></span>
														<span class="custom-switch-description">I agree to terms and conditions</span>
													</label>
										</div> <hr>
										<div class="col-md-12">
											<button type="submit" class="btn btn-primary btn-block">Create new account</button>
										</div>
										<div class="text-center text-muted mt-4">
										Already have account? <a href="{{ route('login') }}">Sign in</a>
									</div><br><br>
								</form>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>

		<script src="{{asset('assets\js\vendors\jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('assets\js\vendors\bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('assets\js\vendors\jquery.sparkline.min.js')}}"></script>
		<script src="{{asset('assets\js\vendors\selectize.min.js')}}"></script>
		<script src="{{asset('assets\js\vendors\jquery.tablesorter.min.js')}}"></script>
		<script src="{{asset('assets\js\vendors\circle-progress.min.js')}}"></script>
		<script src="{{asset('assets\plugins\rating\jquery.rating-stars.js')}}"></script>
		
		<!-- Fullside-menu Js-->
		<script src="{{asset('assets\plugins\fullside-menu\jquery.slimscroll.min.js')}}"></script>
		<script src="{{asset('assets\plugins\fullside-menu\waves.min.js')}}"></script>
		
		<!-- Custom scroll bar Js-->
		<script src="{{asset('assets\plugins\scroll-bar\jquery.mCustomScrollbar.concat.min.js')}}"></script>

		<!-- Custom Js-->
		<script src="{{asset('assets\js\custom.js')}}"></script>
		<script src="{{asset('assets\js\select2.js')}}"></script>
		<script src="{{asset('assets\js\popover.js')}}"></script>
		<!-- Notifications js -->
		<script src="{{asset('assets\plugins\notify\js\rainbow.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\sample.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\jquery.growl.js')}}"></script>
		
		@if ($errors->has('name'))
                                        
		 <script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{ $errors->first('name') }}"
			});

	
		  });
		}).call(this);

		 var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-31911059-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();</script>
		  @endif
		  
		  @if ($errors->has('username'))
                                        
		 <script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{ $errors->first('username') }}"
			});

	
		  });
		}).call(this);

		 var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-31911059-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();</script>
		  @endif
		  
		  @if ($errors->has('email'))
                                        
		 <script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{ $errors->first('email') }}"
			});

	
		  });
		}).call(this);

		 var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-31911059-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();</script>
		  @endif
		  
		    @if ($errors->has('password'))
                                        
		 <script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{ $errors->first('password') }}"
			});

	
		  });
		}).call(this);

		 var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-31911059-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();</script>
		  @endif
		  
		    @if ($errors->has('referred'))
                                        
		 <script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{ $errors->first('referred') }}"
			});

	
		  });
		}).call(this);

		 var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-31911059-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();</script>
		  @endif
	</body>
</html>
@endsection