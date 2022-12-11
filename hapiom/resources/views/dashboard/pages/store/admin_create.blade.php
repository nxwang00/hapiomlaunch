@extends('dashboard.layouts.master')
@section('title', ' Product Create')
@section('page', ' Product Create')
@section('page-css-link') @endsection
@section('page-css')
<style>
   .custom-file-label::after {
      height: 3em;
      line-height: 2.0
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
                        <h5 class="card-title">Add New Product</h5>
                     </div>
                  </div>
                  <div class="iq-card-body">
                     <p>@include('dashboard.includes.alert')</p>
                     <form method="post" action="{{ route('store-product-save') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label for="product_name">Name:</label>
                              <input class="form-control" type="text" name="product_name" id="product_name" value="" required>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="product_type">Type:</label>
                              <select class="form-select form-control" name="product_type" id="product_type" required>
                                 <option value="good">Good</option>
                                 <option value="course">Course</option>
                                 <option value="service">Service</option>
                              </select>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label for="product_image1">Image:</label>
                              <div class="custom-file" id="product_image_div">
                                 <input type="file" class="custom-file-input" id="product_image" name="product_image" required>
                                 <label class="custom-file-label form-control" for="product_image" style="line-height: 30px !important;"></label>
                              </div>
                              <input class="form-control" type="text" name="product_video_link" required style="display:none">
                           </div>
                           <div class="form-group col-md-6">
                              <label for="product_price">Price:</label>
                              <input class="form-control" type="text" value="" name="product_price" id="product_price">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="product_description">Description:</label>
                           <textarea class="form-control" style="line-height: 28px !important" name="product_description" id="product_description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                           <label for="product_status">Status:</label>
                           <div class="form-check d-flex">
                              <div class="custom-control custom-radio mr-5">
                                 <input type="radio" id="product_status1" name="product_status" class="custom-control-input" value="1" checked>
                                 <label class="custom-control-label" for="product_status1"> Active</label>
                              </div>
                              <div class="custom-control custom-radio">
                                 <input type="radio" id="product_status2" name="product_status" class="custom-control-input" value="0">
                                 <label class="custom-control-label" for="product_status2"> In-active</label>
                              </div>
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('store-index-admin') }}" class="btn iq-bg-danger">Cancel</a>
                     </form>
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
<script>
   $(document).ready(function() {
      $("#product_image").on("change", function() {
         var fileName = $(this).val().split("\\").pop();
         $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });

      $("#product_type").on("change", function() {
         let productType = $(this).val();
         if (productType === 'course') {
            $("#product_image_div").css('display', 'none');
            $("input[name=product_video_link]").css('display', 'block');
            $("#product_image").removeAttr('required');
            $("input[name=product_video_link]").attr('required', 'true');
            $("label[for=product_image1]").html('Video link:')
         } else {
            $("#product_image_div").css('display', 'block');
            $("input[name=product_video_link]").css('display', 'none');
            $("#product_image").attr('required', 'true');
            $("input[name=product_video_link]").removeAttr('required')
            $("label[for=product_image1]").html('Image:')
         }
      })
   })
</script>
@endsection