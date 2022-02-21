<div>
    <!--begin::Form-->
    <form id="kt_account_profile_details_form" class="form" wire:submit.prevent="submit">
     <!--begin::Card body-->
     <div class="card-body border-top p-9">
         <!--begin::Input group-->
         <div class="row mb-6">
             <!--begin::Label-->
             <label class="col-lg-4 col-form-label fw-bold fs-6">Image</label>
             
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
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Name</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <input type="text"  wire:model="name" class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror" />
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Row-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Parent Category</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8" wire:ignore>
    
                <select class="form-select form-select-solid" id="select2" data-placeholder="Select an option">
                    <option >Main Category</option>
                    @foreach($categories as $category)
                    <option {{$parent == $category->id ? ' selected="selected"' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
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

<script>
    $(document).ready(function () {
        $('#select2').select2();
        $('#select2').on('change', function (e) {
            var data = $('#select2').select2("val");
            @this.set('parent', data);
        });
    });

</script>

@endpush
 