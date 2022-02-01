<div>
    <form id="kt_account_profile_details_form" class="form" wire:submit.prevent="submit">
        <!--begin::Card body-->
        <div class="card-body border-top p-9">
            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">Best Seller</label>
                <!--begin::Label-->
                <!--begin::Label-->
                <div class="col-lg-8 d-flex align-items-center">
                    <div class="form-check form-check-solid form-switch fv-row">
                        <input wire:model="best_seller" class="form-check-input w-45px h-30px" type="checkbox" id="best_seller"  />
                        <label class="form-check-label" for="best_seller"></label>
                    </div>
                </div>
                <!--begin::Label-->
            </div>
            <!--end::Input group-->
    
     <!--begin::Input group-->
     <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-bold fs-6">Featured</label>
        <!--begin::Label-->
        <!--begin::Label-->
        <div class="col-lg-8 d-flex align-items-center">
            <div class="form-check form-check-solid form-switch fv-row">
                <input wire:model="featured" class="form-check-input w-45px h-30px" type="checkbox" id="featured"  />
                <label class="form-check-label" for="featured"></label>
            </div>
        </div>
        <!--begin::Label-->
    </div>
    <!--end::Input group-->

     <!--begin::Input group-->
     <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-bold fs-6">Special Offer</label>
        <!--begin::Label-->
        <!--begin::Label-->
        <div class="col-lg-8 d-flex align-items-center">
            <div class="form-check form-check-solid form-switch fv-row">
                <input wire:model="special_offer" class="form-check-input w-45px h-30px" type="checkbox" id="special_offer"  />
                <label class="form-check-label" for="special_offer"></label>
            </div>
        </div>
        <!--begin::Label-->
    </div>
    <!--end::Input group-->

     <!--begin::Input group-->
     <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-bold fs-6">New Arrival</label>
        <!--begin::Label-->
        <!--begin::Label-->
        <div class="col-lg-8 d-flex align-items-center">
            <div class="form-check form-check-solid form-switch fv-row">
                <input wire:model="new_arrival" class="form-check-input w-45px h-30px" type="checkbox" id="new_arrival"  />
                <label class="form-check-label" for="new_arrival"></label>
            </div>
        </div>
        <!--begin::Label-->
    </div>
    <!--end::Input group-->


        </div>
        <!--end::Card body-->
        <!--begin::Actions-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save</button>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</div>
