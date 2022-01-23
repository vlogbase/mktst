@extends('customer.layouts.master')
@section('title','Register - SavoyFoods')
@section('content')


<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START LOGIN SECTION -->
    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Register</h3>
                            </div>
                            @livewire('customer.register-form')
                            <div class="different_login">
                                <span> or</span>
                            </div>
                            <div class="form-note text-center">Do Have an Account? <a href="{{route('login')}}">Sign in</a></div>
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
@section('js')
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
{{-- <script>
    $(document).ready(function(){ 
    $(".phone").inputmask({
    mask: '+999999999999',
    placeholder: ' ',
    showMaskOnHover: false,
    showMaskOnFocus: false,
    onBeforePaste: function (pastedValue, opts) {
    var processedValue = pastedValue;

    //do something with it

    return processedValue;
    }
    });
    });
</script> --}}
@endsection