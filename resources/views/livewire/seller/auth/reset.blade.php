<div>
    <form class="form w-100"  wire:submit.prevent="processAttempt" >
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">Reset Password</h1>
            <!--end::Title-->
        </div>
        <!--end::Heading-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-2">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                <!--end::Label-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" wire:model="password" autocomplete="off" />
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            <!--end::Input-->
        </div>
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-2">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password Confirmation</label>
                <!--end::Label-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid @error('password_confirmation') is-invalid @enderror" type="password" wire:model="password_confirmation" autocomplete="off" />
            @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
            <!--end::Input-->
        </div>
        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                Update
            </button>
            <!--end::Submit button-->
        </div>
        <!--end::Actions-->
        <div>
           <p>Do you remember it? <a href="{{route('seller.login')}}" class="link-primary fs-6 fw-bolder">Login</a></p> 
        </div>
    </form>
</div>
