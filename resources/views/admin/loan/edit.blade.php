@extends('layouts.admin')

@section('title', 'Edit Invest Plan')

@section('content')

   <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
   <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Edit Loan Plan</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit Loan Plan</li>
							</ol>
						</div>
						
					
						<div class="row">
							<div class="col-lg-12">
							<form action="{{route('adminloan.update',['id'=>$plan->id])}}" class="card" method="post" >
							{{csrf_field()}}
									<div class="card-header">
										<h3 class="card-title">Edit Loan Plan</h3>
									</div>
									<div class="card-body">
										<div class="row">
										
											<div class="col-md-12">
											<div class="form-group">
													<label class="form-label">Loan Name</label>
													 <input id="name" name="name" type="text" value="{{$plan->name}}" class="form-control">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
												<label class="form-label">Minimum Loan</label>
												 <input id="minimum" name="minimum" type="number" value="{{$plan->minimum +0}}" class="form-control">
											</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
												<label class="form-label">Maximum Maximum</label>
												 <input id="maximum" name="maximum" type="number" value="{{$plan->maximum +0}}" class="form-control">
											</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
												<label class="form-label">Loan Interest</label>
												<input id="percentage" name="percentage" type="text" value="{{$plan->percentage}}" class="form-control">
											</div>
											</div>
											
											
											
										</div>
										<div class="card-footer text-right">
										<button type="submit" class="btn btn-primary">Update Loan Plan</button>
									</div>
									</div>
									
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		<script src="{{asset('assets\js\vendors\jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('assets\js\select2.js')}}"></script>
		<script src="{{asset('assets\js\popover.js')}}"></script>
		<!-- Notifications js -->
		<script src="{{asset('assets\plugins\notify\js\rainbow.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\sample.js')}}"></script>
		<script src="{{asset('assets\plugins\notify\js\jquery.growl.js')}}"></script>
		
		 @if (session()->has('message'))
		  <script>
		 (function () {
		  $(function () {
		   return $.growl.notice({
				message: "{!! session()->get('message')  !!}"
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
		   
		   @if(count($errors) > 0)
		    @foreach($errors->all() as $error)
		  <script>
		 (function () {
		  $(function () {
		   return $.growl.error({
				message: "{{$error}} "
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
		  @endforeach
		   @endif

@endsection