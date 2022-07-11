@extends('layouts.admin.auth.auth')
@section('content')
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <form method="POST" action="{{ route('login') }}" class="login-form">
                        @csrf
                
                    <form>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" value="tdv.sunilkumar@gmail.com" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                                @if (isset($errors) && $errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                                <div class="checkbox">
                                    <label>
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                                    <label class="pull-right">
                                <!-- <a href="{{ route('password.request') }}">Forgotten Password?</a> -->
                            </label>

                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                                
                                <div class="register-link m-t-15 text-center">
                                    <!-- <p>Don't have account ? <a href="#"> Sign Up Here</a></p> -->
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection