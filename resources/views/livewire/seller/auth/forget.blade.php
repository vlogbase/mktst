<div>
    <form class="form w-100"  wire:submit.prevent="processAttempt" >
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">Forget Password</h1>
            <!--end::Title-->
        </div>
        <!--begin::Heading-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" type="text" wire:model="email" autocomplete="off" />
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                Send Link
            </button>
            <!--end::Submit button-->
        </div>
        <!--end::Actions-->
        <div>
           <p>Do you remember it? <a href="{{route('seller.login')}}" class="link-primary fs-6 fw-bolder">Login</a></p> 
        </div>
    </form>
</div>
