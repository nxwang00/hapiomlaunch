@extends('dashboard.layouts.master')
@section('title', ' Group Type')
@section('page', ' Group Type')
@section('page-css-link') @endsection
@section('page-css')
<style>
   .store-master {
      position: absolute;
      top: 150px;
      left: 10px;
   }
</style>
@endsection
@section('main-content')
 <!-- Page Content  -->
 <div id="content-page" class="content-page">
    <div class="container">
      <div class="iq-card shadow-sm p-0">
         <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
               <h4 class="card-title">Stores</h4>
            </div>
         </div>
      </div>
      @include('dashboard.includes.alert')
      <div class="row">
         @foreach($stores as $store)
         <div class="col-md-6 col-lg-4">
            <div class="card">
               <div class="store-master">
                  @if (isset($store->master->userInfo->profile_image))
                     <img src="{{ url('images/profile', $store->master->userInfo->profile_image) }}" alt="chatuserimage" class="avatar-35" style="border-radius: 50%;">
                  @else
                     <img src="{{url('assets/dashboard/img/default-avatar.png')}}" alt="chatuserimage" class="avatar-35" style="border-radius: 50%;">
                  @endif
                  <span style="color:white; text-shadow: 2px 2px 4px #000000;">{{ $store->master->name }}<span>
               </div>
               <a href="{{ route('store-detail', $store->id) }}">
                  <img class="card-img-top" src="{{ url('images/store/',$store->image) }}"
                     style="width:100%; height: 200px; object-fit:cover">
               </a>
               <div class="card-body" style="overflow:hidden">
                  <h5 class="card-title">{{ $store->sname }}</h5>
                  <hr />
                  <p class="card-text" style="height: 120px; overflow-y: auto">{{ $store->description }}</p>
               </div>
            </div>
         </div>
         @endforeach
      </div>
    </div>
</div>

@endsection

@section('page-js-link') @endsection
@section('page-js')
<script type="text/javascript">

</script>
@endsection
