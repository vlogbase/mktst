<div>
    <!--begin::Form-->
    <form id="kt_account_profile_details_form" class="form" wire:submit.prevent="submit">
     <!--begin::Card body-->
     <div class="card-body border-top p-9">
        <div class="row mb-6">
            <!--begin::Label-->
            <p>
                <small class="col-lg-4 col-form-label">Customer Earn for every <strong>£100</strong> equals to <strong>{{$earn_coefficient * 100}} Point</strong></small><br>
                <small class="col-lg-4 col-form-label">Customer Spend with every <strong>100 Point</strong> equals to <strong>£{{100 * $spend_coefficient}}</strong></small>
            </p>
        </div>
        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label fw-bold fs-6">Point Earning Status</label>
            <!--begin::Label-->
            <!--begin::Label-->
            <div class="col-lg-8 d-flex align-items-center">
                <div class="form-check form-check-solid form-switch fv-row">
                    <input wire:model="status" class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing"  />
                    <label class="form-check-label" for="allowmarketing"></label>
                </div>
            </div>
            <!--begin::Label-->
        </div>
        <!--end::Input group-->
        @if($status)
         <!--begin::Input group-->
         <div class="row mb-6">
             <!--begin::Label-->
             <label class="col-lg-4 col-form-label required fw-bold fs-6">Earn Coefficient</label>
             <!--end::Label-->
             <!--begin::Col-->
             <div class="col-lg-8 fv-row">
                 <input type="number" step="0.01" wire:model="earn_coefficient" class="form-control form-control-lg form-control-solid @error('earn_coefficient') is-invalid @enderror" />
                 @error('earn_coefficient') <span class="text-danger">{{ $message }}</span> @enderror
             </div>
             <!--end::Col-->
         </div>
         <!--end::Input group-->
         @endif
         
         
 
          <!--begin::Input group-->
         <div class="row mb-6">
             <!--begin::Label-->
             <label class="col-lg-4 col-form-label required fw-bold fs-6">Spend Coefficient</label>
             <!--end::Label-->
             <!--begin::Col-->
             <div class="col-lg-8 fv-row">
                 <input type="number" step="0.01" wire:model="spend_coefficient" class="form-control form-control-lg form-control-solid @error('spend_coefficient') is-invalid @enderror" />
                 @error('spend_coefficient') <span class="text-danger">{{ $message }}</span> @enderror
             </div>
             <!--end::Col-->
         </div>
         <!--end::Input group-->

         
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
 