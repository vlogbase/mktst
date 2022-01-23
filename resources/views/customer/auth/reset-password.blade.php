@extends('customer.layouts.master')
@section('title','Reset Password - SavoyFoods')
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
                                <h3>Reset Password</h3>
                            </div>
                            @livewire('customer.reset-password-form',['email' => $email,'token'=>$token])
                            <div class="different_login">
                                <span> or</span>
                            </div>
                            <div class="form-note text-center">Don't Have an Account? <a href="{{route('register')}}">Sign up now</a></div>
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