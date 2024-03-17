<div>
    <form class="form w-100"  wire:submit.prevent="loginAttempt" >
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">Seller Login</h1>
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
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-2">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                <!--end::Label-->
                <!--begin::Link-->
                <a href="{{route('seller.forget')}}" class="link-primary fs-6 fw-bolder">Forgot Password?</a>
                <!--end::Link-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" wire:model="password" autocomplete="off" />
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                Log In
            </button>
            <!--end::Submit button-->
        </div>
        <!--end::Actions-->
    </form>
</div>
