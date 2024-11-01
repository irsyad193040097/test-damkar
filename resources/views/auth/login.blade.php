<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Log In | Admin Inisiatif</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="DISKOMINFTIK KBB" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="icon" href="{{ asset('assets/logo/logo-mpp1.png') }}" type="image/png">

		<!-- Bootstrap css -->
		<link href="{{ asset('template_backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
		<!-- App css -->
		<link href="{{ asset('template_backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/>
		<!-- icons -->
		<link href="{{ asset('template_backend/assets/css/icons.min.cs') }}s" rel="stylesheet" type="text/css" />
		<!-- Head js -->
		<script src="{{ asset('template_backend/assets/js/head.j') }}s"></script>

    </head>

    <body class="authentication-bg" style="background-image: url({{ env('APP_URL') . Storage::url(ApplicationHelper::getSetting()->logo_2) }})">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center mb-3">
                                    <div class="auth-logo">
                                        <a href="{{ url('/') }}" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img src="{{ env('APP_URL') . Storage::url(ApplicationHelper::getSetting()->logo_1) }}" alt="" height="100">
                                            </span>
                                        </a>
                    
                                        <a href="{{ url('/') }}" class="logo logo-light text-center">
                                            <span class="logo-lg">
                                                <img src="{{ env('APP_URL') . Storage::url(ApplicationHelper::getSetting()->logo_1) }}" alt="" height="22">
                                            </span>
                                        </a>
                                    </div>
                                    
                                </div>

                                <form method="POST" action="{{ route('login') }}">
                                @csrf

                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Email address</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="text-center d-grid">
                                        <button class="btn btn-primary" type="submit"> Log In </button>
                                    </div>

                                </form>

                                <div class="text-center d-grid mt-3">
                                    <a href="{{ url('/') }}" class="btn btn-danger" type="button"> Kembali Ke Website </a>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            {{ date('Y') }}&copy; {{ ApplicationHelper::getSetting()->appname }}</a> 
        </footer>

        <!-- Vendor js -->
        <script src="{{ asset('template_backend/assets/js/vendor.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('template_backend/assets/js/app.min.js') }}"></script>
        
    </body>
</html>