<!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.1
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Bootstrap Simple Admin Template</title>
    <link href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/auth.css') }}" rel="stylesheet">
</head') }}>

<body>
    <div class="wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <img class="brand" src="{{ asset('backend/assets/img/bootstraper-logo.png') }}" alt="bootstraper logo">
                    </div>
                    <h6 class="mb-4 text-muted">Login to your account</h6>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label">Email adress :</label>
                            <input type="email" class="form-control" placeholder="Enter Email" type="email" name="email" :value="old('email')" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="password" class="form-label">Password :</label>
                            <input type="password" class="form-control" placeholder="Password" type="password" name="password" required>
                        </div>
                        <div class="mb-3 text-start">
                            <div class="block mt-4">
                                <label for="remember_me" class="flex items-center">
                                    <x-jet-checkbox id="remember_me" name="remember" />
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>
                        </div>

                        <button class="btn btn-primary shadow-2 mb-4">Login</button>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                                </a>
                                
                                <br>

                            @endif

                        </div>

                    </form>

                    <!-- jet form start  -->
                    <!-- <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <x-jet-label for="email" value="{{ __('Email : ') }}" /> <br>
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                         </div>

                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Password : ') }}" /> <br>
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-jet-checkbox id="remember_me" name="remember" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <br>

                        <x-jet-button class="ml-4">
                                {{ __('Log in') }}
                        </x-jet-button>
                            

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                                </a>
                                
                                <br>

                            @endif

                        </div>
                    </form> -->
                    <!-- jet form end -->

                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('backend/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>