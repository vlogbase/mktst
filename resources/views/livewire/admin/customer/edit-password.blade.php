<div>
    <form wire:submit.prevent="submit">
          <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label  fw-bold fs-6">Password</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row">
            <input type="password" wire:model="password"
                class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" />
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-7">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label  fw-bold fs-6">Re-Password</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row">
            <input type="password" wire:model="password_confirmation"
                class="form-control form-control-lg form-control-solid @error('password_confirmation') is-invalid @enderror" />
            @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Actions-->
    <div class="card-footer d-flex justify-content-end py-6 px-9">
        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save</button>
    </div>
    <!--end::Actions-->
    </form>
</div>
