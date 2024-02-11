
<!DOCTYPE html>
<html lang="en">


<head>
    <title>Mentor - Bootstrap 4 Admin Dashboard Template</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    {{-- <link rel="stylesheet" type="text/css" href="assets/css/vendors.css" /> --}}
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login.css') }}" />
</head>

<body class="bg-white">
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->

            <!-- end pre-loader -->

            <!--start login contant-->
            <div class="app-contant">
                <div class="bg-white">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                                <div class="d-flex align-items-center h-100-vh">
                                    <div class="login p-50">
                                        <h2 class="mb-5">Login to your account.</h2>
                                        {{-- <p>Welcome back, please login to your account.</p> --}}
                                        <x-auth-session-status class="mb-4" :status="session('status')" />
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf                
                                          <div class="row">
                                            <div class="form-group col-md-12 mb-4">
                                              <input type="text" class="form-control input-lg" id="name" name="name" aria-describedby="emailHelp"
                                                placeholder="User Name" required autofocus autocomplete="username">
                                                <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                                            </div>
                                            <div class="form-group col-md-12 ">
                                              <input type="password" name="password" class="form-control input-lg" id="password" placeholder="Password">
                                              <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>
                                            <div class="col-md-12">

                                              {{-- <div class="d-flex justify-content-between mb-3">

                                                <div class="custom-control custom-checkbox mr-3 mb-3">
                                                  <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                  <label class="custom-control-label" for="customCheck2">Remember me</label>
                                                </div>

                                                <a class="text-color" href="#"> Forgot password? </a>

                                              </div> --}}

                                              <button type="submit" class="btn btn-primary btn-pill mb-4 ml-8">Sign In</button>

                                              {{-- <p>Don't have an account yet ?
                                                <a class="text-blue" href="sign-up.html">Sign Up</a>
                                              </p> --}}
                                            </div>
                                          </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
                                <div class="row align-items-center h-100">
                                    <div class="col-9 mx-auto">
                                        <h3 style="color: white">
                                          Welcome to Global GCC Health  
                                        </h3><br>
                                        <h4 style="color: white">
                                          If You Need any Information ! Contact Us.
                                        </h4>
                                        <h4 style="color: white">
                                          Phone: 01841-054578 (whatsapp) <br>
                                          Gmail: globalgcchealth@gmail.com
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end login contant-->
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->



    <!-- plugins -->
    {{-- <script src="assets/js/vendors.js"></script> --}}

    <!-- custom app -->
    {{-- <script src="assets/js/app.js"></script> --}}
</body>


</html>