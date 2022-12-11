@extends('dashboard.layouts.master')
@section('title', ' Payment Invoice')
@section('page', ' Payment Invoice')
@section('page-css-link') @endsection
@section('page-css')

@endsection
@section('main-content')
<div id="content-page" class="content-page">
    <div class="container">
       <div class="row">
          <div class="col-sm-12">
             <div class="iq-card position-relative inner-page-bg bg-primary" style="height: 150px;">
                <div class="inner-page-title">
                   <h3 class="text-white">Invoice Page</h3>
                   <p class="text-white">lorem ipsum</p>
                </div>
             </div>
          </div>
          <div class="col-sm-12">
             <div class="iq-card">
                <div class="iq-card-body">
                   <div class="row">
                      <div class="col-lg-6">
                         <img src="{{ url('assets/dashboard/images/logo.png') }}" class="img-fluid w-25" alt="">
                      </div>
                      <div class="col-lg-6 align-self-center">
                         <h4 class="mb-0 float-right">Invoice</h4>
                      </div>
                      <div class="col-sm-12">
                         <hr class="mt-3">
                         <h5 class="mb-0">Hello, {{ Auth::user()->name }}</h5>
                         <p></p>
                      </div>
                   </div>
                   <div class="row">
                      <div class="col-lg-12">
                         <div class="table-responsive-sm">
                            <table class="table">
                               <thead>
                                  <tr>
                                     <th scope="col">Order Date</th>
                                     <th scope="col">Order Status</th>
                                     <th scope="col">Order ID</th>
                                     <th scope="col">Billing Address</th>
                                     <th scope="col">Shipping Address</th>
                                  </tr>
                               </thead>
                               <tbody>
                                  <tr>
                                     <td>{{ $payment->created_at }}</td>
                                     <td><span class="badge badge-danger">paid</span></td>
                                     <td>{{ $payment->id }}</td>
                                     <td>

                                     </td>
                                     <td>

                                     </td>
                                  </tr>
                               </tbody>
                            </table>
                         </div>
                      </div>
                   </div>
                   <div class="row">
                      <div class="col-sm-12">
                         <h5>Order Summary</h5>
                         <div class="table-responsive-sm">
                            <table class="table table-striped">
                               <thead>
                                  <tr>
                                     <th class="text-center" scope="col">#</th>
                                     <th scope="col">Item</th>
                                     <th class="text-center" scope="col">Quantity</th>
                                     <th class="text-center" scope="col">Price</th>
                                     <th class="text-center" scope="col">Totals</th>
                                  </tr>
                               </thead>
                               <tbody>
                               	@if($carts->count() > 0)
                               	@php $sr= 1; @endphp
								@foreach($carts as $index => $cart)
                                  <tr>
                                     <th class="text-center" scope="row">{{ $sr }}</th>
                                     <td>
                                        <h6 class="mb-0">{{ $cart->ProductDetail->ProductCategory->name }}</h6>
                                        <p class="mb-0">{{ $cart->ProductDetail->product }}</p>
                                     </td>
                                     <td class="text-center">1</td>
                                     <td class="text-center">${{ $cart->amount }}</td>
                                     <td class="text-center"><b>${{ $cart->amount }}</b></td>
                                  </tr>
                               	@php $sr= $sr+1; @endphp

                                @endforeach
                                @endif
                               </tbody>
                            </table>
                         </div>
                         <h5 class="mt-5">Order Details</h5>
                         <div class="table-responsive-sm">
                            <table class="table table-striped">
                               <thead>
                                  <tr>
                                     <th scope="col">Bank</th>
                                     <th scope="col">.Acc.No</th>
                                     <th scope="col">Due Date</th>
                                     <th scope="col">Sub-total</th>
                                     <th scope="col">Discount</th>
                                     <th scope="col">Total</th>
                                  </tr>
                               </thead>
                               <tbody>
                                  <tr>
                                     <th scope="row">Threadneedle St</th>
                                     <td></td>
                                     <td>{{ $payment->createda_at}}</td>
                                     <td>${{ $total_amount }}</td>
                                     <td>0%</td>
                                     <td><b>${{ $total_amount}} USD</b></td>
                                  </tr>
                               </tbody>
                            </table>
                         </div>
                      </div>
                      <div class="col-sm-6"></div>
                      <div class="col-sm-6 text-right">
                         <button type="button" class="btn btn-link mr-3"><i class="ri-printer-line"></i> Download Print</button>
                      </div>
                      <div class="col-sm-12 mt-5">
                         <b class="text-danger">Notes:</b>
                         <p></p>
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
@section('page-js')
@endsection