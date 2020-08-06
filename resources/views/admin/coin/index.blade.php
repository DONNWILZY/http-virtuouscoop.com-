@extends('layouts.admin')

@section('title', 'View All Coin Units')

@section('content')

   <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		
  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Manage Coin</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Manage Coins</li>
							</ol>
						</div>

						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Coin Units</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">

											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												
												<thead>
												@if(count($coin) > 0)
													<tr>
														<th class="text-center">ID</th>
														<th class="text-center">Name</th>
														<th class="text-center">Price Per Unit</th>
														<th class="text-center">Available Units</th>
														<th class="text-center">Selling Price Per Units</th>
														<th class="text-center">Created Date</th>
														<th class="text-center">Update</th>
														<th class="text-center">Delete</th>
													</tr>
												</thead>
												<tbody>
												  @php $id=0;@endphp
												  @foreach($coin as $post)
												  @php $id++;@endphp

													<tr>
														<td class="text-center">{{ $id }}</td>
														<td class="text-center">{{$post->name}}</td>
														<td class="text-center">{{config('app.currency_symbol')}} {{$post->price}}</td>
														<td class="text-center">{{$post->available}} {{$post->name}}</td>
														<td class="text-center">{{config('app.currency_symbol')}}{{$post->sell}}</td>
														<td class="text-center">{{$post->updated_at->diffForHumans()}}</td>
														<td class="text-center"><a href="{{route('adminCoin.edit',['id'=>$post->id])}}" class="icon"><i class="fa fa-pencil text-success"></i></a></td>
											     		<td class="text-center"><a href="{{route('adminCoin.delete',['id'=>$post->id])}}" class="icon"><i class="fa fa-trash text-danger"></i></a></td>
											     	</tr>
												 
											  @endforeach
											  @else
											<h1 class="text-center">No Blog Post Found</h1>
											@endif											
												</tbody>
											</table>
										</div>
									</div>
								</div>
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

@endsection