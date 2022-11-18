@extends('dashboard.layouts.master')
@section('title', ' Polls')
@section('page', ' Polls')
@section('page-css-link') @endsection
@section('page-css')
<style type="text/css">
	.float-right {
	  float: right !important;
	}
</style>
@endsection
@section('main-content')
<!-- Stunning header -->

<div class="header-spacer"></div>

<div class="container">
	<div class="row">
		<div class="col col-xl-12 order-xl-2 col-lg-12 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">

			<div class="ui-block">
				<div class="ui-block-title">
					<div class="row">
						<h3 class="title text-center">{{ ucfirst($polls->title) }} - {{ ucfirst($polls->question) }}</h3>
					</div>

					<!-- <h6 class="title text-center">{{ $polls->option_c }} - {{ $polls->option_d }}</h6> -->

					<a href="{{ route('polls') }}" class="btn btn-primary btn-md-2 float-right">Back<div class="ripple-container"></div></a>

					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="col-md-6 text-center">
									<div class="h6">Option A</div>
									<div class="title">{{ $polls->option_a }}</div>
								</div>

								<div class="col-md-6 text-center">
									<div class="h6">Option B</div>
									<div class="title">{{ $polls->option_b }}</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="col-md-6 text-center">
									<div class="h6">Option C</div>
									<div class="title">{{ $polls->option_c }}</div>
								</div>

								<div class="col-md-6 text-center">
									<div class="h6">Option D</div>
									<div class="title">{{ $polls->option_d }}</div>
								</div>
							</div>
						</div>	
					</div>
					
				</div>
				
				<div class="ui-block">				
				<!-- Forums Table -->
				@include('dashboard.includes.alert')
					<table class="forums-table">
						<thead>
						<tr>
							<th class="forum text-center">
								S.No
							</th>
					
							<th class="topics">
								User Name
							</th>

							<!-- <th class="topics">
								Options
							</th> -->

							<th class="description">
								Polls Result 
							</th>
					
							<!-- <th class="posts">
								Status
							</th> -->
						</tr>
						</thead>
						<tbody>
							@php
							$i = 1;
							@endphp
							@if($results->count() > 0)
		                    @foreach($results as $index => $result)

							<tr>
								<td class="description">
									<a href="#" class="h6 count">{{ $i }}</a>
								</td>
								<td class="description">
									<a href="#" class="h6 count">{{ ucfirst($result->PollsGetUser->name) }}</a>
								</td>
								<!-- <td class="description">
									<a href="#" class="h6 count">Option {{ $result->PollsResult($result->polls_result) }}</a>
								</td> -->
								<td class="description">
									<a href="#" class="h6 count">{{ $result->PollsResult($result->polls_result) }}</a>
								</td>
								<!-- <td class="posts">
									@if($result->polls_status == 1)							
										<span class="icon-status online"></span>
										<span>Active</span>						
									@else						
										<span class="icon-status disconected"></span>
										<span>Inactive</span>					
									@endif
								</td> -->
							</tr>
							@php
							$i++
							@endphp
							@endforeach
		                    @else
		                    <h3 class="text-danger">Ooops! no data found.</h3>
		                    @endif
						</tbody>
					</table>

				<!-- ... end Forums Table -->
			     </div>		

				<!-- Notification List Frien Requests -->			
				
				<!-- ... end Notification List Frien Requests -->

			</div>
			

		</div>
	</div>
</div>
@endsection
@section('page-js-link') @endsection
@section('page-js') @endsection