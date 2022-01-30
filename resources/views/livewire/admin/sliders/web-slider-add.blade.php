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
                @if($itemid == 0)  
                <img src="/upload/websliders/holder.png" class="img-fluid" alt="">
                @else
                <img src="{{$itemImage}}" class="img-fluid" alt="">
                @endif
                
                @endif
                <div wire:loading wire:target="image">Uploading...</div>
                 <input type="file" wire:model="image" class="form-control form-control-lg form-control-solid">
                 @error('image') <span class="text-danger">{{ $message }}</span> @enderror
             </div>
             <!--end::Col-->
         </div>
         <!--end::Input group-->


          <!--begin::Input group-->
          <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label  fw-bold fs-6">Top Head</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text"  wire:model="top_head" class="form-control form-control-lg form-control-solid @error('top_head') is-invalid @enderror" />
                @error('top_head') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label  fw-bold fs-6">Middle Head</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text"  wire:model="mid_head" class="form-control form-control-lg form-control-solid @error('mid_head') is-invalid @enderror" />
                @error('mid_head') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label  fw-bold fs-6">Use Button</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <div class="form-check form-check-solid form-switch fv-row">
                    <input wire:model="button_status" class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing"  />
                    <label class="form-check-label" for="allowmarketing"></label>
                </div>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

            @if($button_status)
            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label  fw-bold fs-6">Button Text</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <input type="text"  wire:model="button_text" class="form-control form-control-lg form-control-solid @error('button_text') is-invalid @enderror" />
                    @error('button_text') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label  fw-bold fs-6">Button Link</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <input type="text"  wire:model="button_action" class="form-control form-control-lg form-control-solid @error('button_action') is-invalid @enderror" />
                    @error('button_action') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            @endif

        <!--begin::Input group-->
        <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label  fw-bold fs-6">Use White Text</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <div class="form-check form-check-solid form-switch fv-row">
                    <input wire:model="light" class="form-check-input w-45px h-30px" type="checkbox" id="light"  />
                    <label class="form-check-label" for="light"></label>
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
 