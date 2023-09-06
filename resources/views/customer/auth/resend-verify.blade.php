@extends('customer.layouts.master')
@section('title','Need Verification - Markket')
@section('content')


<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START LOGIN SECTION -->
    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Need Verification</h3>
                                <p>Hello, <strong>{{$user->name}}</strong> </p>
                                <p class="text-muted">You must verify your email. Do you want to get verification link again.</p>
                            </div>
                            @livewire('customer.re-verify-form',['user' => $user])
                            <div class="different_login">
                                <span> or</span>
                            </div>
                            <div class="form-note text-center">You already have been verified? <a href="{{route('login')}}">Sign in now</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN SECTION -->

</div>
<!-- END MAIN CONTENT -->

@endsection