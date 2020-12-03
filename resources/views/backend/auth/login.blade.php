@extends('backend.auth.master')

@section('content')

  <!-- BEGIN BODY -->



    <body class=" login_page">


        <div class="login-wrapper">
            <div id="login" class="login loginpage offset-xl-4 col-xl-4 offset-lg-3 col-lg-6 offset-md-3 col-md-6 col-offset-0 col-12">
                <h1><a href="#" title="Login Page" tabindex="-1">Ultra Admin</a></h1>

                <form method="POST" action="{{ route('admin.check') }}" name="loginform" id="loginform">
                    @csrf
                    <p>
                        <label for="email">{{ __('E-Mail Address') }}<br />
                        <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </p>
                    <p>
                        <label for="password">{{ __('Password') }}<br />
                        <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </p>


                    <p class="forgetmenot">

                                    <label class="icheck-label form-label" for="remember">
                                        <input  type="checkbox" name="remember" id="remember" value="forever" class="skin-square-orange" {{ old('remember') ? 'checked' : '' }}>
                                        {{ __('Remember Me') }}

                                    </label>
                    </p>



                    <p class="submit">
                        <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-orange btn-block" value="Sign In" />
                    </p>
                </form>

                <p id="nav" class="passreset">
                    <a class="btn btn-link" href="#" title="Password Lost and Found">
                            {{ __('Forgot Your Password?') }}
                    </a>
                    <!-- @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}" title="Password Lost and Found">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif -->
                </p>


            </div>
        </div>


</body> 
@endsection
