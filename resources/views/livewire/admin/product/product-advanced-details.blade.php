<div>
   
                        
    <!--begin::Form-->
<form id="kt_account_profile_details_form" class="form" wire:submit.prevent="submit">
<!--begin::Card body-->
<div class="card-body border-top p-9">
<!--begin::Input group-->
<div class="row mb-6">
<!--begin::Label-->
<label class="col-lg-4 col-form-label required fw-bold fs-6">Meta Heading</label>
<!--end::Label-->
<!--begin::Col-->
<div class="col-lg-8 fv-row">
    <input type="text"  wire:model="meta_title" class="form-control form-control-lg form-control-solid @error('meta_title') is-invalid @enderror" />
    @error('meta_title') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<!--end::Col-->
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="row mb-6">
    <!--begin::Label-->
    <label class="col-lg-4 col-form-label  fw-bold fs-6">Meta Description</label>
    <!--end::Label-->
    <!--begin::Col-->
    <div class="col-lg-8 fv-row">
        <input type="text"  wire:model="meta_description" class="form-control form-control-lg form-control-solid @error('meta_description') is-invalid @enderror" />
        @error('meta_description') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <!--end::Col-->
    </div>
    <!--end::Input group-->
    

<!--begin::Input group-->
<div class="row mb-6">
<!--begin::Label-->
<label class="col-lg-4 col-form-label  fw-bold fs-6">Unit Pack</label>
<!--end::Label-->
<!--begin::Col-->
<div class="col-lg-8 fv-row">
<input type="text" placeholder="5Kg, 2x10Pack" wire:model="pack" class="form-control form-control-lg form-control-solid @error('pack') is-invalid @enderror" />
@error('pack') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<!--end::Col-->
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="row mb-6">
<!--begin::Label-->
<label class="col-lg-4 col-form-label  fw-bold fs-6">Unit Weight</label>
<!--end::Label-->
<!--begin::Col-->
<div class="col-lg-8 fv-row">
<input type="number" step="0.01" wire:model="unit_weight" class="form-control form-control-lg form-control-solid @error('unit_weight') is-invalid @enderror" />
@error('unit_weight') <span class="text-danger">{{ $message }}</span> @enderror
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

