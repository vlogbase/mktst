@extends('customer.layouts.master')
@section('title','Verified - SavoyFoods')
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
                                <div class="text-center">
                                   <img style="width:200px;" src="/upload/other/verified-pic.png" alt="">
                            
                                <h3 class="mt-3">Verified Your Account</h3>
                                <p>
                                    Hello, <strong>{{$user->name}}</strong> <br>
                                    Your account has been verified. You can login.
                                </p>
                                </div>
                                <div class="text-center">
                                        <a href="{{route('login')}}" class="btn btn-primary">Log in</a>
                                </div>
                                
                            </div>
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