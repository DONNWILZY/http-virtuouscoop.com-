@extends('layouts.admin')
@section('title', 'Card Sales Request')
@section('content')
           <link href="{{asset('assets\plugins\notify\css\jquery.growl.css')}}" rel="stylesheet" />
		
  <div class=" content-area">
						<div class="page-header">
							<h4 class="page-title">Gift Cards Sales</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Gift Cards Sales</li>
							</ol>
						</div>

							<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Gift Card Sales</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">

											<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
												
												<thead>
												   @if(count($withdraws) > 0)
													<tr>
														<th class="text-center">SN</th>
														<th class="text-center">Gateway</th>
														<th class="text-center">Amount</th>
														<th class="text-center">Charge</th>
														<th class="text-center">To Pay</th>
														<th class="text-center">Account</th>
														<th class="text-center">Date</th>
														<th class="text-center">User</th>
														<th class="text-center">Approve</th>
														<th class="text-center">Refund</th>
													</tr>
												</thead>
												<tbody>
												  @php $id=0;@endphp
                               					  @foreach($withdraws as $withdraw)
                               				      @php $id++;@endphp
                               
													<tr>
														<td class="text-center">{{ $id }}</td>
														<td class="text-center">{{$withdraw->gateway_name}}</td>
														<td class="text-center">{{config('app.currency_symbol')}} {{$withdraw->amount}}</td>
														<td class="text-center">{{config('app.currency_symbol')}} {{$withdraw->charge}}</td>
														<td class="text-center">{{config('app.currency_symbol')}} {{$withdraw->net_amount}}</td>
														<td class="text-center">{{$withdraw->account}}</td>
														<td class="text-center">{{$withdraw->created_at->diffForHumans()}}</td>
														<td class="text-center"><a href="{{route('admin.user.show', $withdraw->user->id)}}"><span class="badge badge-pill badge-primary">View Account</span></a></td>
														 @if($withdraw->status == 0)
														<td class="text-center"><a href="{{route('admin.withdraw.update', $withdraw->id)}}" ><span class="badge badge-pill badge-success">Approve</span></a></td>
														 <td class="text-center">
														 <a href="{{route('admin.withdraw.fraud', $withdraw->id)}}" ><span class="badge badge-pill badge-danger">Refund & Reject</span></a></td>
														 @endif

											     	</tr>
												 
											  @endforeach
											  @else
											<h3 class="text-center">No Withdrawal Made Yet</h3>
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