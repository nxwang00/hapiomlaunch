@extends('dashboard.layouts.master')
@section('title', ' Mebership')
@section('page', ' Mebership')
@section('page-css-link') @endsection
@section('page-css')
<style type="text/css">
	.float-right {
	  float: right !important;
	}
</style>   
@endsection
@section('main-content')
<!-- Top Header-Profile -->
<div class="header-spacer"></div>

<div class="container">
	<div class="row">
		<div class="col col-xl-12 order-xl-2 col-lg-12 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">{{ $groupmaster->name }}</h6>
					<a href="{{ route('groups') }}" class="btn btn-primary btn-md-2 float-right">Back<div class="ripple-container"></div></a>
				</div>
				<div class="ui-block-content">
					@include('dashboard.includes.alert')
					<table class="forums-table">
						<thead>
						<tr>
							<th class="forum">
								Id
							</th>
					
							<th class="topics">
								Name
							</th>
							<th class="posts">
								Status
							</th>
					
							<th class="freshness">
								Action
							</th>
						</tr>
						</thead>
						<tbody>
						@if(isset($results) && $results->count() > 0)
	                    @foreach ($results as $index => $result)
							<tr>
								<td class="forum">
									#{{$index + $results->firstItem()}}
								</td>
								<td class="topics">
									<a href="#" class="h6 count">{{ $result->groupUserName->name }}</a>
								</td>
								<td class="posts">
									@if($result->status == 0)							
										<span class="icon-status online"></span>
										<span>Join Request</span>						
									@elseif($result->status == 1)						
										<span class="icon-status online"></span>
										<span>Approved</span>					
									@elseif($result->status == 2)
									    <span class="icon-status disconected"></span>
										<span>Deny</span>
									@elseif($result->status == 3)
									    <span class="icon-status disconected"></span>
										<span>Block</span>
									@endif
								</td>
								<td class="freshness">
									<a href="{{ route('group-action',['id' => $result->group_id,'user_id' => $result->user_id, 'status' =>1 ]) }}" class="btn btn-primary btn-sm">Approve</a>
									<a href="{{ route('group-action',['id' => $result->group_id,'user_id' => $result->user_id, 'status' =>2]) }}" class="btn btn-sm bg-yellow">Deny</a>
									<a href="{{ route('group-action',['id' => $result->group_id,'user_id' => $result->user_id, 'status' =>3]) }}" class="btn btn-sm bg-grey">Block</a>
								</td>
							</tr>
						@endforeach
	                    @else
	                    <h3 class="text-danger">Ooops! no data found.</h3>
	                    @endif	
						</tbody>
					</table>
				</div>
			</div>
			<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 align-center pb120">
				<!-- Pagination -->
				<nav aria-label="Page navigation">
					@if ($results->lastPage() > 1)
					<ul class="pagination justify-content-center">
						<li class="page-item disabled {{ ($results->currentPage() == 1) ? ' disabled' : '' }}">
							<a class="page-link" href="{{ $results->url(1) }}" tabindex="-1">Previous</a>
						</li>
						@for ($i = 1; $i <= $results->lastPage(); $i++)
						<li class="page-item {{ ($results->currentPage() == $i) ? ' active' : '' }}"><a class="page-link" href="{{ $results->url($i) }}">{{ $i }}<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: -10.3833px; top: -16.8333px; background-color: rgb(255, 255, 255); transform: scale(16.7857);"></div></div></a></li>
						@endfor
						<li class="page-item {{ ($results->currentPage() == $results->lastPage()) ? ' disabled' : '' }}">
							<a class="page-link" href="{{ $results->url($results->lastPage()) }}">Next</a>
						</li>
					</ul>
					@endif
				</nav>
				<!-- ... end Pagination -->
			</div>
		</div>
	</div>
</div>
@endsection
@section('page-js-link') @endsection
@section('page-js') @endsection