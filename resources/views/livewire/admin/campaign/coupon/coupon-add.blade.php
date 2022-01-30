<div>
    <!--begin::Form-->
    <form id="kt_account_profile_details_form" class="form" wire:submit.prevent="submit">
     <!--begin::Card body-->
     <div class="card-body border-top p-9">
         
          <!--begin::Input group-->
          <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Code</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <div class="input-group ">
                <span class="input-group-text" id="basic-addon1">
                    <a wire:click="generateCode" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                        <span class="svg-icon svg-icon-3">
                            <i class="far fa-lightbulb "></i>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                </span>
                <input type="text"  wire:model="code" class="form-control form-control-lg form-control-solid @error('code') is-invalid @enderror" />
            </div>
                @error('code') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Type</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <select class="form-select form-select-solid @error('type') is-invalid @enderror"  wire:model="type"  aria-label="Select example">
                    <option>Open this select menu</option>
                    <option value="price">Price Discount</option>
                    <option value="percentage">Percentage Discount</option>
                </select>
                @error('type') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Discount</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="number" step="0.01"  wire:model="discount" class="form-control form-control-lg form-control-solid @error('discount') is-invalid @enderror" />
                @error('discount') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label  fw-bold fs-6">Status</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <div class="form-check form-check-solid form-switch fv-row">
                    <input wire:model="status" class="form-check-input w-45px h-30px" type="checkbox" id="status"  />
                    <label class="form-check-label" for="status"></label>
                </div>
            </div>
            <!--end::Col-->
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
 