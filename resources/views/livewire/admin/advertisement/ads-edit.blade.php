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
                @if($image)
                <img src="{{ $image->temporaryUrl() }}" class="img-fluid" alt="">
                @else
                    @if(strlen($nowImage) > 2)
                    <img src="{{$nowImage}}" class="img-fluid" alt="">
                    @else
                    <p>No Image</p>
                    @endif
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

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Live Date Start</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="datetime-local" wire:model="start_date"
                    class="form-control form-control-lg form-control-solid @error('start_date') is-invalid @enderror" />
                @error('start_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Live Date End</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="datetime-local" wire:model="end_date"
                    class="form-control form-control-lg form-control-solid @error('end_date') is-invalid @enderror" />
                @error('end_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Live Date End</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <select wire:model="side"
                    class="form-control form-control-lg form-control-solid @error('side') is-invalid @enderror" >
                    <option value="">Select</option>
                    <option value="left">Left</option>
                    <option value="right">Right</option>
                </select>
                @error('side')
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
