<div>
   
                        
    <!--begin::Form-->
<form id="kt_account_profile_details_form" class="form" wire:submit.prevent="submit">
<!--begin::Card body-->
<div class="card-body border-top p-9">

<!--begin::Row-->
<div class="row mb-7">

<!--begin::Col-->
<div class="col-lg-12" wire:ignore>
    <textarea id="description" name="description" rows="10"  class="form-control form-control-lg form-control-solid ">
       {{$description_text}}
    </textarea>
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
<script src="/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>
<script>
      ClassicEditor
        .create(document.querySelector('#description'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                @this.set('description_text', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endpush
