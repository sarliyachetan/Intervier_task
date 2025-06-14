<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
   <head>
      <meta charset="utf-8" />
      <title>saleperson Login | AXIEVER INTERVIWE </title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="Premium Multipurpose saleperson & Dashboard Template" name="description" />
      <meta content="Themesbrand" name="author" />
      <!-- App favicon -->
      <link rel="shortcut icon" type="image/png" href="{{ asset('backend/Logo/thumnail.png') }}" />
      <!-- Layout config Js -->
      <script src="{{asset('backend/js/layout.js')}}"></script>
      <!-- Bootstrap Css -->
      <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
      <!-- Icons Css -->
      <link href="{{asset('backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
      <!-- App Css-->
      <link href="{{asset('backend/css/app.min.css')}}" rel="stylesheet" type="text/css" />
      <!-- custom Css-->
      <link href="{{asset('backend/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

   </head>
   <body>
      <div class="auth-page-wrapper pt-5">
         <!-- auth page bg -->
         <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>
            <div class="shape">
               <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                  <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
               </svg>
            </div>
         </div>
         <!-- auth page content -->
         <div class="auth-page-content">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
      
                           <div class="mb-5 text-white-50">
                            <h5 class="display-5 coming-soon-text">AXIEVER SalePerson</h5>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
               <!-- end row -->
               <div class="row justify-content-center">
                  <div class="col-md-8 col-lg-6 col-xl-5">
                     <div class="card mt-4 card-bg-fill">
                        <div class="card-body p-4">
                           <div class="text-center mt-2">
                              <h5 class="text-primary"> WELCOME</h5>
                            
                           </div>
                           <div class="p-2 mt-4">
                              <form class="needs-validation" novalidate id="login-form" method="post" action="{{ route('saleperson.postLogin')}}">
                                @csrf
                                 <div class="mb-3">
                                    <label for="useremail" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" value="{{ old('email') }}" class="form-control" name="email" id="email" placeholder="Enter email address">
                                    <div class="invalid-feedback">
                                       Please enter email
                                    </div>
                                 </div>

                                 <div class="mb-3">
                                    <label class="form-label" for="password-input">Password</label>
                                    <div class="position-relative auth-pass-inputgroup">
                                       <input type="password" value="{{ old('password') }}"  name="password" class="form-control pe-5 password-input"  placeholder="Enter password" id="password-input" >
                                    </div>
                                 </div>

                                 <div class="mt-4">
                                    <button class="btn btn-success w-100" type="submit">Sign Up</button>
                                 </div>
                                
                              </form>
                           </div>
                        </div>
                        <!-- end card body -->
                     </div>
                     <!-- end card -->
                  </div>
               </div>
               <!-- end row -->
            </div>
            <!-- end container -->
         </div>
         <!-- end auth page content -->
         <!-- footer -->
         <footer class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="text-center">
                        <p class="mb-0 text-muted">
                           &copy;
                           <script>document.write(new Date().getFullYear())</script>
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </footer>
         <!-- end Footer -->
      </div>
      <!-- end auth-page-wrapper -->
      <!-- JAVASCRIPT -->
      <script src="{{asset('backend/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('backend/libs/simplebar/simplebar.min.js')}}"></script>
      <script src="{{asset('backend/libs/node-waves/waves.min.js')}}"></script>
      <script src="{{asset('backend/libs/feather-icons/feather.min.js')}}"></script>
      <script src="{{asset('backend/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
      <script src="{{asset('backend/js/plugins.js')}}"></script>
      <!-- particles js -->
      <script src="{{asset('backend/libs/particles.js/particles.js')}}"></script>
      <!-- particles app js -->
      <script src="{{asset('backend/js/pages/particles.app.js')}}"></script>
      <!-- validation init -->
      <script src="{{asset('backend/js/pages/form-validation.init.js')}}"></script>
      <!-- password create init -->
      <script src="{{asset('backend/js/pages/passowrd-create.init.js')}}"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <style>
        .toast-success {
        background-color: #3498db;
        color: #fff;
        }
        .toast-close-button {
        color: #fff;
        }
     </style>

      <script>

           $(document).ready(function() {
            $('#login-form').submit(function(e) {
                e.preventDefault();

                // Perform AJAX submission
                $.ajax({
                    url: "{{ route('saleperson.postLogin') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            toastr.success('Logged in successfully!', 'Success', { timeOut: 3000 });
                            setTimeout(() => {
                              window.location.href = "{{ url('saleperson/dashboard') }}";
                            }, 3000);
                        } else {
                            // Display error message using Toastr
                            if (response.error === 'account_inactive') {
                                toastr.error(response.message, 'Error');
                            } else if (response.error === 'email_required') {
                                toastr.error('Please enter your email.', 'Error');
                            } else if (response.error === 'password_required') {
                                toastr.error('Please enter your password.', 'Error');
                            } else {
                                toastr.error(response.error, 'Error');
                            }
                        }
                    }
                });
            });
         });
      </script>
   </body>
</html>
