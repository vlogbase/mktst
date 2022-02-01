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
                <img src="{{$current_image}}" class="img-fluid" alt="">
                @endif
                <div wire:loading wire:target="image">Uploading...</div>
                 <input type="file" wire:model="image" class="form-control form-control-lg form-control-solid">
             </div>
             <!--end::Col-->
         </div>
         <!--end::Input group-->


          <!--begin::Input group-->
          <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Title</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text"  wire:model="title" class="form-control form-control-lg form-control-solid @error('title') is-invalid @enderror" />
                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
         
          <!--begin::Input group-->
         <div class="row mb-6" >
             <!--begin::Label-->
             <label class="col-lg-4 col-form-label required fw-bold fs-6">Text</label>
             <!--end::Label-->
             <!--begin::Col-->
             <div class="col-lg-8 fv-row" >
                 <div wire:ignore>
                    <textarea id="message" name="message" rows="10"  class="form-control form-control-lg form-control-solid ">
                        {{$text}}
                    </textarea>
                 </div>
             </div>
             <!--end::Col-->
         </div>
         <!--end::Input group-->
         <!--begin::Input group-->
         <div class="row mb-6" >
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6"></label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row" >
                @error('text') <span class="text-danger">{{ $message }}</span> @enderror
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
 
 @push('scripts')
<script src="/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>
<script>
      ClassicEditor
        .create(document.querySelector('#message'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                @this.set('text', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endpush