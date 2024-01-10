<div>
    <!--begin::Form-->
    <form id="kt_account_profile_details_form" class="form" wire:submit.prevent="submit">
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Image</label>

            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" class="img-fluid" alt="">
                @endif
                <input type="file" wire:model="image" class="form-control form-control-lg form-control-solid">
                <div wire:loading wire:target="image">Uploading...</div>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Redirect URL</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text" wire:model="url"
                    class="form-control form-control-lg form-control-solid @error('url') is-invalid @enderror" />
                @error('url')
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
