@extends('dashboard.layouts.master')
@section('title', ' Polls')
@section('page', ' Polls')
@section('page-css-link') @endsection
@section('page-css')@endsection
@section('main-content')
<!-- Stunning header -->
<div id="content-page" class="content-page">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="col-sm-12">
               <div class="iq-card">
                  <div class="iq-card-header d-flex justify-content-between">
                     <div class="iq-header-title">
                        <h4 class="card-title">{{ ucfirst($polls->title) }} - {{ ucfirst($polls->question) }}</h4>                              
                     </div>
                     <a href="{{ route('polls') }}" class="btn-sm btn-primary btn-md-2 float-right">Back<div class="ripple-container"></div></a>							
                  </div>
                   	<div class="container mt-4">
						<div class="row">
							
							<div class="col-md-12 ">
								<div class="h6">Title</div>
								<div class="title">{{ ucfirst($polls->title) }}</div>
							</div>
						
							<div class="col-md-12 ">
								<div class="h6">Question</div>
								<div class="title">{{ ucfirst($polls->question) }}</div>
							</div>
						</div>								
							
							<div class="col-md-6">
								<div class="col-md-6 ">
									<div class="h6">Option A</div>
									<div class="title">{{ $polls->option_a }}</div>
								</div>

								<div class="col-md-6 ">
									<div class="h6">Option B</div>
									<div class="title">{{ $polls->option_b }}</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="col-md-6 ">
									<div class="h6">Option C</div>
									<div class="title">{{ $polls->option_c }}</div>
								</div>

								<div class="col-md-6 ">
									<div class="h6">Option D</div>
									<div class="title">{{ $polls->option_d }}</div>
								</div>
							</div>
						</div>	
					</div>


                  <div class="iq-card-body"> 
                     <p>@include('dashboard.includes.alert')</p>                       
                     <div class="table-responsive">
                        <table class="table">
                           <thead>
                              <tr>
                                 <th scope="col">S.No</th>
                                 <th scope="col">User Name</th> 
                                 <th scope="col">Polls Result</th>
                              </tr>
                           </thead>
                           <tbody>
                            @php
							$i = 1;
							@endphp
							@if($results->count() > 0)
		                    @foreach($results as $index => $result)
                              <tr>
                                 <th scope="row">{{ $i }}</th>
                                 <td>{{ ucfirst($result->PollsGetUser->name) }}</td> 
                                 <td>{{ $result->PollsResult($result->polls_result) }}</td>                               
                                                                      
                                 </tr>
                            @php
							$i++
							@endphp
							@endforeach
							@else
                                 <tr>
                                    <td colspan="6">
                                       <h3 class="text-danger text-center">Ooops! no data found.</h3>
                                    </td>
                                 </tr>
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

@endsection
@section('page-js-link') @endsection
@section('page-js') @endsection