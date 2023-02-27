<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Hapiom</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ url('assets/dashboard/images/favicon.ico') }}" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ url('assets/dashboard/css/bootstrap.min.css') }}">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{ url('assets/dashboard/css/typography.css') }}">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{ url('assets/dashboard/css/style.css') }}">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{ url('assets/dashboard/css/responsive.css') }}">
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
        <!-- Sign in Start -->
        <section class="sign-in-page">
          <div id="container-inside">
              <div id="circle-small"></div>
              <div id="circle-medium"></div>
              <div id="circle-large"></div>
              <div id="circle-xlarge"></div>
              <div id="circle-xxlarge"></div>
          </div>
            <div class="container p-0">
                <div class="row no-gutters">
                    <div class="col-md-6 text-center pt-5">
                        <div class="sign-in-detail text-white">
                            <a class="sign-in-logo mb-5" href="#"><img src="{{ url('assets/dashboard/images/logo-full.png')}}" class="img-fluid" alt="logo"></a>
                            <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                                <div class="item">
                                    <img src="{{ url('assets/dashboard/images/login/1.png') }}" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Find new friends</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                                <div class="item">
                                    <img src="{{ url('assets/dashboard/images/login/2.png') }}" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Connect with the world</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                                <div class="item">
                                    <img src="{{ url('assets/dashboard/images/login/3.png') }}" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Create new events</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 bg-white pt-5 mb-2">
                        <div class="sign-in-from">
                            <h1 class="mb-0">Login to your Account</h1>
                            <p>Enter your email address and password to access admin panel.</p>
                            @if ($message = Session::get('error'))
							<div class="alert alert-danger alert-block">
							    <strong>{{ $message }}</strong>
							</div>
							@endif
							@include('dashboard.includes.alert')
                            <form class="mt-4" method="POST" action="{{ route('admin-registration') }}">
                              {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">First Name</label>
                                    <input type="text" class="form-control mb-0" id="exampleInputEmail1" name="first_name" placeholder="Your First Name" value="{{ old('first_name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Last Name</label>
                                    <input type="text" class="form-control mb-0" id="exampleInputEmail1" name="last_name" placeholder="Your Last Name" value="{{ old('last_name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Email address</label>
                                    <input type="email" class="form-control mb-0" id="exampleInputEmail2" name="email" placeholder="Enter email" value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control mb-0" id="exampleInputPassword1" name="password" placeholder="Password">
                                </div>
                                @if(isset($admin->id))
									<input type="hidden" name="role" value="3">
									<input type="hidden" name="customer_id" value="{{ $admin->id ?? '' }}">
								@else
								<div class="form-group">
                                    <label for="exampleInputPassword1">Company Name</label>
                                    <input type="text" class="form-control mb-0" id="exampleInputPassword1" name="company_name" placeholder="Company Name" value="{{ old('company_name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Group Type</label>
                                    <select class="form-control group_type" id="group_type" name="group_type">
                                    		<option value="0">Basic</option>
										    <option value="1">Paid</option>
                                    </select>
                                </div>
                                @endif
                                <input type="hidden" name="role" value="3">
                                <div class="d-inline-block w-100">
                                    <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="optionsCheckboxes">
                                        <label class="custom-control-label" for="customCheck1">I accept <a href="#" data-toggle="modal" data-target="#exampleModalCenter">Terms and Conditions</a></label>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Sign Up</button>
                                </div>
                                <div class="sign-info">
                                    <span class="dark-color d-inline-block line-height-2">Already Have Account ? <a href="{{ url('/') }}">Log In</a></span>
                                    <ul class="iq-social-media">
                                        <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
                                        <li><a href="#"><i class="ri-twitter-line"></i></a></li>
                                        <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade show" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display: none; padding-right: 8px;" aria-modal="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalCenterTitle">Terms and Conditions</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                     </button>
                  </div>
                  <div class="modal-body">
                    <p>System should be that if someone does not pay within 2 weeks of their due date, their
                    account is put on hold and they cannot login until they pay.</p>
                  </div>

               </div>
            </div>
         </div>
        <!-- Sign in END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="{{ url('assets/dashboard/js/jquery.min.js') }}"></script>
      <script src="{{ url('assets/dashboard/js/popper.min.js') }}"></script>
      <script src="{{ url('assets/dashboard/js/bootstrap.min.js') }}"></script>
      <!-- Appear JavaScript -->
      <script src="{{ url('assets/dashboard/js/jquery.appear.js') }}"></script>
      <!-- Countdown JavaScript -->
      <script src="{{ url('assets/dashboard/js/countdown.min.js') }}"></script>
      <!-- Counterup JavaScript -->
      <script src="{{ url('assets/dashboard/js/waypoints.min.js') }}"></script>
      <script src="{{ url('assets/dashboard/js/jquery.counterup.min.js') }}"></script>
      <!-- Wow JavaScript -->
      <script src="{{ url('assets/dashboard/js/wow.min.js') }}"></script>
      <!-- Apexcharts JavaScript -->
      <script src="{{ url('assets/dashboard/js/apexcharts.js') }}"></script>
      <!-- lottie JavaScript -->
      <script src="{{ url('assets/dashboard/js/lottie.js') }}"></script>
      <!-- Slick JavaScript -->
      <script src="{{ url('assets/dashboard/js/slick.min.js') }}"></script>
      <!-- Select2 JavaScript -->
      <script src="{{ url('assets/dashboard/js/select2.min.js') }}"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="{{ url('assets/dashboard/js/owl.carousel.min.js') }}"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="{{ url('assets/dashboard/js/jquery.magnific-popup.min.js') }}"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="{{ url('assets/dashboard/js/smooth-scrollbar.js') }}"></script>
      <!-- Chart Custom JavaScript -->
      <script src="{{ url('assets/dashboard/js/chart-custom.js') }}"></script>
      <!-- Custom JavaScript -->
      <script src="{{ url('assets/dashboard/js/custom.js') }}"></script>
   </body>
</html>
