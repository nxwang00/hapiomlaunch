@extends('dashboard.layouts.master')
@section('title', ' Store')
@section('page', ' Store')
@section('page-css-link') @endsection
@section('page-css')
<style>
.btn i {
   margin-left: 1px;
   margin-right: 1px;
}
</style>
@endsection
@section('main-content')

<div id="content-page" class="content-page">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="col-sm-12">
               <div class="iq-card">
                  <div class="iq-card-header d-flex justify-content-between">
                     <div class="iq-header-title">
                        <h4 class="card-title">Products in Store</h4>
                     </div>
                     <a href="javascript:onNewProduct()" class="btn-sm btn-primary btn-md-2 float-right" id="new_product_btn">+ New Product<div class="ripple-container"></div></a>
                  </div>
                  <div class="iq-card-body">
                     <p>@include('dashboard.includes.alert')</p>
                     <div class="table-responsive">
                        <table class="table">
                           <thead>
                              <tr class="text-center">
                                 <th scope="col">No</th>
                                 <th scope="col" class="w-25">Name</th>
                                 <th scope="col">Type</th>
                                 <th scope="col">Price</th>
                                 <th scope="col">Image</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($products as $product)
                                 <tr class="text-center">
                                    <td scope="row">{{$loop->index + 1}}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->type }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                       @if(!empty($product->image_video))
                                          @if ($product->type === 'course')
                                             <iframe sandbox="allow-same-origin allow-scripts allow-popups"
                                             id="foo" width="70p" height="50px"
                                             src="{{ $product->image_video }}">
                                             </iframe>
                                          @else
                                             <img src="{{ url('images/product/'.$product->image_video) }}" style="width: 50px; height: 50px; object-fit:cover">
                                          @endif
                                       @endif
                                    </td>
                                    <td>
                                       @if($product->status == 1)
                                          <span class="badge badge-primary">Active</span>
                                       @else
                                          <span class="badge badge-danger">Inactive</span>
                                       @endif
                                    </td>
                                    <td>
                                       <a href="{{ route('store-product-edit', $product->id) }}" class="mr-3"><i class="fas fa-edit"></i></a>
                                       <a href="javascript:void(0)" class="text-danger" onclick='confirmDelete("{{ $product->id }}")'><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                     {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('store-product-delete') }}">
         @csrf
         <input type="hidden" id="del_prod_id" name="del_prod_id">
         <div class="modal-body">
            Are you sure to delete this product?
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Ok</button>
         </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Membership Alert</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h5>
                        You need to have Platinum membership.
                    </h5>
                    <h6 class="mt-3">
                        Will you upgrade your membership now?
                    </h6>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="goMembershipPage()">Ok</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-js-link') @endsection
@section('page-js')
<script type="text/javascript">
   function confirmDelete(productId) {
      $("#del_prod_id").val(productId);
      $("#confirmModal").modal('show');
   }

   function onNewProduct() {
      let membershipId = "{{ Auth::user()->meberships_id }}";
      let numOfProds = "{{ count(Auth::user()->store->products) }}";
      if (membershipId === "2") {
         if (parseInt(numOfProds) < 20) {
            location.href="{{ route('store-product-create') }}";
         } else {
            $("#alertModal").modal('show');
         }
      } else if (membershipId === "1") {
         if (parseInt(numOfProds) < 100) {
            location.href="{{ route('store-product-create') }}";
         }
      }
   }

   function goMembershipPage() {
      location.href = "{{ route('profile-setting', ['active'=>'membership']) }}"
   }
</script>
@endsection