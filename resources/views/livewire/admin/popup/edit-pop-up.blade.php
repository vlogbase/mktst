<div>
    <!--begin::Form-->
    <form id="kt_account_profile_details_form" class="form" wire:submit.prevent="submit">
     <!--begin::Card body-->
     <div class="card-body border-top p-9">
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
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Head</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text"  wire:model="head" class="form-control form-control-lg form-control-solid @error('head') is-invalid @enderror" />
                @error('head') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->


        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Button Text</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text"  wire:model="btn_text" class="form-control form-control-lg form-control-solid @error('btn_text') is-invalid @enderror" />
                @error('btn_text') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Button Url</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text"  wire:model="btn_url" class="form-control form-control-lg form-control-solid @error('btn_url') is-invalid @enderror" />
                @error('btn_url') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
     <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-bold fs-6">Status</label>
        <!--begin::Label-->
        <!--begin::Label-->
        <div class="col-lg-8 d-flex align-items-center">
            <div class="form-check form-check-solid form-switch fv-row">
                <input wire:model="status" class="form-check-input w-45px h-30px" type="checkbox" id="featured"  />
                <label class="form-check-label" for="featured"></label>
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


 