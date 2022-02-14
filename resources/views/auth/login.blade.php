@extends('layouts.app')

@section('admin-tem')
        <!-- template start -->
    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
            <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">
                <span class="tx-normal">[</span> bracket <span class="tx-info">plus</span> <span class="tx-normal">]</span>
            </div>
            <div class="tx-center mg-b-60">The Admin Template For Perfectionist</div>

             <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('login') }}" >
                @csrf 
                <div class="form-group">
                    <input id="email" type="email" class="form-control"  name="email" value="{{old('email')}}" required autofocus />
                </div><!-- form-group -->
                <div class="form-group">
                <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                    <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
                </div><!-- form-group -->
                <button type="submit" class="btn btn-info btn-block">Sign In</button>
            </form>

            <div class="mg-t-60 tx-center">Not yet a member? <a href="" class="tx-info">Sign Up</a></div>
        </div><!-- login-wrapper -->
    </div><!-- d-flex -->

@endsection