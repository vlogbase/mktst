<div>
    <!--begin::Form-->
    <form id="kt_account_profile_details_form" class="form" wire:submit.prevent="submit">
     <!--begin::Card body-->
     <div class="card-body border-top p-9">

        @foreach($paymentmethods as $index => $paymentmethod)
         <!--begin::Input group-->
         <div class="row mb-6" >
             <!--begin::Label-->
             <label class="col-lg-4 col-form-label fw-bold fs-6">{{$paymentmethod->name}}</label>
             <!--begin::Label-->
             <!--begin::Label-->
             <div class="col-lg-8 d-flex align-items-center" wire:key="post-field-{{ $paymentmethod->id }}">
                 <div class="form-check form-check-solid form-switch fv-row">
                     <input wire:model="paymentmethods.{{$index}}.status" class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing"  />
                     <label class="form-check-label" for="allowmarketing"></label>
                 </div>
             </div>
             <!--begin::Label-->
         </div>
         <!--end::Input group-->
         @endforeach
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
 