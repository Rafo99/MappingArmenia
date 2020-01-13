@extends('layouts.app')

@section('title', 'Sign In')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url('/img/logo.png');">
                    <span class="login100-form-title-1">Sign In</span>
                </div>
                <form action="{{ route('login') }}" method="POST" class="login100-form validate-form">
                    <div class="wrap-input100 validate-input m-b-26">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="text" name="email" placeholder="Enter Email"
                               value="{{ old('email') }}" required autofocus>
                        <span class="focus-input100"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="wrap-input100 validate-input m-b-18">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Enter password" required>
                        <span class="focus-input100"></span>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    {{--<div class="flex-sb-m w-full p-b-30">--}}
                        {{--<div class="contact100-form-checkbox">--}}
                            {{--<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>--}}
                            {{--<label class="label-checkbox100" for="ckb1">--}}
                                {{--Remember me--}}
                            {{--</label>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>

@endsection
