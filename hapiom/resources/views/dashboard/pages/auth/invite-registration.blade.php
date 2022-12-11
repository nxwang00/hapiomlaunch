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

    <style>
        kbd {
            background-color: #3193d4;
        }
    </style>
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
                            <a class="sign-in-logo mb-5" href="#"><img src="{{ url('assets/dashboard/images/logo-ha.png') }}" class="img-fluid" alt="logo"></a>
                            <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                                <div class="item">
                                    <img src="{{ url('assets/dashboard/images/login/1.png') }}" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                                <div class="item">
                                    <img src="{{ url('assets/dashboard/images/login/1.png') }}" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                                <div class="item">
                                    <img src="{{ url('assets/dashboard/images/login/1.png') }}" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 bg-white pt-5 mb-2">
                        <div class="sign-in-from">
                            <img src="{{ url('assets/dashboard/images/logo-ha.png') }}" class="img-fluid" alt="logo">
                            @include('dashboard.includes.alert')
                            <form class="mt-4" method="POST" action="{{ route('admin-registration') }}" id="signup-form">
                              {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control mb-0" id="first_name" name="first_name" placeholder="Your First Name" value="{{ old('first_name') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control mb-0" id="last_name" name="last_name" placeholder="Your Last Name" value="{{ old('last_name') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control mb-0" id="email" name="email" readonly placeholder="Enter email" value="{{ $inviteUserEmail }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control mb-0" id="password" name="password" placeholder="Password" required>
                                </div>
                                <input type="hidden" name="role" value="3">
                                <div class="d-inline-block w-100">
                                    <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="optionsCheckboxes">
                                        <label class="custom-control-label" for="customCheck1">I accept <a href="#" data-toggle="modal" data-target="#exampleModalCenter">Terms and Conditions</a></label>
                                    </div>
                                    <button type="button" class="btn btn-primary float-right" onclick="onSignupClicked()" disabled id="signupBtn">Sign Up</button>
                                </div>
                                <div class="sign-info text-center">
                                    <p class="dark-color d-inline-block line-height-2">Already Have a HapiOm Account ? <a href="{{ url('/') }}">Log In</a></p>
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
        <div class="modal fade" id="user-signup-agreement" data-keyboard="false" tabindex="-1" aria-labelledby="user-signup-agreement" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content" style="background: #ceedff; opacity: 0.93">
                    <div class="modal-body">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ url('assets/dashboard/images/logo-wing.png') }}" class="img-fluid" alt="logo" style="width: 20%">
                            <h4 class="ml-4 font-weight-bolder">WHAT IS HAPIOM?</h4>
                        </div>
                        <div class="mt-3">
                            {!! $agreementText !!}
                        </div>
                        <div class="text-center">
                            <h6 class="mt-4" style="color: #3193d4">At HapiOm, we believe the only true religion is love.</h6>
                            <p class="mt-4">
                                If you feel aligned with these things,
                                <kbd style="cursor: pointer" onclick="onProceedClicked()">
                                    PLEASE PROCEED
                                </kbd>
                                 and have a lovely time. Please keep in mind that this is a new website and quite complex, so be patient as we grow. or
                                <a href="javascript:void(0);" data-dismiss="modal">cancel</a>
                            </p>
                            <p class="font-italic" style="margin-top: 10px">
                                If you have questions, visit our <a href="javascript:void(0);">FAQ</a>.
                            </p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <img src="{{ url('assets/dashboard/images/star-heart.png') }}" class="img-fluid" alt="logo" style="width: 8%">
                        </div>
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

      <script>
        function onSignupClicked() {
            $("#user-signup-agreement").modal("show");
        }

        function onProceedClicked() {
            $("#signup-form").submit();
        }

        function changeBtnStatus() {
            let firstName = $("#first_name").val();
            let lastName = $("#last_name").val();
            let email = $("#email").val();
            let password = $("#password").val();
            let acceptTerms = $("#customCheck1").prop('checked');
            if (firstName && lastName && email && password && acceptTerms) {
                $("#signupBtn").removeAttr('disabled');
            } else {
                $("#signupBtn").attr('disabled', 'true');
            }
        }

        $(document).ready(function() {
            $("input").keydown(function(){
                changeBtnStatus();
            });
            $("#customCheck1").on('change', function() {
                changeBtnStatus();
            })
        })
      </script>
   </body>
</html>