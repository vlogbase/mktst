<div>
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label  fw-bold fs-6">Company Name</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row">
            <input type="text" wire:model="name"
                class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror" />
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-7">
        <!--begin::Label-->
        <label class="col-lg-4 fw-bold text-muted">Company Vat</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row">
            <span class="fw-bold text-gray-800 fs-6">{{ $customer->vat }}</span>
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-7">
        <!--begin::Label-->
        <label class="col-lg-4 fw-bold text-muted">Company Registeration</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row">
            <span class="fw-bold text-gray-800 fs-6">{{ $customer->registeration }}</span>
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-7">
        <!--begin::Label-->
        <label class="col-lg-4 fw-bold text-muted">Registered Email
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                title="Email must be active"></i></label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 d-flex align-items-center">
            <span class="fw-bolder fs-6 text-gray-800 me-2">{{ $customer->email }}</span>
            @if ($customer->email_verified_at != null)
                <span class="badge badge-success">Verified</span>
            @endif
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Actions-->
    <div class="card-footer d-flex justify-content-end py-6 px-9">
        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save</button>
    </div>
    <!--end::Actions-->
</div>
