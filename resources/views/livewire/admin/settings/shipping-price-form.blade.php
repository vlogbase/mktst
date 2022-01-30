<div>
   <!--begin::Form-->
   <form id="kt_account_profile_details_form" class="form" wire:submit.prevent="submit">
    <!--begin::Card body-->
    <div class="card-body border-top p-9">
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Shipping Price</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="number" step="0.01" wire:model="price" class="form-control form-control-lg form-control-solid @error('price') is-invalid @enderror" />
                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        
        
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">Free Shipping Campaign</label>
            <!--begin::Label-->
            <!--begin::Label-->
            <div class="col-lg-8 d-flex align-items-center">
                <div class="form-check form-check-solid form-switch fv-row">
                    <input wire:model="campaign" class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing"  />
                    <label class="form-check-label" for="allowmarketing"></label>
                </div>
            </div>
            <!--begin::Label-->
        </div>
        <!--end::Input group-->

        @if($campaign)
         <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Campaing Cart Price</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="number" step="0.01" wire:model="campaign_price" class="form-control form-control-lg form-control-solid @error('campaign_price') is-invalid @enderror" />
                @error('campaign_price') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        @endif
    </div>
    <!--end::Card body-->
    <!--begin::Actions-->
    <div class="card-footer d-flex justify-content-end py-6 px-9">
        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
    </div>
    <!--end::Actions-->
</form>
<!--end::Form-->
</div>
